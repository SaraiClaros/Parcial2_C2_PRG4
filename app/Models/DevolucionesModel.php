<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionesModel extends Model
{
    use HasFactory;
    protected $table = 'devoluciones';

    
    protected $fillable = [
        'prestamo_id',
        'fecha_devolucion_real',
        'observaciones',
    ];

   
    public function prestamo()
    {
        return $this->belongsTo(PrestamosModel::class);
    }
}
