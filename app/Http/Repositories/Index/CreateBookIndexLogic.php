<?php

declare(strict_types=1);

namespace App\Http\Repositories\Index;

use App\Http\Interfaces\Index\CreateBookIndexContract;
use App\Http\Services\Dtos\IndexObject;
use App\Http\Services\Records\Index\IndexSave;
use App\Http\Services\Validations\IndexValidation;
use App\Models\Indexes\Index;
use Illuminate\Database\Eloquent\Collection;

class CreateBookIndexLogic implements CreateBookIndexContract
{
    public function __construct(
        private IndexSave $indexSave,
        private IndexValidation $validator
    ) {
    }

    public function store(
        array $data,
        int $bookId,
        int $parentId = null
    ) {
        $this->validator->execute($data);

        $collection = new Collection($data);

        $collection->each(function ($newItem) use ($bookId, $parentId) {
            $indexObject = new IndexObject(
                $newItem['title'],
                (int)$newItem['page'],
                $bookId,
                $parentId
            );

            $record = $this->indexSave->save($indexObject, new Index());

            if (isset($newItem['subindex'])) {
                return $this->store($newItem['subindex'], $record->book_id, $record->id);
            }
        });
    }
}
