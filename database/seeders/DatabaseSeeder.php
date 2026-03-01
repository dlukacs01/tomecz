<?php

namespace Database\Seeders;

use App\Models\Exhibition;
use App\Models\Photo;
use App\Models\Story;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProjectSeeder::class,
            VideoSeeder::class,
            StatusSeeder::class,
            ExhibitionSeeder::class,
        ]);

        // Paintings

        // PHOTOS (Condition Critique – Critical Condition)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 1,
            'position' => $sequence->index + 1,
            'title' => 'Állapotkritika – Kritikus állapot' . '-' . $sequence->index + 1,
            'title_en' => 'Condition Critique – Critical Condition' . '-' . $sequence->index + 1,
            'slug' => 'allapotkritika-kritikus-allaopot' . '-' . $sequence->index + 1,
            'technique' => 'Festmények',
            'technique_en' => 'Paintings',
        ])->create();

        // PHOTOS (Modified memories)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 2,
            'position' => $sequence->index + 1,
            'title' => 'Módosított emlékek' . '-' . $sequence->index + 1,
            'title_en' => 'Modified memories' . '-' . $sequence->index + 1,
            'slug' => 'modositott-emlekek' . '-' . $sequence->index + 1,
            'technique' => 'Festmények',
            'technique_en' => 'Paintings',
        ])->create();

        // PHOTOS (Layers of remembrance)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 3,
            'position' => $sequence->index + 1,
            'title' => 'Az emlékezés rétegei' . '-' . $sequence->index + 1,
            'title_en' => 'Layers of remembrance' . '-' . $sequence->index + 1,
            'slug' => 'az-emlekezes-retegei' . '-' . $sequence->index + 1,
            'technique' => 'Festmények',
            'technique_en' => 'Paintings',
        ])->create();

        // Paper Works

        // PHOTOS (Watercolor)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 4,
            'position' => $sequence->index + 1,
            'title' => 'Vízfestmény' . '-' . $sequence->index + 1,
            'title_en' => 'Watercolor' . '-' . $sequence->index + 1,
            'slug' => 'vizfestmeny' . '-' . $sequence->index + 1,
            'technique' => 'Papír Munkák',
            'technique_en' => 'Paper Works',
        ])->create();

        // PHOTOS (Cyanotypes)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 5,
            'position' => $sequence->index + 1,
            'title' => 'Cianotípiák' . '-' . $sequence->index + 1,
            'title_en' => 'Cyanotypes' . '-' . $sequence->index + 1,
            'slug' => 'cianotipiak' . '-' . $sequence->index + 1,
            'technique' => 'Papír Munkák',
            'technique_en' => 'Paper Works',
        ])->create();

        // PHOTOS (Image Error)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 6,
            'position' => $sequence->index + 1,
            'title' => 'Képhiba' . '-' . $sequence->index + 1,
            'title_en' => 'Image Error' . '-' . $sequence->index + 1,
            'slug' => 'kephiba' . '-' . $sequence->index + 1,
            'technique' => 'Papír Munkák',
            'technique_en' => 'Paper Works',
        ])->create();

        // PHOTOS (Manual pixels)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 7,
            'position' => $sequence->index + 1,
            'title' => 'Manuális pixelek' . '-' . $sequence->index + 1,
            'title_en' => 'Manual pixels' . '-' . $sequence->index + 1,
            'slug' => 'manualis-pixelek' . '-' . $sequence->index + 1,
            'technique' => 'Papír Munkák',
            'technique_en' => 'Paper Works',
        ])->create();

        // Installation

        // PHOTOS (Game Hunting)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 8,
            'position' => $sequence->index + 1,
            'title' => 'Vadászat' . '-' . $sequence->index + 1,
            'title_en' => 'Game Hunting' . '-' . $sequence->index + 1,
            'slug' => 'vadaszat' . '-' . $sequence->index + 1,
            'technique' => 'Installáció',
            'technique_en' => 'Installation',
        ])->create();

        // PHOTOS (Neon in the forest)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 9,
            'position' => $sequence->index + 1,
            'title' => 'Neon az erdőben' . '-' . $sequence->index + 1,
            'title_en' => 'Neon in the forest' . '-' . $sequence->index + 1,
            'slug' => 'neon-az-erdoben' . '-' . $sequence->index + 1,
            'technique' => 'Installáció',
            'technique_en' => 'Installation',
        ])->create();

        // PHOTOS (Samples)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 10,
            'position' => $sequence->index + 1,
            'title' => 'Minták' . '-' . $sequence->index + 1,
            'title_en' => 'Samples' . '-' . $sequence->index + 1,
            'slug' => 'mintak' . '-' . $sequence->index + 1,
            'technique' => 'Installáció',
            'technique_en' => 'Installation',
        ])->create();

        // Print

        // PHOTOS (Digital graphics)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 11,
            'position' => $sequence->index + 1,
            'title' => 'Digitális grafika' . '-' . $sequence->index + 1,
            'title_en' => 'Digital graphics' . '-' . $sequence->index + 1,
            'slug' => 'digitalis-grafika' . '-' . $sequence->index + 1,
            'technique' => 'Nyomat',
            'technique_en' => 'Print',
        ])->create();

        // PHOTOS (Photo)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 12,
            'position' => $sequence->index + 1,
            'title' => 'Fénykép' . '-' . $sequence->index + 1,
            'title_en' => 'Photo' . '-' . $sequence->index + 1,
            'slug' => 'fenykep' . '-' . $sequence->index + 1,
            'technique' => 'Nyomat',
            'technique_en' => 'Print',
        ])->create();

        // PHOTOS (Photo)
        Photo::factory(config('custom.seeders.photos', 10))->sequence(fn (Sequence $sequence) => [
            'project_id' => 12,
            'position' => $sequence->index + 1,
            'title' => 'Fénykép' . '-' . $sequence->index + 1,
            'title_en' => 'Photo' . '-' . $sequence->index + 1,
            'slug' => 'fenykep' . '-' . $sequence->index + 1,
            'technique' => 'Nyomat',
            'technique_en' => 'Print',
        ])->create();

        // EXHIBITIONS (Archive)
        Exhibition::factory(config('custom.seeders.exhibitions', 10))->sequence(fn (Sequence $sequence) => [
            'title' => 'Archív' . '-' . $sequence->index + 1,
            'title_en' => 'Archive' . '-' . $sequence->index + 1,
        ])->create();

        // STORIES
        Story::factory(config('custom.seeders.stories', 10))->sequence(fn (Sequence $sequence) => [
            'title' => 'Hír' . '-' . $sequence->index + 1,
            'title_en' => 'Story' . '-' . $sequence->index + 1,
            'slug' => 'hir' . '-' . $sequence->index + 1,
        ])->create();
    }
}
