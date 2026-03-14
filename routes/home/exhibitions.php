<?php

// EXHIBITIONS
use App\Http\Controllers\ExhibitionController;

Route::get('/kiallitasok', [ExhibitionController::class, 'exhibitions'])->name('exhibitions');
