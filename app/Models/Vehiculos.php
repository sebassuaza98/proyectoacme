<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $fillable = [
        'id',
        'placa',
        'color',
        'marca',
        'tipo_vehiculo',
        'conductor',
        'propietario'
	];
}
