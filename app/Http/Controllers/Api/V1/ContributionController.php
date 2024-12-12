<?php

namespace App\Http\Controllers\Api\V1;;

use App\Http\Filters\V1\ContributionFilter;
use App\Http\Requests\Api\V1\Contribution\StoreContributionRequest;
use App\Http\Requests\Api\V1\Contribution\UpdateContributionRequest;
use App\Http\Resources\V1\ContributionResource;
use App\Models\Contribution;

class ContributionController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContributionFilter $filters)
    {
        return ContributionResource::collection(Contribution::filter($filters)->paginate());
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
    public function store(StoreContributionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contribution $contribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contribution $contribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContributionRequest $request, Contribution $contribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contribution $contribution)
    {
        //
    }
}
