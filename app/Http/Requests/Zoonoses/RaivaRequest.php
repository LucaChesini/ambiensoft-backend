<?php

namespace App\Http\Requests\Zoonoses;

use Illuminate\Foundation\Http\FormRequest;

class RaivaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            
        ];

        return $rules;
    }
}
