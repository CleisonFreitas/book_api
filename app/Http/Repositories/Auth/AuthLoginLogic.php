<?php

declare(strict_types=1);

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Auth\AuthLoginContract;
use App\Http\Services\Traits\GetMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthLoginLogic implements AuthLoginContract
{
    use GetMiddleware;

    /**
     * Get a JWT via given credentials.
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
}
