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

        // LUKÁCS DÁVID - ADMIN
        DB::table('users')->insert([
            'name' => 'Lukács Dávid',
            'email' => 'lukacs.dvid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Tomecz0123!?#'),
            'remember_token' => Str::random(10),
            'intro' => 'Rövid bemutatkozás...',
            'intro_en' => 'Intro...',
            'cv' => 'Életrajz...',
            'cv_en' => 'CV...',
            'media' => 'Média...',
            'phone' => '+36 30 123 45 67',
            'address' => '2000 Szentendre, Hamvas Béla u. 28. fsz. 2.',
            'facebook' => 'https://facebook.com/lukacsdavid',
            'instagram' => 'https://instagram.com/lukacsdavid',
            'youtube' => 'https://youtube.com/lukacsdavid',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
