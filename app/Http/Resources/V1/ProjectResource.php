<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'project',
            'id' => $this->id,
            'attributes' => [
                'title' => $this->title,
                'description' => $this->description,
                'respository_url' => $this->repository_url,
                'start_datetime' => $this->start_datetime,
                'end_datetime' => $this->end_datetime
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
            ],
            'includes' => [
                'owner' => new UserResource($this->whenLoaded('owner')),
                'listings' => ListingResource::collection($this->whenLoaded('listings')),
                'contributions' => ContributionResource::collection($this->whenLoaded('contributions'))
            ],
            'links' => [
                'self' => route('projects.show', ['project' => $this->id])
            ]
        ];
    }
}
