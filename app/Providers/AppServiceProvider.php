<?php

namespace App\Providers;
use Orchid\Icons\IconFinder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot(IconFinder $iconFinder)
    {
        $iconFinder->registerIconDirectory('fa', storage_path('images/icons'));
        Paginator::useBootstrap();
    }
}
