<?php

namespace App\Http\Controllers\Zoonoses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Zoonoses\RaivaRequest;
use Illuminate\Http\Request;

class RaivaController extends Controller
{
    public function index()
    {
        //
    }

    public function store(RaivaRequest $request)
    {
        dd('teste');
    }

    public function show(string $id)
    {
        //
    }

    public function update(RaivaRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
