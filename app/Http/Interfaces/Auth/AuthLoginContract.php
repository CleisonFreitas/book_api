<?php

namespace App\Http\Interfaces\Auth;

use Illuminate\Http\JsonResponse;

interface AuthLoginContract
{
    public function login(): JsonResponse;
}
