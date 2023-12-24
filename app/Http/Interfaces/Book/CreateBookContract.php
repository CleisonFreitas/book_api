<?php

declare(strict_types=1);

namespace App\Http\Interfaces\Book;

use Illuminate\Http\JsonResponse;

interface CreateBookContract
{
    public function store(array $data): JsonResponse;
}
