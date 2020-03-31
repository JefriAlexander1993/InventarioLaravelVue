<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
class Compra extends Model
{

    protected $table = 'compras';
    protected $fillable=['totalCompra'];
      

    public function scopeSearch($query, $id){  // Realiza la busqueda en base de datos de acuerdo al id

    return $query->where('id','LIKE',"%$id%");

        }
    
}
