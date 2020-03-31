<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_proveedor extends Model
{
    protected $table = 'articulo_proveedor';
    protected $fillable=['articulo_id','proveedor_id'];
    


}
