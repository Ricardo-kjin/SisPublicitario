<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    //

    protected $table='zonas';

    protected $fillable =[
        'nombre_zona',
        'latitud',
        'longitud'
    ];
    //una zona tiene muchos inmuebles

    public function inmuebles (){
        return $this->hasMany(Inmueble::class);
    }
}
