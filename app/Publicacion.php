<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table='publicaciones';

    protected $fillable =[
        'descripcion',
        'precio',
        'tipo_publicacion',
        'inmueble_id',
        'user_id',
    ];
}
