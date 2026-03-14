<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    /** @use HasFactory<\Database\Factories\StoryFactory> */
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

    protected function intro(): Attribute
    {
        return Attribute::make(
            get: fn (?string $value) => app()->getLocale() === 'en' && !empty($this->intro_en) ? $this->intro_en : $value,
        );
    }

    protected function formattedDate(): Attribute
    {
        return Attribute::make(
            get: function () {
                $locale = app()->getLocale();

                return $this->created_at
                    ?->locale($locale)
                    ->isoFormat($locale === 'en'
                        ? 'MMMM D, YYYY'
                        : 'YYYY. MMMM D.');
            }
        );
    }
}
