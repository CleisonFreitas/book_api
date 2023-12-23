<?php

namespace App\Http\Controllers\Auth;

use App\Http\Services\Containers\AuthServiceContainer;

class AuthController
{
    public function __construct(
        private AuthServiceContainer $serviceContainer
    ) {
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function login()
    {
        return $this->serviceContainer->login();
    }

    /**
     * @return \Illuminate\Http\JsonResponse;
     */
    public function logout()
    {
        return $this->serviceContainer->logout();
    }
}
