<?php

// PHOTOS
use App\Http\Controllers\PhotoController;

Route::get('/munkak', [PhotoController::class, 'projects'])->name('projects');
