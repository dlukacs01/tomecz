<?php

// AUTHOR
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
