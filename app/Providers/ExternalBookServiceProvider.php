<?php

namespace App\Providers;

use App\Contract\ExternalBookContract;
use App\Services\ExternalBookService;
use Illuminate\Support\ServiceProvider;

class ExternalBookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExternalBookContract::class, ExternalBookService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
