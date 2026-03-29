<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{

    // HOME
    public function getAllWithProjectsAndPhotos(): Collection
    {
        return Category::with([
            'projects.photos' => fn ($q) => $q->latest() // Photos ordered per project in SQL
        ])
        ->orderBy('position')
        ->get();
    }

    // WORKS
    public function getAllWithProjects(): Collection
    {
        return Category::with([
            'projects' => fn ($q) => $q->orderBy('position')
        ])
        ->orderBy('position')
        ->get();
    }

    // ADMIN
    public function getAllForAdmin(): Collection
    {
        return Category::orderBy('position')->get();
    }
}
