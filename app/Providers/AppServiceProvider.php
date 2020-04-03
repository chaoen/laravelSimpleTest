<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\GoogleObserver;
use App\Models\GoogleUsers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        GoogleUsers::observe(GoogleObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
