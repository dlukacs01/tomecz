<?php

use App\Http\Controllers\PhotoController;

// PROJECTS
Route::get('/munkak', [PhotoController::class, 'projects'])->name('projects');

// PROJECT
Route::get('/munkak/{category_slug}/{project_slug}/{project}', [PhotoController::class, 'project'])->name('project');

// SHOW
Route::get('/munkak/{category_slug}/{project_slug}/{photo_slug}/{photo}', [PhotoController::class, 'show'])->name('show');
