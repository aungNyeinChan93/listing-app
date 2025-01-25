<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Listing;
use Illuminate\Http\Request;
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
            ->with('user')
            ->when($request->search, function ($q) use ($request) {
                $q->whereAny(['title', 'description','tags'], 'like', '%' . $request->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return Inertia::render('Listings/Index', [
            'listings' => $listings
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}
