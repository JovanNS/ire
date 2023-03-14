<?php

namespace App\Http\Requests\V1\RealEstateEntity;

use Illuminate\Foundation\Http\FormRequest;

class CreateRealEstateEntity extends FormRequest
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
            'type_id' => 'required|exists:real_estate_entity_types,id',
            'address' => 'required|min:4',
            'price' => 'required|numeric',
            'longitude' => 'required',
            'latitude' => 'required',
            'number_of_rooms' => 'required|numeric',
            'size' => 'required|numeric',
        ];
    }
}
