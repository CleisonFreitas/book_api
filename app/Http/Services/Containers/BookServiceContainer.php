<?php

declare(strict_types=1);

namespace App\Http\Services\Containers;

use App\Http\Interfaces\Book\CreateBookContract;
use Illuminate\Http\JsonResponse;

class BookServiceContainer
{
    public function __construct(
        private CreateBookContract $createBookLogic
    ) {
    }

    /**
     * @param  array  $data;
     * @return \Iluminate\Http\JsonResponse;
     */
    public function store(array $data): JsonResponse
    {
        return $this->createBookLogic->store($data);
    }
}
