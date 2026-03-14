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
