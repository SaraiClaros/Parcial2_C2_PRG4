<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevolucionesModel extends Model
{
    use HasFactory;
    protected $table = 'devoluciones';
    protected $primaryKey = 'devoluciones_id'; 

    
    protected $fillable = [
        'prestamos_id',
        'fecha_devolucion_real',
        'observaciones',
    ];

   
    public function prestamos()
    {
        return $this->belongsTo(PrestamosModel::class, 'prestamos_id', 'prestamos_id');
    }

   
}
