<?php

declare(strict_types=1);

namespace App\Http\Services\Dtos;

use Illuminate\Support\Facades\Auth;

class BookObject
{
    private $publisher;

    public function __construct(
        public string $title
    ) {
        $this->publisher = Auth::user();
    }

    /**
     * @return int;
     */
    public function getPublisher(): int
    {
        return $this->publisher->id;
    }
}
