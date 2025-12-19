<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'libro_id',
        'lector_id',
        'fecha_prestamo',
        'fecha_limite_devolucion',
        'fecha_devolucion_real',
        'estado',
    ];
}

