<?php

namespace App\Providers;

use App\Services\Clubs\ClubService;
use App\Services\Clubs\Contracts\ClubServiceContract;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ClubServiceContract::class, ClubService::class);
    }
}
