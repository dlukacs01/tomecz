<?php

// FILENAME
function getFilename(): string
{
    return time() . '_' . Str::random(config('custom.random.filename', 30)) . '.webp';
}

// EXTENSIONS
function getExtensions(): string
{
    return implode(", ", config(
        'custom.validations.extensions',
        ['jpg', 'jpeg', 'png', 'bmp', 'gif', 'webp']
    ));
}

// PATH (upload)
function getPathForUpload(string $path, string $filename): string
{
    return storage_path($path . '/' . $filename);
}
