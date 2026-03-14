<?php

use App\Http\Controllers\StoryController;

// STORIES
Route::get('/hirek', [StoryController::class, 'stories'])->name('stories');

// SHOW
Route::get('/hirek/{story_slug}/{story}', [StoryController::class, 'show'])->name('show');
