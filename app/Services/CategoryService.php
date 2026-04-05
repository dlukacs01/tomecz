<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    // ADMIN (position)
    public function getAllForAdminPosition(): Collection
    {
        return Category::orderBy('position')->get();
    }

    // ADMIN (index)
    public function getAllForAdminIndex(): LengthAwarePaginator
    {
        return Category::latest('id')->paginate(config('custom.pagination.admin', 10));
    }
}
