<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;

class StoryService
{

    public function getAll(): Collection
    {
        return Story::orderbyDesc('id')->get();
    }
}
