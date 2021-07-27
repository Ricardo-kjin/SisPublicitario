<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{

    //
    protected $primaryKey = 'id_planes';

    public function ofertas (){
        return $this->hasMany(Oferta::class,'id_planes','id_planes');
    }
<<<<<<< HEAD


=======
>>>>>>> d13136fc37c86d10b67a32b9ed833c4febced35b
}
