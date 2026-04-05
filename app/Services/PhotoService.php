<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PhotoService
{

    // PROJECT
    public function getByProject(Project $project): LengthAwarePaginator
    {
        return $project->photos()
            ->latest('id')
            ->paginate(config('custom.pagination.photos', 10));
    }

    // SEARCH
    public function getBySearch(string $search): LengthAwarePaginator
    {
        $searchValues = array_filter(explode(' ', $search)); // Remove empty words

        return Photo::where(function ($query) use ($searchValues) {
                foreach ($searchValues as $searchValue) {
                    $searchPattern = "%$searchValue%";
                    $query->orWhere('title', 'LIKE', $searchPattern)
                        ->orWhere('title_en', 'LIKE', $searchPattern)
                        ->orWhere('tags', 'LIKE', $searchPattern)
                        ->orWhere('tags_en', 'LIKE', $searchPattern);
                }
            })
            ->latest('id')
            ->paginate(config('custom.pagination.photos', 10))
            ->withQueryString();
    }

    // PROJECT (admin)
    public function getByProjectForAdmin(Project $project): LengthAwarePaginator
    {
        return $project->photos()->orderBy('position')->paginate(config('custom.pagination.admin', 10));
    }

    // VIEWS
    public function setViews(Photo $photo): void
    {
        $photo->views++;
        $photo->save();
    }

    // KEYWORDS (string)
    public function getKeywords(Photo $photo): ?string
    {
        return $photo->tags ?? null;
    }

    // TAGS (array)
    public function getTags(Photo $photo): array
    {
        return array_filter(explode(", ", $photo->tags));
    }

    // PREV
    public function getPrevious(Photo $photo): ?Photo
    {
        $project = $photo->project;
        if (!$project) {
            return null;
        }

        return $project->photos()
            ->where('photos.id', '<', $photo->id)
            ->orderByDesc('photos.id')
            ->first();
    }

    // NEXT
    public function getNext(Photo $photo): ?Photo
    {
        $project = $photo->project;
        if (!$project) {
            return null;
        }

        return $project->photos()
            ->where('photos.id', '>', $photo->id)
            ->orderBy('photos.id')
            ->first();
    }

    // UPLOAD
    public function upload(UploadedFile $upload, string $filename): void
    {
        $image_original = ImageManager::usingDriver(Driver::class)->decode($upload);
        $image_thumbnail = ImageManager::usingDriver(Driver::class)->decode($upload);

        $height_original = config('custom.sizes.photos.original.height', 1000);
        $height_thumbnail = config('custom.sizes.photos.thumbnail.height', 500);

        $image_original->scale(height: $height_original);
        $image_original->encodeUsingFormat(Format::WEBP);

        $image_thumbnail->scale(height: $height_thumbnail);
        $image_thumbnail->encodeUsingFormat(Format::WEBP);

        $path_original = getPathForUpload(
            config('custom.paths.photos.original.upload', 'app/public/images/photos/original'),
            $filename
        );
        $path_thumbnail = getPathForUpload(
            config('custom.paths.photos.thumbnail.upload', 'app/public/images/photos/thumbnail'),
            $filename
        );

        $image_original->save($path_original);
        $image_thumbnail->save($path_thumbnail);
    }

    // DELETE (one)
    public function deleteFiles(Photo $photo): void
    {
        // original
        $path_original = getPathForDelete(
            config('custom.paths.photos.original.delete', 'images/photos/original'),
            $photo->original
        );
        deleteOne($path_original);

        // thumbnail
        $path_thumbnail = getPathForDelete(
            config('custom.paths.photos.thumbnail.delete', 'images/photos/thumbnail'),
            $photo->thumbnail
        );
        deleteOne($path_thumbnail);
    }

    // DELETE (all for project)
    public function deleteByProject(Project $project): void
    {
        $photos = $project->photos;
        $files = [];
        foreach ($photos as $photo) {

            // originals
            $path_original = getPathForDelete(
                config('custom.paths.photos.original.delete', 'images/photos/original'),
                $photo->original
            );
            $files[] = $path_original;

            // thumbnails
            $path_thumbnail = getPathForDelete(
                config('custom.paths.photos.thumbnail.delete', 'images/photos/thumbnail'),
                $photo->thumbnail
            );
            $files[] = $path_thumbnail;

        }
        deleteMultiple($files);
    }

    // VALIDATE (project)
    public function validateProjectRoute(string $category_slug, string $project_slug, Project $project): void
    {
        if(
            ($category_slug !== $project->category->slug) ||
            ($project_slug !== $project->slug)
        ) throw new NotFoundHttpException();
    }

    // VALIDATE (show)
    public function validateShowRoute(string $category_slug, string $project_slug, string $photo_slug, Photo $photo): void
    {
        if(
            ($category_slug !== $photo->project->category->slug) ||
            ($project_slug !== $photo->project->slug) ||
            ($photo_slug !== $photo->slug)
        ) throw new NotFoundHttpException();
    }
}
