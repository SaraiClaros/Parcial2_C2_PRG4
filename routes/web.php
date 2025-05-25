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
Route::get('registros', function () {
    return view('registros'); 
});

Route::resource('libro', LibroController::class);
Route::post('/libro/create', [LibroController::class, 'create'])->name('libro.create');


Route::resource('devoluciones', DevolucionesController::class)->only([
    'index', 'create', 'store', 'destroy','update'
]);
Route::post('/devoluciones/consultar', [DevolucionesController::class, 'consult'])->name('devoluciones.consultar');


Route::resource('genero', GeneroController::class)->only([
    'index', 'create', 'store', 'destroy','update'
]);
Route::post('/genero/consultar', [GeneroController::class, 'consult'])->name('genero.consultar');

Route::resource('historial', HistorialController::class);
Route::post('/historial/consultar', [HistorialController::class, 'consult'])->name('historial.consultar');


Route::resource('existencias', ExistenciasController::class) ->only([
    'index', 'create', 'store', 'destroy','update'
]);
Route::post('/existencias/consultar', [ExistenciasController::class, 'consult'])->name('existencia.consultar');


Route::resource('usuario', UsuariosController::class)->only([
    'index', 'create', 'store', 'destroy','update'
]);
Route::post('/usuario/consultar', [UsuariosController::class, 'consult'])->name('usuario.consultar');


Route::resource('prestamos', PrestamosController::class) ->only([
    'index', 'create', 'store', 'destroy','update'
]);
Route::post('/prestamos/consultar', [PrestamosController::class, 'consult'])->name('prestamos.consultar');



