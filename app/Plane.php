<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $table = 'planes';
    protected $fillable = [
        'nombre',
        'descripcion',
        'cant_public',
        'estado'
    ];
}
