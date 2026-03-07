<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhotoService
{

    // PROJECT
    public function getByProject(Project $project): LengthAwarePaginator
    {
        return $project->photos()
            ->orderByDesc('id')
            ->paginate(config('custom.pagination.photos', 10));
    }
}
