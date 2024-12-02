<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnumController extends Controller
{
    public function getEnum($enumName)
    {
        $className = Str::studly($enumName);
        $enumClass = "App\\Enums\\{$className}";

        if (!class_exists($enumClass) || !method_exists($enumClass, 'getOptions')) {
            return response()->json(['error' => 'Enum não encontrado ou inválido'], 404);
        }

        return response()->json($enumClass::getOptions());
    }
}
