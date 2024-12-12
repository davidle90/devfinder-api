<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => 'application',
            'id' => $this->id,
            'attributes' => [
                'message' => $this->message,
                'status' => $this->status,
            ],
            'relationships' => [
                'listing' => [
                    'data' => [
                        'type' => 'listing',
                        'id' => $this->listing_id
                    ],
                    'links' => [
                        'self' => route('listings.show', ['listing' => $this->listing_id])
                    ]
                ],
                'applicant' => [
                    'data' => [
                        'type' => 'user',
                        'id' => $this->applicant_id
                    ],
                    'links' => [
                        'self' => route('users.show', ['user' => $this->applicant_id])
                    ]
                ],
            ],
            'includes' => [
                'applicant' => UserResource::collection($this->whenLoaded('applicant')),
                'listing' => ListingResource::collection($this->whenLoaded('listing'))
            ],
            'links' => [
                'self' => route('applications.show', ['application' => $this->id])
            ]
        ];
    }
}
