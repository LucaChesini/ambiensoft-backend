<?php

namespace App\Http\Controllers\Arboviroses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Arboviroses\ChikungunyaRequest;
use App\Models\Arbovirose;
use App\Models\Chikungunya;
use Illuminate\Http\Request;

class ChikungunyaController extends Controller
{
    public function index()
    {
        try {
            $chikungunyas = Arbovirose::with([
                'bairro',
                'rua',
                'arbovirosable'
            ])->get();

            return response()->json([
                'status' => true,
                'data' => $chikungunyas
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(ChikungunyaRequest $request)
    {
        try {
            $validateData = $request->validated();

            $chikungunya = Chikungunya::create();

            $chikungunya->chikungunya_sinals()->attach($validateData['sinais']);
            $chikungunya->chikungunya_doencas()->attach($validateData['doencas']);

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

            $chikungunya->arbovirose()->save($arbovirose);

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
            $chikungunya = Arbovirose::with([
                'bairro',
                'rua',
                'arbovirosable' => function ($query) {
                    $query->with('chikungunya_sinals');
                    $query->with('chikungunya_doencas');
                }
            ])->find($id);

            return response()->json([
                'status' => true,
                'data' => $chikungunya
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(ChikungunyaRequest $request, string $id)
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

            $chikungunya = $arbovirose->arbovirosable;

            $chikungunya->chikungunya_sinals()->sync($validateData['sinais']);
            $chikungunya->chikungunya_doencas()->sync($validateData['doencas']);

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
                $arbovirose->arbovirosable->chikungunya_sinals()->detach();
                $arbovirose->arbovirosable->chikungunya_doencas()->detach();
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
