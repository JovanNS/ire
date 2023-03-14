<?php

namespace App\Http\Resources\V1\RealEstateEntity;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateEntity extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'address' => $this->address,
            'type' => $this->type->name,
            'price' => $this->price
        ];
    }
}
