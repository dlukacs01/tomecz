<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

// ADMIN

Route::get('/admin', [AdminController::class, 'index'])
    ->name('admin.index')
    ->middleware('auth', 'verified');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
