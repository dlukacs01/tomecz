<?php

namespace App\Models;

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
}
