<?php

namespace App\Http\Controllers;

use App\Http\Requests\RuaRequest;
use Illuminate\Http\Request;

class RuaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(RuaRequest $request)
    {
        dd('teste');
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
