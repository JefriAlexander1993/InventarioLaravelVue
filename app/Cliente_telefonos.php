<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_telefonos extends Model
{
    protected $table = 'clientes_telefonos';
    protected $fillable=['numero_teléfonico'];
}
