<?php

declare(strict_types=1);

namespace App\Http\Interfaces\Book;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface ListBookContract
{
    /**
     * @param Request $request
     * @return \Iluminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse;
}