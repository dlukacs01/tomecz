<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-home.head
        :keywords="getKeywords($keywords ?? null)"
        :title="getTitle($title ?? null)" />
    <x-home.body/>
</html>
