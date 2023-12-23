<?php

namespace App\Http\Interfaces\Auth;

use Illuminate\Http\JsonResponse;

interface AuthLogoutContract
{
    public function logout(): JsonResponse;
}
