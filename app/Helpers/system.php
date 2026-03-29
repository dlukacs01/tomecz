<?php

// AUTHOR
use Illuminate\Database\Eloquent\Collection;

function getAuthor(): string
{
    return config('custom.author', 'David Lukacs');
}

// DESCRIPTION
function getDescription(): string
{
    return __('Tomecz Dániel képzőművész.');
}

// TITLE
function getTitle(?string $title): string
{
    return $title ?? __('Tomecz Dániel');
}

// KEYWORDS
function getKeywords(?string $keywords): string
{
    return $keywords ?? implode(', ', config(__('custom.keywords.hu')));
}

// SLUG
function getSlug(string $title): string
{
    return ($slug = Str::slug($title)) === '' ? 'default-slug' : $slug;
}

// POSITION (get)
function getPosition(?Collection $objects): int
{
    return $objects ? $objects->max('position') + 1 : 1;
}
