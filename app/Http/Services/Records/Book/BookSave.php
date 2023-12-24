<?php

declare(strict_types=1);

namespace App\Http\Services\Records\Book;

use App\Http\Services\Dtos\BookObject;
use App\Http\Services\Records\SaveRecord;
use App\Models\Book\Book;
use Illuminate\Database\Eloquent\Model;

class BookSave extends SaveRecord
{
    /**
     * @param  BookObject  $bookObject;
     * @param  Book  $model;
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(BookObject $bookObject, Book $model): Model
    {
        $model->title = $bookObject->title;
        $model->publisher_id = $bookObject->getPublisher();

        return $this->execute($model);
    }
}
