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

    
    public function usuarios()
    {
        return $this->belongsTo(UsuariosModel::class, 'usuarios_id', 'usuarios_id');
    }

   
    public function libros()
    {
        return $this->belongsTo(LibrosModel::class,'libros_id', 'libros_id' );
    }
}
