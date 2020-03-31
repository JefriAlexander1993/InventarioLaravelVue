<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento_municipio extends Model
{
    protected $table = 'departamento_municipios';
    protected $fillable=['departamento_id','municipio_id'];
}
