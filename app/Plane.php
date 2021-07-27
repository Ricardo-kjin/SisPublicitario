<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
<<<<<<< HEAD
    protected $table = 'planes';
    protected $fillable = [
        'nombre',
        'descripcion',
        'cant_public',
        'estado'
    ];
=======
    //
    protected $primaryKey = 'id_planes';

    public function ofertas (){
        return $this->hasMany(Oferta::class,'id_planes','id_planes');
    }
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
}
