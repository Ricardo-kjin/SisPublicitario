<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    protected $table='inmuebles';

    protected $fillable =[
        'direccion',
        'area_terreno',
        'area_construida',
        'area_libre',
        'habitaciones',
        'baños',
        'pisos',
        'garajes',
        'foto_principal',
        'servicio',
        'tipo_inmueble',
        'zona_id',
    ];
    //muchos inmuebles pertenece a una zona

    public function zona (){
        return $this->belongsTo(Zona::class);
    }
    //muchos inmuebles pertenece a un usuario

    public function users (){
        return $this->belongsTo(User::class);
    }

    //muchos inmuebles pertenece a un tipo de inmueble

    public function tipoinmueble (){
        return $this->belongsTo(TipoInmueble::class);
    }

    //muchos inmuebles tienen muchos servicios

    public function servicios (){
        return $this->belongsToMany(Servicio::class);
    }

    //un inmueble pertenece a un proyecto

    public function inmuebles (){
        return $this->belongsTo(Inmueble::class,'proyecto_id');
    }

    //un proyecto tiene muchos inmuebles
    public function proyecto(){
        return $this->hasMany(Inmueble::class,'proyecto_id','id');
    }
}
