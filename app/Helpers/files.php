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

// PATH (delete)
function getPathForDelete(string $path, string $filename): string
{
    $filename = basename($filename);
    return $path . '/' . $filename;
}

// DELETE (one)
function deleteOne(string $path): void
{
    if (!Storage::exists($path)) {
        Log::error('File not found for deleteOne method: ' . $path);
        return;
    }

    if (!Storage::delete($path)) {
        Log::error('Deleting one file failed for deleteOne method: ' . $path);
    }
}
