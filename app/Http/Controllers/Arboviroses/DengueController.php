<?php

namespace App\Http\Controllers\Arboviroses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Arboviroses\DengueRequest;
use App\Models\Arbovirose;
use App\Models\Dengue;
use Illuminate\Http\Request;

class DengueController extends Controller
{
    public function index()
    {
        try {
            $raivas = Arbovirose::with([
                'bairro',
                'rua',
                'arbovirosable' => function ($query) {
                    $query->with('dengue_sinais');
                }
            ])->get();

            return response()->json([
                'status' => true,
                'data' => $raivas
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(DengueRequest $request)
    {
        try {
            $validateData = $request->validated();

            $raiva = Dengue::create([
                'tipo_exposicao' => $validateData['tipo_exposicao'],
                'ferimento' => $validateData['ferimento'],
                'localizacao_ferimento' => $validateData['localizacao_ferimento'],
                'especie_animal_agressor' => $validateData['especie_animal_agressor'],
            ]);

            $raiva->raiva_sintomas()->attach($validateData['sintomas']);

            $arbovirose = new Arbovirose([
                'doenca' => $validateData['doenca'],
                'unidade_saude' => $validateData['unidade_saude'],
                'nome' => $validateData['nome'],
                'data_nascimento' => $validateData['data_nascimento'],
                'idade' => $validateData['idade'],
                'sexo' => $validateData['sexo'],
                'numero_sus' => $validateData['numero_sus'],
                'municipio_residencia' => $validateData['municipio_residencia'],
                'numero' => $validateData['numero'],
                'bairro_id' => $validateData['bairro_id'],
                'rua_id' => $validateData['rua_id']
            ]);

            $raiva->arbovirose()->save($arbovirose);

            return response()->json([
                'status' => true,
                'data' => $arbovirose->load('arbovirosable')
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $raiva = Arbovirose::with([
                'bairro',
                'rua',
                'arbovirosable' => function ($query) {
                    $query->with('raiva_sintomas');
                }
            ])->find($id);

            return response()->json([
                'status' => true,
                'data' => $raiva
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(DengueRequest $request, string $id)
    {
        try {
            $validateData = $request->validated();

            $arbovirose = Arbovirose::with('arbovirosable')->findOrFail($id);

            $arbovirose->update([
                'doenca' => $validateData['doenca'],
                'unidade_saude' => $validateData['unidade_saude'],
                'nome' => $validateData['nome'],
                'data_nascimento' => $validateData['data_nascimento'],
                'idade' => $validateData['idade'],
                'sexo' => $validateData['sexo'],
                'numero_sus' => $validateData['numero_sus'],
                'municipio_residencia' => $validateData['municipio_residencia'],
                'numero' => $validateData['numero'],
                'bairro_id' => $validateData['bairro_id'],
                'rua_id' => $validateData['rua_id']
            ]);

            $raiva = $arbovirose->arbovirosable;
            $raiva->update([
                'tipo_exposicao' => $validateData['tipo_exposicao'],
                'ferimento' => $validateData['ferimento'],
                'localizacao_ferimento' => $validateData['localizacao_ferimento'],
                'especie_animal_agressor' => $validateData['especie_animal_agressor']
            ]);

            $raiva->raiva_sintomas()->sync($validateData['sintomas']);

            return response()->json([
                'status' => true,
                'data' => $arbovirose->load(['arbovirosable', 'bairro', 'rua'])
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $arbovirose = Arbovirose::findOrFail($id);

            if ($arbovirose->arbovirosable) {
                $arbovirose->arbovirosable->raiva_sintomas()->detach();
                $arbovirose->arbovirosable->delete();
            }

            $arbovirose->delete();

            return response()->json([
                'status' => true,
                'message' => 'Registro excluído com sucesso'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
