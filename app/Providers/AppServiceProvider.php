<?php

namespace App\Providers;

use App\Services\NewsServices;
use Illuminate\Support\ServiceProvider;
use jcobhams\NewsApi\NewsApi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NewsServices::class, function ($app) {
            return new NewsServices(new NewsApi(config('api.news_api')));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
