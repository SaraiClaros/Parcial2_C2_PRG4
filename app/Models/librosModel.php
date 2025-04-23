<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibrosModel extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'autor',
        'editorial',
        'anio_publicacion',
        'genero_id',
        'clasificacion_tematica',
        'cantidad_disponible',
        'estado',
    ];

    /**
     * Relación con el modelo Género.
     */
    public function genero()
    {
        return $this->belongsTo(GeneroModel::class);
    }
}
