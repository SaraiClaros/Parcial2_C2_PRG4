<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialModel extends Model
{
    use HasFactory;

    protected $table = 'historial_actividades';
    protected $primaryKey = 'historial_id'; 
    
    protected $fillable = [
        'usuarios_id',
        'accion',
        'detalle',
        'fecha',
    ];
}
