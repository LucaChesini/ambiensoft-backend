<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuaRequest;
use App\Models\Bairro;
use App\Models\Rua;
use Illuminate\Http\Request;

class RuaController extends Controller
{
    public function index()
    {
        try {
            $bairros = Rua::with(['bairro' => function($query){
                $query->select(
                    'id',
                    'codigo',
                    'nome'
                );
            }])->get();

            return response()->json([
                'status' => true,
                'data' => $bairros
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(RuaRequest $request)
    {
        try {
            $validateData = $request->validated();
    
            $rua = Rua::create($validateData);
    
            return response()->json([
                'status' => true,
                'message' => 'Rua criada com sucesso!',
                'data' => $rua
            ], 201);
        } catch (\Exception $e) {

        }
    }

    public function show(string $id)
    {
        try {
            $bairro = Rua::with(['bairro' => function($query){
                $query->select(
                    'id',
                    'codigo',
                    'nome'
                );
            }])->find($id);

            if ($bairro) {
                return response()->json([
                    'status' => true,
                    'data' => $bairro
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'Rua não encontrada'
                ], 404);
            }


        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(RuaRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
