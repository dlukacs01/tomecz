<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function getAll(): Collection
    {
        return Category::with([
            'projects.photos' => fn ($q) => $q->latest() // Photos ordered per project in SQL
        ])
        ->orderBy('position')
        ->get();
    }
}
