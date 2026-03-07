<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    // ACCESSORS
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app()->getLocale() === 'en' && !empty($this->name_en) ? $this->name_en : $value,
        );
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
