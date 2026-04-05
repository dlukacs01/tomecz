<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class VideoService
{

    // RECENT
    public function getRecent(): Collection
    {
        return Video::latest('id')
            ->take(config('custom.videos', 2))
            ->get();
    }

    // ALL (home)
    public function getAll(): Collection
    {
        return Video::latest('id')->get();
    }

    // ALL (admin)
    public function getAllForAdminIndex(): LengthAwarePaginator
    {
        return Video::latest('id')->paginate(config('custom.pagination.admin', 10));
    }

    // SEARCH
    public function getBySearch(string $search): Collection
    {
        $searchValues = array_filter(explode(' ', $search)); // Remove empty words

        return Video::where(function ($query) use ($searchValues) {
            foreach ($searchValues as $searchValue) {
                $searchPattern = "%$searchValue%";
                $query->orWhere('title', 'LIKE', $searchPattern)
                    ->orWhere('title_en', 'LIKE', $searchPattern)
                    ->orWhere('tags', 'LIKE', $searchPattern)
                    ->orWhere('tags_en', 'LIKE', $searchPattern);
            }
        })
        ->latest('id')
        ->get();
    }
}
