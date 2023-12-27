<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Interfaces\Book\CreateBookContract;
use App\Http\Interfaces\Index\CreateBookIndexContract;
use App\Http\Repositories\Auth\AuthLoginLogic;
use App\Http\Repositories\Auth\AuthLogoutLogic;
use App\Http\Repositories\Book\CreateBookLogic;
use App\Http\Repositories\Index\CreateBookIndexLogic;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthLoginContract::class, AuthLoginLogic::class);
        $this->app->bind(AuthLogoutContract::class, AuthLogoutLogic::class);
        $this->app->bind(CreateBookContract::class, CreateBookLogic::class);
        $this->app->bind(CreateBookIndexContract::class, CreateBookIndexLogic::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
