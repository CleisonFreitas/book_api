<?php

namespace App\Http\Interfaces\Index;

use Illuminate\Http\JsonResponse;

interface CreateBookIndexContract
{
    public function store(
        array $data,
        int $bookId,
        int $parent_id = null
    );
}