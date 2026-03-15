<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        // ROUTE VALIDATION
        Route::pattern('category_slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
        Route::pattern('project_slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
        Route::pattern('photo_slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
        Route::pattern('story_slug', '^[a-z0-9]+(?:-[a-z0-9]+)*$');
        Route::pattern('project', '[0-9]+');
        Route::pattern('photo', '[0-9]+');
        Route::pattern('story', '[0-9]+');

        // PAGINATION
        Paginator::useBootstrapFive();
    }
}
