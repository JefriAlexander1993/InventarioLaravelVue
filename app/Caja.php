<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    protected $table = 'cajas';
    protected $fillable=['nombreUsuario','valorInicial'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function venta()
    {
        return $this->belongsTo('App\Venta');
    }



    public static  function objectToArray( $ventas ) { //Obtiene un objeto y lo convierte a texto (array)
        
          if(!is_object($ventas) && !is_array($ventas)) {
        
            return $ventas;
        
          }
          
          return array_map( 'objectToArray', (array) $ventas );
        
        }
  
    

}
