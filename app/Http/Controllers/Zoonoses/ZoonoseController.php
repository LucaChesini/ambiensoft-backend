<?php

namespace App\Http\Controllers\Zoonoses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Zoonoses\ZoonoseRequest;
use App\Models\Zoonose;
use Illuminate\Http\Request;

class ZoonoseController extends Controller
{
    public function index()
    {
        $zoonoses = Zoonose::all();

        return response()->json([
            'status' => true,
            'data' => $zoonoses
        ], 200);
    }

    public function store(ZoonoseRequest $request)
    {
        $zoonose = Zoonose::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Dados enviados com sucesso!'
        ], 201);
    }

    public function show(string $id)
    {
        $zoonoses = Zoonose::find($id);

        return response()->json([
            'status' => true,
            'data' => $zoonoses
        ], 200);
    }

    public function update(ZoonoseRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
