<?php

namespace App\Http\Resources\V1;

use App\Models\Company;
use App\Models\Event;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'listing',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
            ],
            'relationships' => [
                'owner' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->owner_id
                    ],
                    'links' => [
                        'self' => route('users.show', ['user' => $this->owner_id])
                    ]
                ],
                'listable' => [
                    'data' => [
                        'type' => strtolower(class_basename($this->listable_type)),
                        'id' => $this->listable_id
                    ],
                    'links' => [
                        'self' => $this->resolveListableLink(),
                    ]
                ]
            ],
            'includes' => [
                'owner' => UserResource::collection($this->whenLoaded('owner')),
                'listable' => $this->resolveListableResource(),
            ],
            'links' => [
                'self' => route('listings.show', ['listing' => $this->id])
            ]
        ];
    }

    protected function resolveListableLink()
    {
        switch ($this->listable_type) {
            case Project::class:
                return route('projects.show', ['project' => $this->listable_id]);
            case Company::class:
                return route('companies.show', ['company' => $this->listable_id]);
            case Event::class:
                return route('events.show', ['event' => $this->listable_id]);
            default:
                return null;
        }
    }

    protected function resolveListableResource()
    {
        switch ($this->listable_type) {
            case Project::class:
                return new ProjectResource($this->whenLoaded('listable'));
            case Company::class:
                return new CompanyResource($this->whenLoaded('listable'));
            case Event::class:
                return new EventResource($this->whenLoaded('listable'));
            default:
                return null;
    }
}
