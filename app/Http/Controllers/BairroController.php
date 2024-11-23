<?php

namespace App\Http\Controllers;

use App\Http\Requests\BairroRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    public function index()
    {
        dd('sdsafas');
    }

    public function store(BairroRequest $request)
    {
        $validateData = $request->validated();

        $bairro = Bairro::create($validateData);

        return response()->json([
            'status' => true,
            'message' => 'Bairro criado com sucesso!',
            'data' => $bairro
        ], 201);
    }

    public function show(string $id)
    {
        //
    }

    public function update(BairroRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
