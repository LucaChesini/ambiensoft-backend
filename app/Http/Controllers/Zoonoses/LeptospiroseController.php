<?php

namespace App\Http\Controllers\Zoonoses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Zoonoses\LeptospiroseRequest;
use App\Models\Leptospirose;
use App\Models\Zoonose;
use Illuminate\Http\Request;

class LeptospiroseController extends Controller
{
    public function index()
    {
        try {
            $leptospiroses = Zoonose::with([
                'bairro',
                'rua',
                'zoonosable' => function ($query) {
                    $query->with(['leptospirose_sintomas', 'leptospirose_situacaos']);
                }
            ])->get();

            return response()->json([
                'status' => true,
                'data' => $leptospiroses
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(LeptospiroseRequest $request)
    {
        try {
            $validateData = $request->validated();

            $leptospirose = Leptospirose::create([]);

            $leptospirose->leptospirose_sintomas()->attach($validateData['sintomas']);
            $leptospirose->leptospirose_situacaos()->attach($validateData['situacoes']);

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

            $leptospirose->zoonose()->save($zoonose);

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
            $leptospirose = Zoonose::with([
                'bairro',
                'rua',
                'zoonosable' => function ($query) {
                    $query->with(['leptospirose_sintomas', 'leptospirose_situacaos']);
                }
            ])->find($id);

            return response()->json([
                'status' => true,
                'data' => $leptospirose
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(LeptospiroseRequest $request, string $id)
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

            $leptospirose = $zoonose->zoonosable;

            $leptospirose->leptospirose_sintomas()->sync($validateData['sintomas']);
            $leptospirose->leptospirose_situacaos()->sync($validateData['situacoes']);

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
                $zoonose->zoonosable->leptospirose_sintomas()->detach();
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
