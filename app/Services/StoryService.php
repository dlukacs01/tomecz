<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoryService
{

    // HOME
    public function getAll(): LengthAwarePaginator
    {
        return Story::orderbyDesc('id')->paginate(config('custom.pagination.stories', 10));
    }

    // ADMIN
    public function getAllForAdminIndex(): LengthAwarePaginator
    {
        return Story::orderByDesc('id')->paginate(config('custom.pagination.admin', 10));
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

    public function upload(mixed $upload, string $filename)
    {
        $image = ImageManager::usingDriver(Driver::class)->decode($upload);
        $height = config('custom.sizes.stories.height', 1000);
        $image->scale(height: $height);
        $image->encodeUsingFormat(Format::WEBP);
        $path = getPathForUpload(
            config('custom.paths.stories.upload', 'app/public/images/stories'),
            $filename
        );
        $image->save($path);
    }

    public function validateShowRoute(string $story_slug, Story $story): void
    {
        if(
            ($story_slug !== $story->slug)
        ) throw new NotFoundHttpException();
    }
}
