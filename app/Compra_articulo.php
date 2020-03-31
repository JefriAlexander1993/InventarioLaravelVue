<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra_articulo extends Model
{
    protected $table = 'compra_articulo';
    protected $fillable=['cantidad','preciounitario','subtotal','total','compra_id','articulo_id'];

}
