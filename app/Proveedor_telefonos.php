<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor_telefonos extends Model
{
    protected $table = 'proveedores_telefonos';
    protected $fillable=['numero_telefonico'];
}
