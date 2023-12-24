<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Http\Services\Containers\BookServiceContainer;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(
        private BookServiceContainer $bookService
    ) {
    }

    public function store(Request $request)
    {
        return $this->bookService->store($request->all());
    }
}
