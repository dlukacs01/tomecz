<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
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

            'year' => fake()->numberBetween(2000, 2020),
            'size' => '100 x 100 cm',
            'body' => 'Leírás...',
            'body_en' => 'Body...',
            'tags' => 'virágok, természet, növények',
            'tags_en' => 'flowers, nature, plants',
            'original' => 'https://placehold.co/1000x1000', // fake()->imageUrl(1000, 1000)
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
