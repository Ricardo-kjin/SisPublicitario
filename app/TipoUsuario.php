<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class TipoUsuario extends Model
{
    use Notifiable;
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profesion', 'nit_agente', 'nombre_empresa','direccion_empresa',
         'registro_empresa', 'telefono_empresa','nit_empresa','estado',
    ];
}
