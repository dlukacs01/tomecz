<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoryService
{

    public function getAll(): Collection
    {
        return Story::orderbyDesc('id')->get();
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
