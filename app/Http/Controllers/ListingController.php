<?php

namespace App\Http\Controllers;

use Storage;
use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ListingController extends Controller implements HasMiddleware
{

    // controller middleware
    public static function middleware()
    {
        return [
            new Middleware(['auth', 'verified',], except: []),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listings = Listing::query()
            ->whereHas('user', function (Builder $query) {   //call user model if has user relation
                $query->where('role', '!=', 'suspended');
            })
            ->with('user')
            ->where('approved', true)
            ->filter(request(['user_id', 'tag']))  //scopeFilter
            ->when($request->search, function ($q) use ($request) {
                $q->whereAny(['title', 'description', 'tags'], 'like', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(6)
            ->withQueryString();

        return Inertia::render('Listings/Index', [
            'listings' => $listings,
            'search' => $request->search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Listing::class);
        return Inertia::render('Listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $tags = $request->tags;
        // $tags = explode(',', $tags);
        // $tags = array_map('trim', $tags);
        // $tags = array_filter($tags);
        // $tags = array_unique($tags);
        // $tags = implode(',', $tags);

        Gate::authorize('create', Listing::class);

        $tags = implode(',', array_unique(array_filter(array_map('trim', explode(',', $request->tags)))));

        $fields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'link' => ['nullable', 'url'],
            'tags' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4000']
        ]);

        if ($request->hasFile(('image'))) {
            $fields['image'] = $request->file('image')->store('/images/listings/', 'public');
        }

        $fields['tags'] = $tags;

        $request->user()->listings()->create($fields);

        return to_route('listings.index')->with('message', 'Listing create Success!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        Gate::authorize('view', $listing);
        $listing->load('user'); // Load the user relation  || [$user => $listing->user ] || lsiting.user_id === user.id =>find()

        return Inertia::render('Listings/Show', [
            'listing' => $listing,
            'canEdit' => fn() => auth()->user()->can('update', $listing) ?? false,
            'canDelete' => fn() => auth()->user()->can('delete', $listing) ?? false,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        Gate::authorize('update', $listing);
        $listing->load('user');
        return Inertia::render('Listings/Edit', [
            'listing' => $listing,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        Gate::authorize('update', $listing);
        $fields = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'email' => ['nullable', 'email'],
            'link' => ['nullable', 'url'],
            'tags' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:4000']
        ]);

        if ($request->hasFile(('image'))) {

            if ($listing->image) {
                Storage::disk('public')->delete($listing->image);  //oldImage delete ifhas?
            }
            $fields['image'] = $request->file('image')->store('/images/listings/', 'public');
        } else {

            $fields['image'] = $listing->image;
        }

        $tags = implode(',', array_unique(array_filter(array_map('trim', explode(',', $request->tags)))));
        $fields['tags'] = $tags;

        $listing->update([...$fields, 'approved' => false]);

        return to_route('listings.index')->with('message', 'Listing Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        Gate::authorize('delete', $listing);
        if (isset($listing->image)) {
            Storage::disk('public')->delete($listing->image);
        }
        $listing->delete();
        return to_route('listings.index')->with('message', 'Listing delete Success!');
    }

    // test
    public function test()
    {

        $listings = Listing::with('user')
            ->test('test')
            ->get();
        return $listings;
    }

    // non_approved
    public function non_approved(Request $request)
    {
        $listings = Listing::query()->with('user')
            ->where('approved', false)->paginate(6)->withQueryString();
        return inertia('Listings/NonApprovedList', [
            'listings' => $listings,
        ]);
    }

    // approved list
    public function approved(Request $request, Listing $listing)
    {
        Gate::authorize('approved', $listing);
        $listing->update([
            'approved' => true
        ]);

        return back()->with('message', 'Success Listing Approved!');
    }
}
