<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RealEstateEntity>
 */
class RealEstateEntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => fake()->address(),
            'price' => fake()->numberBetween(100, 10000000),
            'size' => fake()->numberBetween(10, 3000),
            'number_of_rooms' => fake()->numberBetween(1, 20),
            'longitude' => fake()->longitude(),
            'latitude' => fake()->latitude(),
            'type_id' => fake()->numberBetween(1,2)
        ];
    }
}
