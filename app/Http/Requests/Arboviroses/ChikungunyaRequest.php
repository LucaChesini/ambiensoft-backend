<?php

namespace App\Http\Requests\Arboviroses;

use App\Enums\Arboviroses;
use App\Enums\Sexo;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ChikungunyaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            "doenca" => [
                'required',
                'string',
                'in:' . implode(',', array_keys(Arboviroses::getOptions())),
            ],
            "unidade_saude" => 'nullable|string',
            "nome" => 'required|string',
            "data_nascimento" => 'required|date|date_format:Y-m-d',
            "idade" => 'required|integer',
            "sexo" => [
                'required',
                'in:' . implode(',', array_keys(Sexo::getOptions())),
            ],
            "numero_sus" => 'nullable|integer',
            "municipio_residencia" => 'required|string',
            "bairro_id" => 'required|exists:bairros,id',
            "rua_id" => 'required|exists:ruas,id|combinacao_bairro_rua:bairro_id',
            "numero" => 'required|integer',
            "sinais" => 'nullable|array',
            "sinais.*" => 'required|integer',
            "doencas" => 'nullable|array',
            "doencas.*" => 'required|integer'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'doenca.required' => 'O campo "doença" é obrigatório.',
            'doenca.string' => 'O campo "doença" deve ser uma string.',
            'doenca.in' => 'O valor selecionado para "doença" é inválido.',
            'unidade_saude.string' => 'O campo "unidade de saúde" deve ser uma string.',
            'nome.required' => 'O campo "nome" é obrigatório.',
            'nome.string' => 'O campo "nome" deve ser uma string.',
            'data_nascimento.required' => 'O campo "data de nascimento" é obrigatório.',
            'data_nascimento.date' => 'O campo "data de nascimento" deve ser uma data válida.',
            'data_nascimento.date_format' => 'O campo "data de nascimento" deve estar no formato Y-m-d (ex: 2024-11-30).',
            'idade.required' => 'O campo "idade" é obrigatório.',
            'idade.integer' => 'O campo "idade" deve ser um número inteiro.',
            'sexo.required' => 'O campo "sexo" é obrigatório.',
            'sexo.in' => 'O valor selecionado para "sexo" é inválido.',
            'numero_sus.integer' => 'O campo "número SUS" deve ser um número inteiro.',
            'municipio_residencia.required' => 'O campo "município de residência" é obrigatório.',
            'municipio_residencia.string' => 'O campo "município de residência" deve ser uma string.',
            'bairro_id.required' => 'O campo "bairro" é obrigatório.',
            'bairro_id.exists' => 'O bairro selecionado não existe.',
            'rua_id.required' => 'O campo "rua" é obrigatório.',
            'rua_id.exists' => 'A rua selecionada não existe.',
            'rua_id.combinacao_bairro_rua' => 'A rua selecionada não está relacionada com o bairro selecionado.',
            'numero.required' => 'O campo "número" é obrigatório.',
            'numero.integer' => 'O campo "número" deve ser um número inteiro.',
            'sinais.array' => 'O campo "sinais" deve ser um array.',
            'sinais.*.required' => 'Cada sinal é obrigatório.',
            'sinais.*.integer' => 'Cada sinal deve ser um número inteiro.',
            'doencas.array' => 'O campo "doencas" deve ser um array.',
            'doencas.*.required' => 'Cada doença é obrigatória.',
            'doencas.*.integer' => 'Cada doença deve ser um número inteiro.',
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
