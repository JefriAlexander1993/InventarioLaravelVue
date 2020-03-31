<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    protected $table = 'creditos';
    protected $fillable=['total_credito','modo_de_pago','valor_de_cuota','forma_de_pago','cantidad_de_cuotas','observacion'];
}
