<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;

class ProjectService
{

    // ADMIN (position)
    public function getAllForAdminPosition(): Collection
    {
        return Project::orderBy('position')->get();
    }

    // UPLOAD
    public function upload(UploadedFile $upload, string $filename): void
    {
        $image = ImageManager::usingDriver(Driver::class)->decode($upload);
        $height = config('custom.sizes.projects.height', 1000);
        $image->scale(height: $height);
        $image->encodeUsingFormat(Format::WEBP);
        $path = getPathForUpload(
            config('custom.paths.projects.upload', 'app/public/images/projects'),
            $filename
        );
        $image->save($path);
    }
}
