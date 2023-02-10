<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $fillable = [
        'id',
		'cedula',
        'primer_nombre',
        'segundo_nombre',
        'apellidos',
        'direccion',
        'telefono',
        'ciudad',
        'rol'
	];


}
