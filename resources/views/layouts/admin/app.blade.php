<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-admin.head
        :keywords="getKeywords($keywords ?? null)"
        :title="getTitle($title ?? null)" />
    <x-admin.body/>
</html>
