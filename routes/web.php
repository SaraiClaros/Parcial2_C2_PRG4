<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\ExistenciasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PrestamosController;

Route::get('/', function () {
    return view('index'); 
});

Route::resource('libro', LibroController::class);
Route::resource('devoluciones', DevolucionesController::class);
Route::resource('genero', GeneroController::class);
Route::resource('historial', HistorialController::class);
Route::resource('existencias', ExistenciasController::class);
Route::resource('usuario', UsuariosController::class);
Route::resource('prestamos', PrestamosController::class);
