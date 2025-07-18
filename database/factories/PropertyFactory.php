<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(2, 10);

return [
    'title' => $this->faker->sentence(5, true),
    'description' => $this->faker->sentences(4, true),
    'surface' => $this->faker->numberBetween(20, 200),
    'rooms' => $rooms,
    'bedrooms' => $this->faker->numberBetween(1, $rooms),
    'floor' => $this->faker->numberBetween(0, 15),
    'price' => $this->faker->numberBetween(100000, 2000000),
    'city' => $this->faker->city,
    'adresse' => $this->faker->address,
    'postal_code' => $this->faker->postcode,
    'sold' => false
];
    }
    
    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
            
        ]);
    }
}
