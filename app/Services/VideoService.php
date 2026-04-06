<?php

namespace App\Services;

use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

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

    // ADMIN (position)
    public function getAllForAdminPosition(): Collection
    {
        return Video::orderBy('position')->get();
    }

    // ADMIN (index)
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

    // UPLOAD
    public function upload(UploadedFile $upload, string $filename): void
    {
        $image = ImageManager::usingDriver(Driver::class)->decode($upload);
        $height = config('custom.sizes.videos.height', 1000);
        $image->scale(height: $height);
        $image->encodeUsingFormat(Format::WEBP);
        $path = getPathForUpload(
            config('custom.paths.videos.upload', 'app/public/images/videos'),
            $filename
        );
        $image->save($path);
    }
}
