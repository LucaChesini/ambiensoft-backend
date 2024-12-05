<?php

namespace App\Http\Controllers\Zoonoses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Zoonoses\ZoonoseRequest;
use App\Models\Zoonose;
use Illuminate\Http\Request;

class ZoonoseController extends Controller
{
    public function index(Request $request)
    {
        $query = Zoonose::with(['bairro', 'rua', 'zoonosable']);

        if ($request->has('doenca') && !empty($request->doenca)) {
            $query->where('doenca', $request->doenca);
        }

        if ($request->has('bairro_id') && !empty($request->bairro_id)) {
            $query->where('bairro_id', $request->bairro_id);
        }

        if ($request->has('rua_id') && !empty($request->rua_id)) {
            $query->where('rua_id', $request->rua_id);
        }

        $zoonoses = $query->paginate(20);

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
