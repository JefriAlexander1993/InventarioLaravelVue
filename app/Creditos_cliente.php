<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditos_cliente extends Model
{
    protected $table = 'creditos_cliente';
    protected $fillable=['saldo_actual','cuotas_restantes','cantidad','preciounitario','subtotal','total'];


    public function clientes(){

        return $this->belongsTo(Cliente::class,'cliente_id');
    }  
    
    public function creditos()
    {
        return $this->belongsTo(Credito::class);
    }


}
