<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoryService
{

    public function getAll(): LengthAwarePaginator
    {
        return Story::orderbyDesc('id')->paginate(config('custom.pagination.stories', 10));
    }

    // KEYWORDS (string)
    public function getKeywords(Story $story): ?string
    {
        return $story->tags ?? null;
    }

    // TAGS (array)
    public function getTags(Story $story): array
    {
        return array_filter(explode(", ", $story->tags));
    }

    public function validateShowRoute(string $story_slug, Story $story): void
    {
        if(
            ($story_slug !== $story->slug)
        ) throw new NotFoundHttpException();
    }
}
