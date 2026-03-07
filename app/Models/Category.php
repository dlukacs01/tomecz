<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    // MASS ASSIGNMENT
    protected $guarded = [];

    // RELATIONSHIPS

    /**
     * Get the projects for the category.
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    // CUSTOM
    public function latestPhotos()
    {
        return $this->projects
            ->flatMap->photos // merge photos from all projects
            ->sortByDesc('id') // GLOBAL per-category ordering
            ->take(config('custom.photos', 2));
    }
}
