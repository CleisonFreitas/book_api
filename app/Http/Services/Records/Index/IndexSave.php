<?php

declare(strict_types=1);

namespace App\Http\Services\Records\Index;

use App\Http\Services\Dtos\IndexObject;
use App\Http\Services\Records\SaveRecord;
use App\Models\Indexes\Index;
use Illuminate\Database\Eloquent\Model;

class IndexSave extends SaveRecord
{
    /**
     * @param IndexObject $indexObject
     * @param Index $model
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function save(IndexObject $indexObject, Index $model): Model
    {
        $model->title = $indexObject->title;
        $model->page = $indexObject->page;
        $model->book_id = $indexObject->bookId;
        $model->parent_id = $indexObject->parentId;
        
        return $this->execute($model);
    }
}