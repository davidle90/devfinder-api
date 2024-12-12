<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'company',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'website' => $this->website,
                'logo' => $this->logo
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
                'owner' => UserResource::collection($this->whenLoaded('owner')),
                'listings' => ListingResource::collection($this->whenLoaded('listings'))
            ],
            'links' => [
                'self' => route('companies.show', ['company' => $this->id])
            ]
        ];
    }
}
