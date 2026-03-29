<?php

use App\Http\Controllers\ProjectController;

Route::resource('projects', ProjectController::class);

Route::get('/projects/select', [ProjectController::class, 'select'])->name('project.select');
