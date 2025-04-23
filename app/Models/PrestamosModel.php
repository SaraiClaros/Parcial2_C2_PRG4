<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosModel extends Model
{
    use HasFactory;
    protected $table = 'prestamos';

    
    protected $fillable = [
        'usuarios_id',
        'libros_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    /**
     * Relación con el modelo Usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(UsuariosModel::class);
    }

    /**
     * Relación con el modelo Libro.
     */
    public function libros()
    {
        return $this->belongsTo(LibrosModel::class);
    }
}
