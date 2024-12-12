<?php

namespace App\Http\Controllers\Api\V1;;

use App\Http\Filters\V1\ApplicationFilter;
use App\Http\Requests\Api\V1\Application\StoreApplicationRequest;
use App\Http\Requests\Api\V1\Application\UpdateApplicationRequest;
use App\Http\Resources\V1\ApplicationResource;
use App\Models\Application;

class ApplicationController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApplicationFilter $filters)
    {
        return ApplicationResource::collection(Application::filter($filters)->paginate());
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
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
