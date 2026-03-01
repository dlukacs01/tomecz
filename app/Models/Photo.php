<?php

namespace App\Models;

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
}
