<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';


    protected $fillable = ['totalventa'];
   

     // public function user()
     // {
     //     return $this->belongsTo('App\User');
     // }


     public function scopeSearch($query, $id){

	return $query->where('id','LIKE',"%$id%"); // Realiza la busqueda en base de datos de acuerdo al id

    }



    }
