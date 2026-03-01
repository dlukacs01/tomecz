<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
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

            'body' => 'Leírás...',
            'body_en' => 'Body...',
            'original' => 'https://placehold.co/1000x1000', // fake()->imageUrl(1000, 1000)
            'thumbnail' => 'https://placehold.co/500x500', // fake()->imageUrl(500, 500)
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
