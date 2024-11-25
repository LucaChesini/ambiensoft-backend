<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class RuaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'codigo' => [
                'required',
                'string',
                Rule::unique('ruas', 'codigo')->ignore($this->route('id'))
            ],
            'nome' => 'required|string',
            'bairro_id' => 'required|integer|exists:bairros,id'
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
            'bairro_id.required' => 'O campo de bairro_id deve ser preenchido',
            'bairro_id.integer' => 'O campo de bairro_id deve ser um numero inteiro',
            'bairro_id.exists' => 'O campo de bairro_id informado não existe no sistema',
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
