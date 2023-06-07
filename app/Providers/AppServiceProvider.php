<?php

namespace App\Providers;

use App\Services\Clubs\ClubService;
use App\Services\Clubs\Contracts\ClubServiceContract;

use App\Services\Games\Contracts\GamePdfExportContract;
use App\Services\Games\Contracts\GamesPdfServiceContract;
use App\Services\Games\GamePdfExportService;
use App\Services\Games\PdfExportService;
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

        $this->app->singleton(GamesPdfServiceContract::class, PdfExportService::class);
    }
}
