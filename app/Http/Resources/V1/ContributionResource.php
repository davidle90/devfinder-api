<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContributionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'contribution',
            'id' => $this->id,
            'attributes' => [
                'role' => $this->role,
            ],
            'relationships' => [
                'user' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->user_id
                    ],
                    'links' => [
                        'self' => route('users.show', ['user' => $this->user_id])
                    ]
                ],
                'project' => [
                    'data' => [
                        'type' => 'project',
                        'id' => $this->project_id
                    ]
                ]
            ],
            'includes' => [
                'user' => UserResource::collection($this->whenLoaded('user')),
                'project' => ListingResource::collection($this->whenLoaded('project'))
            ],
            'links' => [
                'self' => route('contributions.show', ['contribution' => $this->id])
            ]
        ];
    }
}
