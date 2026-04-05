<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Exhibition extends Model
{
    /** @use HasFactory<\Database\Factories\ExhibitionFactory> */
    use HasFactory;

    // MASS ASSIGNMENT
    protected $guarded = [];

    // RELATIONSHIPS

    /**
     * Get the status that owns the exhibition.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    // ACCESSORS
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app()->getLocale() === 'en' && !empty($this->title_en) ? $this->title_en : $value,
        );
    }

    protected function original(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => str_contains($value, 'https://') || str_contains($value, 'http://') ? $value : asset(
                config('custom.paths.exhibitions.public', 'storage/images/exhibitions') . '/' . $value
            ),
        );
    }
}
