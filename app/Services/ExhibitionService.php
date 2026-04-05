<?php

namespace App\Services;

use App\Models\Exhibition;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

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
                CASE statuses.slug
                    WHEN 'kozelgo' THEN 1
                    WHEN 'aktualis' THEN 2
                    WHEN 'archiv' THEN 3
                    ELSE 4
                END
            ")
            ->orderByDesc('exhibitions.id')
            ->select('exhibitions.*') // important to avoid column conflicts
            ->paginate(config('custom.pagination.admin', 10));
    }

    // UPLOAD
    public function upload(UploadedFile $upload, string $filename): void
    {
        $image_original = ImageManager::usingDriver(Driver::class)->decode($upload);
        $image_thumbnail = ImageManager::usingDriver(Driver::class)->decode($upload);

        $height_original = config('custom.sizes.exhibitions.original.height', 1000);
        $height_thumbnail = config('custom.sizes.exhibitions.thumbnail.height', 500);

        $image_original->scale(height: $height_original);
        $image_original->encodeUsingFormat(Format::WEBP);

        $image_thumbnail->scale(height: $height_thumbnail);
        $image_thumbnail->encodeUsingFormat(Format::WEBP);

        $path_original = getPathForUpload(
            config('custom.paths.exhibitions.original.upload', 'app/public/images/exhibitions/original'),
            $filename
        );
        $path_thumbnail = getPathForUpload(
            config('custom.paths.exhibitions.thumbnail.upload', 'app/public/images/exhibitions/thumbnail'),
            $filename
        );

        $image_original->save($path_original);
        $image_thumbnail->save($path_thumbnail);
    }

    // DELETE (one)
    public function deleteFiles(Exhibition $exhibition): void
    {
        // original
        $path_original = getPathForDelete(
            config('custom.paths.exhibitions.original.delete', 'images/exhibitions/original'),
            $exhibition->original
        );
        deleteOne($path_original);

        // thumbnail
        $path_thumbnail = getPathForDelete(
            config('custom.paths.exhibitions.thumbnail.delete', 'images/exhibitions/thumbnail'),
            $exhibition->thumbnail
        );
        deleteOne($path_thumbnail);
    }
}
