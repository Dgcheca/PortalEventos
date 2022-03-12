<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Torneo;
use App\Models\Juego;
use App\Models\Equipo;
use App\Http\Resources\TorneoResource;
use App\Http\Resources\JuegoResource;
use App\Http\Resources\EquipoResource;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/torneos', function () {return TorneoResource::collection(Torneo::all());}); 
Route::get('/juegos', function () {return JuegoResource::collection(Juego::all());}); 
Route::get('/equipos', function () {return EquipoResource::collection(Equipo::all());}); 


Route::middleware(['auth:sanctum'])->group(function () {
    // Route::post('/citas', [CitaController::class, 'createApi']);
    // Route::delete('/citas/{id}', [CitaController::class, 'deleteApi']);
});

//Estas rutas van fuera de auth:sanctum por que son las que generan el token, aún no lo tenemos
Route::post('/registro', [AuthApiController::class, 'registro']);
Route::post('/login', [AuthApiController::class, 'login']);