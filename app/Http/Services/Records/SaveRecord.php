<?php

declare(strict_types=1);

namespace App\Http\Services\Records;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SaveRecord
{
    /**
     * @param  Model  $model;
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function execute(Model $model): Model
    {
        try {
            if (! $model->save()) {
                throw new ModelNotFoundException('Model or Record not found');
            }

            return $model;
        } catch (ModelNotFoundException $ex) {
            return response()->json(['error' => [$ex->getMessage()]], 404);
        }
    }
}
