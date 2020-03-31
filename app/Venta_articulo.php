<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta_articulo extends Model
{
    protected $table = 'venta_articulo';

    protected $fillable = ['cantidad','preciounitario','subtotal','total','venta_id','articulo_id'];
}
