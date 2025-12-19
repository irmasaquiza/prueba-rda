<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lector extends Model
{
    protected $table = 'lectors';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'email',
        'activo',
    ];
}
