<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialModel extends Model
{
    use HasFactory;
    protected $table = 'historial_actividades';

   
    protected $fillable = [
        'prestamo_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
        'observaciones',
    ];

    /**
     * Relación con el modelo Préstamo.
     */
    public function prestamo()
    {
        return $this->belongsTo(PrestamosModel::class);
    }
}
