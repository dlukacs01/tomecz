<?php

use App\Http\Controllers\UserController;

// ABOUT
Route::get('/rolam', [UserController::class, 'about'])->name('about');
