<?php

namespace App\Providers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Repositories\Auth\AuthLoginLogic;
use App\Http\Repositories\Auth\AuthLogoutLogic;
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
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
