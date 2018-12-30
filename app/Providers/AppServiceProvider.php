<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        //Force to https for production
        if($this->app->environment('production')) {
            \URL::forceScheme('https');
        }
        view()->composer('admin.layout.header', function ($view) {
            $view->with('user', Auth::user());
        });
        view()->composer('layout.header',function($view){
            $view->with('nguoidung', Auth::user());
        });
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
