<?php

declare(strict_types=1);

namespace App\Http\Services\Validations;

use Illuminate\Support\Facades\Validator;

class BookValidation
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:64'],
            'index' => ['required','array'],
            'index.*.title' => ['required','string','max:64'],
            'index.*.page' => ['required','numeric'],
            'subindex.*.title' => ['required','string','max:64'],
            'subindex.*.page' => ['required','numeric'],
        ])->validate();
    }
}
