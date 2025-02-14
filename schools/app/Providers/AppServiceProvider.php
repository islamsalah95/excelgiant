<?php

namespace App\Providers;

use App\Services\UpdateCach;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrapFive();

        // Share the translation files with all views
        View::composer('*', function ($view) {
            // Get the translation files
            $view->with('translationFiles', UpdateCach::getTranslationFiles());
            $view->with('settings',         UpdateCach::settings());


        });
    }




}
