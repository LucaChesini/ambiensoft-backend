<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BairroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'codigo' => 'required|string|unique:bairros,codigo',
            'nome' => 'required|string'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'codigo.required' => 'O campo de código deve ser preenchido',
            'codigo.string' => 'O campo de código deve ser uma string',
            'codigo.unique' => 'O código informado já existe no sistema',
            'nome.required' => 'O campo de nome deve ser preenchido',
            'nome.string' => 'O campo de nome deve ser uma string',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'Erro de validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
