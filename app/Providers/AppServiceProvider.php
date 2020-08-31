<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Services\Contracts\PostsServiceInterface',
            'App\Services\PostsService',
        );

        $this->app->bind(
            'App\Repositories\Contracts\PostsRepositoryInterface',
            'App\Repositories\PostsRepository'
        );
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
