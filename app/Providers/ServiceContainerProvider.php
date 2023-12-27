<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Interfaces\Book\CreateBookContract;
use App\Http\Interfaces\Index\CreateBookIndexContract;
use App\Http\Services\Containers\AuthServiceContainer;
use App\Http\Services\Containers\BookServiceContainer;
use App\Http\Services\Containers\IndexServiceContainer;
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

        $this->app->bind(IndexServiceContainer::class, function ($app) {
            return new IndexServiceContainer($app->make(CreateBookIndexContract::class));
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
