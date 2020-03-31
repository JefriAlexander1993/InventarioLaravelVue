<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Cliente extends Model {

     protected $table = 'clientes';

     protected $fillable=['nuip','primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','correoelectronico'];



    public function scopeSearch1($query, $nuip){ // Realiza la busqueda en base de datos de acuerdo al nuip

         return $query->where('nuip','LIKE',"%$nuip%");


    }

    public static function nuipUnico($nuip){ //Verifica que el nuip sea unico en la base de datos, en caso de no ser unico devuelve falso (false)
        
        $nuips = Cliente::where('nuip', '=', $nuip)->count();
        if($nuips == 0){
            return true;
        }else{
            return false;
        }

    }
 

}
