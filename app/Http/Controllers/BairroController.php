<?php

namespace App\Http\Controllers;

use App\Http\Requests\BairroRequest;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    public function index()
    {
        dd('sdsafas');
    }

    public function store(BairroRequest $request)
    {
        dd('teste');
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
