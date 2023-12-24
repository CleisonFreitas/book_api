<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Interfaces\Book\CreateBookContract;
use App\Http\Services\Containers\AuthServiceContainer;
use App\Http\Services\Containers\BookServiceContainer;
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

        $this->app->bind(BookServiceContainer::class, function ($app) {
            return new BookServiceContainer($app->make(CreateBookContract::class));
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
