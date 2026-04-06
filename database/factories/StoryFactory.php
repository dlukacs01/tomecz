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

            'intro' => 'Bevezető...',
            'intro_en' => 'Intro...',
            'body' => implode("\n\n", array_map(fn () => fake()->sentences(12, true), range(1,4))),
            'body_en' => 'Body...',
            'tags' => 'virágok, természet, növények',
            'tags_en' => 'flowers, nature, plants',
            'original' => 'https://placehold.co/1000x1000', // fake()->imageUrl(1000, 1000)
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
