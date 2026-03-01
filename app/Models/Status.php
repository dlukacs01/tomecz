<?php

namespace App\Models;

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
}
