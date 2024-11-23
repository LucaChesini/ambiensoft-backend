<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuaRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class RuaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(RuaRequest $request)
    {
        try {
            $bairro = Bairro::create($request);

            return response()->json([
                'message' => 'Bairro criado com sucesso!',
                'data' => $bairro
            ], 201);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function show(string $id)
    {
        //
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
