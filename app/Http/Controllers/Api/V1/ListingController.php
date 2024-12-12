<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Filters\V1\ListingFilter;
use App\Http\Requests\Api\V1\Listing\StoreListingRequest;
use App\Http\Requests\Api\V1\Listing\UpdateListingRequest;
use App\Http\Resources\V1\ListingResource;
use App\Models\Listing;

class ListingController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingFilter $filters)
    {
        return ListingResource::collection(Listing::filter($filters)->paginate());
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
        //
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
