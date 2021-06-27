<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\HomePageComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.MainNav', CategoryComposer::class);
        view()->composer('layouts.frontend_layout', HomePageComposer::class);
    }
}
