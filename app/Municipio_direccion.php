<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio_direccion extends Model
{
    protected $table = 'municipio_direcciones';
    protected $fillable=['municipio_id','direccion_id'];
}
