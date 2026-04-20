<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePlaceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'place_id'   => ['required', 'string'],
        ];
    }
}
