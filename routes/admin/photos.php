<?php

use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class)->except(['index']);

Route::get('/photos/pc', [PhotoController::class, 'pc'])->name('photo.pc');
