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
            'id' => $this->id,
            'address' => $this->address,
            'type' => $this->type->name,
            'price' => number_format($this->price / 100, 2),
            'number_of_rooms' => $this->number_of_rooms,
            'size' => $this->size . 'm2',
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
        ];
    }
}
