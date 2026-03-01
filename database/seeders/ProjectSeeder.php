<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('projects')->insert([

            // PAINTINGS

            [
                'category_id' => 1,
                'title' => 'Állapotkritika – Kritikus állapot',
                'title_en' => 'Condition Critique – Critical Condition',
                'slug' => 'allapotkritika-kritikus-allaopot',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'title' => 'Módosított emlékek',
                'title_en' => 'Modified memories',
                'slug' => 'modositott-emlekek',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 1,
                'title' => 'Az emlékezés rétegei',
                'title_en' => 'Layers of remembrance',
                'slug' => 'az-emlekezes-retegei',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // PAPER WORKS

            [
                'category_id' => 2,
                'title' => 'Vízfestmény',
                'title_en' => 'Watercolor',
                'slug' => 'vizfestmeny',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'title' => 'Cianotípiák',
                'title_en' => 'Cyanotypes',
                'slug' => 'cianotipiak',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'title' => 'Képhiba',
                'title_en' => 'Image Error',
                'slug' => 'kephiba',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 2,
                'title' => 'Manuális pixelek',
                'title_en' => 'Manual pixels',
                'slug' => 'manualis-pixelek',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // INSTALLATION

            [
                'category_id' => 3,
                'title' => 'Vadászat',
                'title_en' => 'Game Hunting',
                'slug' => 'vadaszat',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 3,
                'title' => 'Neon az erdőben',
                'title_en' => 'Neon in the forest',
                'slug' => 'neon-az-erdoben',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 3,
                'title' => 'Minták',
                'title_en' => 'Samples',
                'slug' => 'mintak',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],

            // PRINT

            [
                'category_id' => 4,
                'title' => 'Digitális grafika',
                'title_en' => 'Digital graphics',
                'slug' => 'digitalis-grafika',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_id' => 4,
                'title' => 'Fénykép',
                'title_en' => 'Photo',
                'slug' => 'fenykep',
                'year' => fake()->numberBetween(2000, 2020),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
