<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Services\Containers\AuthServiceContainer;
use Illuminate\Support\ServiceProvider;

class ServiceContainerProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthServiceContainer::class, function ($app) {
            return new AuthServiceContainer(
                $app->make(AuthLoginContract::class),
                $app->make(AuthLogoutContract::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
