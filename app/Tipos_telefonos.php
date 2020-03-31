<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipos_telefonos extends Model
{
    protected $table = 'tipos_telefonos';
    protected $fillable=['nombre_tipo'];
}
