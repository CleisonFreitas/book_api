<?php

declare(strict_types=1);

namespace App\Http\Repositories\Book;

use App\Http\Interfaces\Book\CreateBookContract;
use App\Http\Resources\BookResource;
use App\Http\Services\Dtos\BookObject;
use App\Http\Services\Records\Book\BookSave;
use App\Http\Services\Validations\BookValidation;
use App\Models\Book\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CreateBookLogic implements CreateBookContract
{
    public function __construct(
        private Book $book,
        private BookSave $bookSave,
        private BookValidation $bookValidator
    ) {
    }

    /**
     * @param  array  $data;
     * @return \Iluminate\Http\JsonResponse;
     */
    public function store(array $data): JsonResponse
    {
        try {
            $this->bookValidator->validator($data);

            DB::beginTransaction();
            $bookObject = new BookObject($data['title']);

            $newBook = $this->bookSave->save($bookObject, $this->book);

            $resource = new BookResource($newBook);

            return response()->json(['success' => $resource], 201);
            DB::commit();
        } catch (ValidationException $ex) {
            DB::rollBack();

            return response()->json(['errors' => [$ex->validator->errors()]], 422);
        }
    }
}
