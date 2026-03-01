<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('videos')->insert([

            // Game Hunting

            [
                'position' => 1,
                'title' => 'Vadászat',
                'title_en' => 'Game Hunting',
                'slug' => 'vadaszat',
                'url' => fake()->url(),
                'year' => fake()->numberBetween(2000, 2020),
                'tags' => 'virágok, természet, növények',
                'tags_en' => 'flowers, nature, plants',
                'body' => 'Leírás...',
                'body_en' => 'Body...',
                'original' => 'https://placehold.co/1000x1000',
                'thumbnail' => 'https://placehold.co/500x500',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Post covid

            [
                'position' => 2,
                'title' => 'Covid utáni',
                'title_en' => 'Post covid',
                'slug' => 'covid-utani',
                'url' => fake()->url(),
                'year' => fake()->numberBetween(2000, 2020),
                'tags' => 'virágok, természet, növények',
                'tags_en' => 'flowers, nature, plants',
                'body' => 'Leírás...',
                'body_en' => 'Body...',
                'original' => 'https://placehold.co/1000x1000',
                'thumbnail' => 'https://placehold.co/500x500',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Church

            [
                'position' => 3,
                'title' => 'Templom',
                'title_en' => 'Church',
                'slug' => 'templom',
                'url' => fake()->url(),
                'year' => fake()->numberBetween(2000, 2020),
                'tags' => 'virágok, természet, növények',
                'tags_en' => 'flowers, nature, plants',
                'body' => 'Leírás...',
                'body_en' => 'Body...',
                'original' => 'https://placehold.co/1000x1000',
                'thumbnail' => 'https://placehold.co/500x500',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // xprmnt

            [
                'position' => 4,
                'title' => 'kísérlet',
                'title_en' => 'xprmnt',
                'slug' => 'kiserlet',
                'url' => fake()->url(),
                'year' => fake()->numberBetween(2000, 2020),
                'tags' => 'virágok, természet, növények',
                'tags_en' => 'flowers, nature, plants',
                'body' => 'Leírás...',
                'body_en' => 'Body...',
                'original' => 'https://placehold.co/1000x1000',
                'thumbnail' => 'https://placehold.co/500x500',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
