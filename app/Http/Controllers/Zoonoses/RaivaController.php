<?php

namespace App\Http\Controllers\Zoonoses;

use App\Enums\Zoonoses;
use App\Http\Controllers\Controller;
use App\Http\Requests\Zoonoses\RaivaRequest;
use App\Models\Raiva;
use App\Models\Zoonose;
use Illuminate\Http\Request;

class RaivaController extends Controller
{
    public function index()
    {
        try {
            $raivas = Zoonose::with([
                'bairro',
                'rua',
                'zoonosable' => function ($query) {
                    $query->with('raiva_sintomas');
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

    public function store(RaivaRequest $request)
    {
        try {
            $validateData = $request->validated();

            $raiva = Raiva::create([
                'tipo_exposicao' => $validateData['tipo_exposicao'],
                'ferimento' => $validateData['ferimento'],
                'localizacao_ferimento' => $validateData['localizacao_ferimento'],
                'especie_animal_agressor' => $validateData['especie_animal_agressor'],
            ]);

            $raiva->raiva_sintomas()->attach($validateData['sintomas']);

            $zoonose = new Zoonose([
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

            $raiva->zoonose()->save($zoonose);

            return response()->json([
                'status' => true,
                'data' => $zoonose->load('zoonosable')
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
            $raiva = Zoonose::with([
                'bairro',
                'rua',
                'zoonosable' => function ($query) {
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

    public function update(RaivaRequest $request, string $id)
    {
        try {
            $validateData = $request->validated();

            $zoonose = Zoonose::with('zoonosable')->findOrFail($id);

            $zoonose->update([
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

            $raiva = $zoonose->zoonosable;
            $raiva->update([
                'tipo_exposicao' => $validateData['tipo_exposicao'],
                'ferimento' => $validateData['ferimento'],
                'localizacao_ferimento' => $validateData['localizacao_ferimento'],
                'especie_animal_agressor' => $validateData['especie_animal_agressor']
            ]);

            $raiva->raiva_sintomas()->sync($validateData['sintomas']);

            return response()->json([
                'status' => true,
                'data' => $zoonose->load(['zoonosable', 'bairro', 'rua'])
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
            $zoonose = Zoonose::findOrFail($id);

            if ($zoonose->zoonosable) {
                $zoonose->zoonosable->raiva_sintomas()->detach();
                $zoonose->zoonosable->delete();
            }

            $zoonose->delete();

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
