<?php

use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class)->except(['index']);

Route::get('/photos/project/{project}', [PhotoController::class, 'project_admin'])->name('photo.project');

Route::get('/photos/pc', [PhotoController::class, 'pc'])->name('photo.pc');
Route::get('/photos/pe', [PhotoController::class, 'pe'])->name('photo.pe');
