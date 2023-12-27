<?php

use App\Http\Controllers\Book\BookController;
use Illuminate\Support\Facades\Route;

Route::controller(BookController::class)->group(function () {
    Route::post('/books', 'store');
});
