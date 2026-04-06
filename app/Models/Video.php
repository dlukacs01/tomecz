<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /** @use HasFactory<\Database\Factories\VideoFactory> */
    use HasFactory;

    // MASS ASSIGNMENT
    protected $guarded = [];

    // RELATIONSHIPS

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
                config('custom.paths.videos.public', 'storage/images/videos') . '/' . $value
            ),
        );
    }
}
