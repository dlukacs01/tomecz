<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('statuses')->insert([
            [
                'name' => 'Közelgő',
                'name_en' => 'Upcoming',
                'slug' => 'kozelgo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Aktuális',
                'name_en' => 'Current',
                'slug' => 'aktualis',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Archív',
                'name_en' => 'Archive',
                'slug' => 'archiv',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
