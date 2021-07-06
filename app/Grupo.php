<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Grupo extends Model
{
    public function accesos()
    {
        return $this->BelongsToMany(Grupo::class,'accesos_grupos');
    }
}
