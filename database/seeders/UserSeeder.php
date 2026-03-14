<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('users')->insert([

            // LUKÁCS DÁVID - ADMIN 1
            [
                'name' => 'Lukács Dávid',
                'email' => 'lukacs.dvid@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Tomecz0123!?#'),
                'remember_token' => Str::random(10),
                'intro' => 'LD Rövid bemutatkozás...',
                'intro_en' => 'LD Intro...',
                'cv' => 'LD Életrajz...',
                'cv_en' => 'LD CV...',
                'media' => 'LD Média...',
                'phone' => '+36 20 448 43 62',
                'address' => '2000 Szentendre, Hamvas Béla u. 28. fsz. 2.',
                'facebook' => 'https://facebook.com/lukacsdavid',
                'instagram' => 'https://instagram.com/lukacsdavid',
                'youtube' => 'https://youtube.com/lukacsdavid',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // TOMECZ DÁNIEL - ADMIN 2
            [
                'name' => 'Tomecz Dániel',
                'email' => 'tomeczdaniel97@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Tomecz0123!?#'),
                'remember_token' => Str::random(10),
                'intro' => 'TD Rövid bemutatkozás...',
                'intro_en' => 'TD Intro...',
                'cv' => implode("\n\n", array_map(fn () => fake()->sentences(12, true), range(1,4))),
                'cv_en' => 'TD CV...',
                'media' => 'TD Média...',
                'phone' => '+36 30 971 78 48',
                'address' => '2001 Szentendre, Hamvas Béla u. 29. fsz. 3.',
                'facebook' => 'https://www.facebook.com/dani.tomecz',
                'instagram' => 'https://www.instagram.com/tomeczdaniel',
                'youtube' => 'https://www.youtube.com/@tomeczdaniel617',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
