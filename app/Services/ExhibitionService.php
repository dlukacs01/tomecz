<?php

namespace App\Services;

use App\Models\Exhibition;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ExhibitionService
{

    public function getAll(): Collection
    {
        return Exhibition::orderbyDesc('id')->get();
    }

    public function getAllForAdminIndex(): LengthAwarePaginator
    {
        return Exhibition::with('status')
            ->join('statuses', 'exhibitions.status_id', '=', 'statuses.id')
            ->orderByRaw("
                CASE statuses.name
                    WHEN 'upcoming' THEN 1
                    WHEN 'current' THEN 2
                    WHEN 'archive' THEN 3
                    ELSE 4
                END
            ")
            ->orderByDesc('exhibitions.id')
            ->select('exhibitions.*') // important to avoid column conflicts
            ->paginate(config('custom.pagination.admin', 10));
    }
}
