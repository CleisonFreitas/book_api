<?php

declare(strict_types=1);

namespace App\Http\Repositories\Book;

use App\Http\Interfaces\Book\ListBookContract;
use App\Http\Resources\BookResource;
use App\Http\Services\Filters\ByIndexTitle;
use App\Http\Services\Filters\ByTitle;
use App\Models\Book\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ListBookLogic implements ListBookContract
{
    public function __construct(
        private Book $book
    ) {
    }

    /**
     * @param Request $request
     * @return \Iluminate\Http\JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $pipelines = [
            ByTitle::class,
            ByIndexTitle::class,
        ];

        $data = app(Pipeline::class)
            ->send(Book::query())
            ->through($pipelines)
            ->thenReturn()
            ->paginate();

        return response()->json(BookResource::collection($data), 200);
    }
}
