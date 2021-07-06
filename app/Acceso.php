<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    public function grupos()
    {
        return $this->BelongsToMany(Acceso::class,'accesos_grupos');
    }
}
