<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibrosModel extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $primaryKey = 'libros_id'; 

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

   
    public function genero()
    {
        return $this->belongsTo(GeneroModel::class);
    }
}
