<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('categories')->insert([
            [
                'name' => 'Festmények',
                'name_en' => 'Paintings',
                'slug' => 'festmenyek',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Papír Munkák',
                'name_en' => 'Paper Works',
                'slug' => 'papir-munkak',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Installáció',
                'name_en' => 'Installation',
                'slug' => 'installacio',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Nyomat',
                'name_en' => 'Print',
                'slug' => 'nyomat',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
