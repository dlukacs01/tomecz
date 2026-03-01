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
