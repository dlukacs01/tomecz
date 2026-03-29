<?php

use App\Http\Controllers\UserController;

Route::resource('users', UserController::class)->only(['edit', 'update']);

Route::get('/users/{user}/password', [UserController::class, 'password_edit'])->name('user.password.edit');
Route::patch('/users/{user}/password', [UserController::class, 'password_update'])->name('user.password.update');
