<?php

namespace App\Http\Requests\V1\RealEstateEntity;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealEstateEntity extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'type_id' => 'sometimes|exists:real_estate_entity_types,id',
            'address' => 'sometimes|min:4',
            'price' => 'sometimes|numeric',
            'longitude' => 'sometimes|numeric',
            'latitude' => 'sometimes|numeric',
            'number_of_rooms' => 'sometimes|numeric',
            'size' => 'sometimes|numeric',
        ];
    }
}
