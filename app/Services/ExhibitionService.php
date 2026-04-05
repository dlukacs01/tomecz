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
        $image = ImageManager::usingDriver(Driver::class)->decode($upload);
        $height = config('custom.sizes.exhibitions.height', 1000);
        $image->scale(height: $height);
        $image->encodeUsingFormat(Format::WEBP);
        $path = getPathForUpload(
            config('custom.paths.exhibitions.upload', 'app/public/images/exhibitions'),
            $filename
        );
        $image->save($path);
    }
}
