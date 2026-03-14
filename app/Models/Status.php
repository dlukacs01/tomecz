<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;

    // MASS ASSIGNMENT
    protected $guarded = [];

    // RELATIONSHIPS

    /**
     * Get the exhibitions for the status.
     */
    public function exhibitions(): HasMany
    {
        return $this->hasMany(Exhibition::class);
    }

    // ACCESSORS
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => app()->getLocale() === 'en' && !empty($this->name_en) ? $this->name_en : $value,
        );
    }
}
