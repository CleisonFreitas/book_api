<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',

], function () {
    Route::controller(AuthController::class)
        ->group(function () {
            Route::post('login', 'login');
            Route::post('logout', 'logout');
        });
});
