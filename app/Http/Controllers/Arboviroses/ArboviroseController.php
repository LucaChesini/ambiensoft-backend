<?php

namespace App\Http\Controllers\Arboviroses;

use App\Http\Controllers\Controller;
use App\Models\Arbovirose;
use Illuminate\Http\Request;

class ArboviroseController extends Controller
{
    public function index(Request $request)
    {
        $query = Arbovirose::with(['bairro', 'rua', 'arbovirosable']);

        if ($request->has('doenca') && !empty($request->doenca)) {
            $query->where('doenca', $request->doenca);
        }

        if ($request->has('bairro_id') && !empty($request->bairro_id)) {
            $query->where('bairro_id', $request->bairro_id);
        }

        if ($request->has('rua_id') && !empty($request->rua_id)) {
            $query->where('rua_id', $request->rua_id);
        }

        $query->orderBy('id', 'desc');

        $zoonoses = $query->paginate(20);

        return response()->json([
            'status' => true,
            'data' => $zoonoses
        ], 200);
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        $zoonoses = Arbovirose::find($id);

        return response()->json([
            'status' => true,
            'data' => $zoonoses
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
