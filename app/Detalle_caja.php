<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_caja extends Model
{
    protected $table = 'detalle_caja';
    protected $fillable=['caja_id','user_id','valorfinal','ganancia'];
}
