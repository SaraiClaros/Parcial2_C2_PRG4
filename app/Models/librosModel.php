<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibrosModel extends Model
{
    protected $table = 'libros'; 

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'anio_publicacion',
        'genero',
        'clasificacion_tematica',
        'cantidad_disponible',
        'estado',
    ];
}
