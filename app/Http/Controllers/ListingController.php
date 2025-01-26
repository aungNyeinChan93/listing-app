<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class ListingController extends Controller
{
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
        return Inertia::render('Listings/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreListingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        $listing->load('user'); // Load the user relation

        return Inertia::render('Listings/Show', [
            'listing' => $listing
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        //
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
        return inertia('Listings/NonApprovedList',[
            'listings'=>$listings,
        ]);
    }
}
