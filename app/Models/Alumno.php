<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = "alumnos";
    protected $primaryKey="id_alumno";
    protected $fillable=[
        'id_alumno',
        'nombre_alumno',
        'apellido_alumno',
        'edad_alumno',
        'curso_asignado'
    ];
}
