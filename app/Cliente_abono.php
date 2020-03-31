<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente_abono extends Model
{
    protected $table = 'cliente_abonos';
   
    protected $fillable=['saldo_actual','cuotas_restantes'];


    public function abonos(){
	
	    return $this->belongsTo(Abono::class , 'abono_id');
	}

    public function clientes()
	{
	    return $this->belongsTo(Cliente::class , 'cliente_id');
	}
}
