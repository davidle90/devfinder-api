<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'user',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'email' => $this->email,
            ],
            'includes' => [
                'listings' => ListingResource::collection($this->whenLoaded('listings')),
                'applications' => ApplicationResource::collection($this->whenLoaded('applications')),
                'contributions' => ContributionResource::collection($this->whenLoaded('contributions')),
                'events' => EventResource::collection($this->whenLoaded('events')),
                'projects' => ProjectResource::collection($this->whenLoaded('projects')),
            ],
            'links' => [
                'self' => route('users.show', ['user' => $this->id])
            ]
        ];
    }
}
