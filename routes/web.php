<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\DevolucionController;

Route::get('/', function () {
    return view('index'); 
});

Route::resource('libros', LibroController::class);
Route::resource('devoluciones', DevolucionController::class);
