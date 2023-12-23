<?php

declare(strict_types=1);

namespace App\Http\Repositories\Auth;

use App\Http\Interfaces\Auth\AuthLogoutContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthLogoutLogic implements AuthLogoutContract
{
    /**
     * Log the user out (Invalidate the token).
     */
    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
