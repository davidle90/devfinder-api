<?php

namespace App\Http\Controllers\Api\V1;;

use App\Http\Filters\V1\EventFilter;
use App\Http\Requests\Api\V1\Event\StoreEventRequest;
use App\Http\Requests\Api\V1\Event\UpdateEventRequest;
use App\Http\Resources\V1\EventResource;
use App\Models\Event;

class EventController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index(EventFilter $filters)
    {
        return EventResource::collection(Event::filter($filters)->paginate());
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
    public function store(StoreEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
