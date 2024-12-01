<?php

namespace App\Http\Requests\Zoonoses;

use App\Enums\EspecieRaiva;
use App\Enums\Ferimento;
use App\Enums\LocalizacaoFerimento;
use App\Enums\Sexo;
use App\Enums\TipoExposicaoRaiva;
use App\Enums\Zoonoses;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RaivaRequest extends FormRequest
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
                'in:' . implode(',', array_keys(Zoonoses::getOptions())),
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
            "tipo_exposicao" => [
                'required',
                'in:' . implode(',', array_keys(TipoExposicaoRaiva::getOptions())),
            ],
            "ferimento" => [
                'required',
                'in:' . implode(',', array_keys(Ferimento::getOptions())),
            ],
            "localizacao_ferimento" => [
                'required',
                'in:' . implode(',', array_keys(LocalizacaoFerimento::getOptions())),
            ],
            "especie_animal_agressor" => [
                'required',
                'in:' . implode(',', array_keys(EspecieRaiva::getOptions())),
            ],
            "sintomas" => 'nullable|array',
            "sintomas.*" => 'required|integer'
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
            'tipo_exposicao.required' => 'O campo "tipo de exposição" é obrigatório.',
            'tipo_exposicao.in' => 'O valor selecionado para "tipo de exposição" é inválido.',
            'ferimento.required' => 'O campo "ferimento" é obrigatório.',
            'ferimento.in' => 'O valor selecionado para "ferimento" é inválido.',
            'localizacao_ferimento.required' => 'O campo "localização do ferimento" é obrigatório.',
            'localizacao_ferimento.in' => 'O valor selecionado para "localização do ferimento" é inválido.',
            'especie_animal_agressor.required' => 'O campo "espécie do animal agressor" é obrigatório.',
            'especie_animal_agressor.in' => 'O valor selecionado para "espécie do animal agressor" é inválido.',
            'sintomas.array' => 'O campo "sintomas" deve ser um array.',
            'sintomas.*.required' => 'Cada sintoma é obrigatório.',
            'sintomas.*.integer' => 'Cada sintoma deve ser um número inteiro.',
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
