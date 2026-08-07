<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NivelMembresiaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EjercicioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PerfilEntrenadoraController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/

// probar la autenticación
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// ------------------------------------------------------------------------
// RUTAS DE LA PLATAFORMA ENTRENADORA
// ------------------------------------------------------------------------

// apiResource crea automáticamente los endpoints: GET, POST, PUT/PATCH, DELETE
Route::apiResource('niveles-membresia', NivelMembresiaController::class);
Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('ejercicios', EjercicioController::class);
Route::apiResource('pagos', PagoController::class);
Route::apiResource('perfil-entrenadora', PerfilEntrenadoraController::class);