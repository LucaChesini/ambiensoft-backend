<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\EnumController;
use App\Http\Controllers\RuaController;
use App\Http\Controllers\Zoonoses\LeptospiroseController;
use App\Http\Controllers\Zoonoses\RaivaController;
use App\Http\Controllers\Zoonoses\ZoonoseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::apiResource('/zoonoses/raiva', RaivaController::class);
Route::apiResource('/zoonoses/leptospirose', LeptospiroseController::class);
Route::apiResource('/zoonoses/zoonose', ZoonoseController::class);
Route::apiResource('/enderecos/bairro', BairroController::class);
Route::apiResource('/enderecos/rua', RuaController::class);

Route::get('/enums/{enumName}', [EnumController::class, 'getEnum']);