<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    // MASS ASSIGNMENT
    protected $guarded = [];

    // RELATIONSHIPS

    /**
     * Get the project that owns the photo.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // ACCESSORS
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app()->getLocale() === 'en' && !empty($this->title_en) ? $this->title_en : $value,
        );
    }

    protected function technique(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app()->getLocale() === 'en' && !empty($this->technique_en) ? $this->technique_en : $value,
        );
    }

    protected function tags(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => app()->getLocale() === 'en' && !empty($this->tags_en) ? $this->tags_en : $value,
        );
    }

    protected function body(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => app()->getLocale() === 'en' && !empty($this->body_en) ? $this->body_en : $value,
        );
    }
}
