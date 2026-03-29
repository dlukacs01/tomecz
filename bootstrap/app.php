<?php

use App\Http\Middleware\Locale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->name('user.')->group(base_path('routes/home/users.php'));
            Route::middleware('web')->name('photo.')->group(base_path('routes/home/photos.php'));
            Route::middleware('web')->name('exhibition.')->group(base_path('routes/home/exhibitions.php'));
            Route::middleware('web')->name('story.')->group(base_path('routes/home/stories.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/users.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/categories.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/projects.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/photos.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/exhibitions.php'));
            Route::middleware(['web', 'auth', 'verified'])->prefix('admin')->name('admin.')->group(base_path('routes/admin/stories.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //

        $middleware->web(append: [Locale::class]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
