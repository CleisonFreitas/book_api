<?php

declare(strict_types=1);

namespace App\Http\Services\Containers;

use App\Http\Interfaces\Index\CreateBookIndexContract;

class IndexServiceContainer
{
    public function __construct(
        private CreateBookIndexContract $createIndexLogic
    ) {
    }

    /**
     * @param array $data,
     * @param int $bookId,
     */
    public function store(
        array $data,
        int $bookId
    ) {
        return $this->createIndexLogic->store($data, $bookId);
    }
}
