<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
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

    // ADMIN (index)
    public function getAllForAdminIndex(): LengthAwarePaginator
    {
        return Project::with(['category', 'photos'])
            ->latest('id')
            ->paginate(config('custom.pagination.admin', 10));
    }

    // check if we have at least one project (for photo create)
    public function atLeastOneProjectExists(): bool
    {
        return Project::query()->exists();
    }

    // admin photo create ajax
    public function getByCategoryId(int $category_id): Collection
    {
        $category = Category::findOrFail($category_id);
        return $category->projects;
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

    // DELETE (one)
    public function deleteFiles(Project $project): void
    {
        $path = getPathForDelete(
            config('custom.paths.projects.delete', 'images/projects'),
            $project->original
        );
        deleteOne($path);
    }
}
