<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PhotoService
{

    // PROJECT
    public function getByProject(Project $project): LengthAwarePaginator
    {
        return $project->photos()
            ->orderByDesc('id')
            ->paginate(config('custom.pagination.photos', 10));
    }

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
            ->orderByDesc('id')
            ->paginate(config('custom.pagination.photos', 10))
            ->withQueryString();
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
