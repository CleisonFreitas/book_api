<?php

declare(strict_types=1);

namespace App\Http\Services\Containers;

use App\Http\Interfaces\Book\CreateBookContract;
use App\Http\Interfaces\Book\ListBookContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookServiceContainer
{
    public function __construct(
        private CreateBookContract $createBookLogic,
        private ListBookContract $listBookLogic
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

    public function index(Request $request)
    {
        return $this->listBookLogic->index($request);
    }
}
