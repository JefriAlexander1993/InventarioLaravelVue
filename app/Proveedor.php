<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class proveedor extends Model
{ 
    protected $table = 'proveedores';
    protected $fillable=['nit','nombreproveedor','nombrerepresentante','email','observacion'];
    
    public static function nitUnico($nit){
        
        $nuips = Proveedor::where('nit', '=', $nit)->count();
        if($nuips == 0){
            return true;
        }else{
            return false;
        }

    }
   
    public static function nombreUnico($nombre){
        
        $nomproveedor = Proveedor::where('nombreproveedor', '=', $nombre)->count();
        if($nomproveedor == 0){
            return true;
        }else{
            return false;
        }

    }
    public static function emailUnico($email){
        
        $nomproveedor = Proveedor::where('email', '=', $email)->count();
        if($nomproveedor == 0){
            return true;
        }else{
            return false;
        }

    }

    public function scopeSearch($query, $nit){

        return $query->where('nit','LIKE',"%$nit%"); // Realiza la busqueda en base de datos de acuerdo al nit

    }
}
