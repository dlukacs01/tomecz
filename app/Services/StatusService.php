<?php

namespace App\Services;

use App\Models\Status;
use Illuminate\Database\Eloquent\Collection;

class StatusService
{
    public function getAll(): Collection
    {
        return Status::orderByRaw("
            CASE slug
                WHEN 'kozelgo' THEN 1
                WHEN 'aktualis' THEN 2
                WHEN 'archiv' THEN 3
                ELSE 4
            END
        ")->get();
    }
}
