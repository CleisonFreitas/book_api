<?php

declare(strict_types=1);

namespace App\Http\Services\Validations;

use Illuminate\Support\Facades\Validator;

class IndexValidation
{
    public function execute(array $data)
    {
        return Validator::make($data, [
            'index.*.title' => ['required','string','max:64'],
            'index.*.page' => ['required','numeric'],
            'index.*.subindex' => ['array'],
            '*.subindex.*.title' => ['required','string','max:64'],
            '*.subindex.*.page' => ['required','numeric'],
        ])->validate();
    }
}
