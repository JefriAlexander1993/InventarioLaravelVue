<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abono extends Model
{
    protected $table = 'abonos';
   
    protected $fillable=['id','fecha_abono','valor_abono','cuotas_atrasadas','observacion','cuota_numero'];
}
