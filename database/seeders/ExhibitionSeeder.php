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
                'status_id' => 1,
                'title' => 'Közelgő',
                'title_en' => 'Upcoming',
                'year' => fake()->numberBetween(2000, 2020),
                'location' => fake()->address,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'status_id' => 2,
                'title' => 'Aktuális',
                'title_en' => 'Current',
                'year' => fake()->numberBetween(2000, 2020),
                'location' => fake()->address,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
