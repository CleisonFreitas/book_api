<?php

declare(strict_types=1);

namespace App\Http\Services\Containers;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Interfaces\Auth\AuthLogoutContract;
use App\Http\Services\Traits\GetMiddleware;
use Illuminate\Http\JsonResponse;

class AuthServiceContainer
{
    use GetMiddleware;

    /**
     * @return void
     */
    public function __construct(
        private AuthLoginContract $authLoginLogic,
        private AuthLogoutContract $authLogoutLogic
    ) {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function login(): JsonResponse
    {
        return $this->authLoginLogic->login();
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function logout(): JsonResponse
    {
        return $this->authLogoutLogic->logout();
    }
}
