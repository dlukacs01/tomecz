<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exhibition>
 */
class ExhibitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'status_id' => 3, // archív
            'year' => fake()->numberBetween(2000, 2020),
            'location' => fake()->address,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
