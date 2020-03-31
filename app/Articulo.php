<?php

namespace App;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
   


    protected $fillable=['id','codigo','fechafabricacion','fechavencimiento','nombre','cantidad',
    'preciounitario','iva','precioventa','stockmin'];


    public function scopeSearch($query, $codigo){

    return $query->where('codigo','LIKE',"%$codigo%"); // Realiza la busqueda en base de datos de acuerdo al codigo

    }

    public static function codigoUnico($codigo){ //Verifica que el nuip sea unico en la base de datos, en caso de no ser unico devuelve falso (false)
        
        $codigU = Articulo::where('codigo', '=', $codigo)->count();
        if( $codigU == 0){
            return true;
        }else{
            return false;
        }

    }
   

}