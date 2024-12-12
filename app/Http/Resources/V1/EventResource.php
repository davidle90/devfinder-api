<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'event',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
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
                ]
            ],
            'includes' => [
                'owner' => UserResource::collection($this->whenLoaded('owner')),
            ],
            'links' => [
                'self' => route('events.show', ['event' => $this->id])
            ]
        ];
    }
}
