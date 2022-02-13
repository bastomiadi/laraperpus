<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 'canLogin' => fn () => Route::has('login') ? Route::has('login') : null,
        //     'canRegister' => fn () => Route::has('register') ? Route::has('register') : null,
        // Inertia::share('canLogin', function () {
        //     return Route::has('login');
        // });
    }
}
