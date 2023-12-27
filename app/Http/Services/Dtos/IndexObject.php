<?php

declare(strict_types=1);

namespace App\Http\Services\Dtos;

class IndexObject
{
    /**
     * @param string $title
     * @param int $page
     * @param int $bookId
     * @param int|null $parentId
     */
    public function __construct(
        public string $title,
        public int $page,
        public int $bookId,
        public int|null $parentId
    ) {
    }
}
