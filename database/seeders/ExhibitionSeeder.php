<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExhibitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('exhibitions')->insert([
            [
                'status_id' => 2,
                'title' => 'Aktuális',
                'title_en' => 'Current',
                'year' => (int) date('Y'),
                'location' => fake()->address,
                'original' => 'https://placehold.co/1000x1000', // fake()->imageUrl(1000, 1000)
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status_id' => 3,
                'title' => 'Közelgő',
                'title_en' => 'Upcoming',
                'year' => (int) date('Y') + 1,
                'location' => fake()->address,
                'original' => 'https://placehold.co/1000x1000', // fake()->imageUrl(1000, 1000)
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
