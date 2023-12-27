<?php

namespace App\Http\Controllers\Book;

use App\Http\Services\Containers\BookServiceContainer;
use Illuminate\Http\Request;

class BookController
{
    public function __construct(
        public BookServiceContainer $bookService
    ) {
    }

    public function store(Request $request)
    {
        return $this->bookService->store($request->all());
    }
}
