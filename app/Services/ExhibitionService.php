<?php

namespace App\Services;

use App\Models\Exhibition;
use Illuminate\Database\Eloquent\Collection;

class ExhibitionService
{

    public function getAll(): Collection
    {
        return Exhibition::orderbyDesc('id')->get();
    }
}
