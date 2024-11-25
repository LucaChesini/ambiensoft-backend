<?php

namespace App\Http\Controllers;

use App\Http\Requests\BairroRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    public function index()
    {
        try {
            $bairros = Bairro::get();

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

    public function store(BairroRequest $request)
    {
        try {
            $validateData = $request->validated();
    
            $bairro = Bairro::create($validateData);
    
            return response()->json([
                'status' => true,
                'message' => 'Bairro criado com sucesso!',
                'data' => $bairro
            ], 201);
        } catch (\Exception $e) {

        }
    }

    public function show(string $id)
    {
        try {
            $bairros = Bairro::find($id);

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

    public function update(BairroRequest $request, string $id)
    {
        try {
            $bairros = Bairro::find($id);

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

    public function destroy(string $id)
    {
        //
    }
}
