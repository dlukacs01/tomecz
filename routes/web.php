<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// SYSTEM

// phpinfo
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/phpinfo', function () { phpinfo(); });
});

// HOME

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/kereses', [HomeController::class, 'search'])->name('home.search');
Route::post('/locale', [HomeController::class, 'locale'])->name('home.locale');
