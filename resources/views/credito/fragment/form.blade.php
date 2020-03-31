<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Crear abono.</strong><a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t">
  	
	    	<h5 class="card-title"><strong>Acción:</strong>
	      	<a href="{{route('cliente.index')}}" class="btn btn-sm btn-light"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
	    	</h5>
	    	<div class="row">
	    		<div class="col-sm-3">
					<div class="form-group ">
					{!!Form:: label('cliente_id','Clientes')!!}
					{!!Form::select('cliente_id',$clientes, null,['class'=>'form-control','name'=>'cliente_id','id'=>'clientecredito_id','style'=>'width:100%','min'=>'1'])!!}	
					</div>
				</div>

				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('valor_credito','Valor del credito(*).')!!}
					<input type="hidden" name="total_credito" value="{{$credito_cliente->saldo_actual}}" id="total_credito">

					<input type="number" name="valor_credito" class='form-control' title='Valor del credito.' id='valor_credito'  disabled="">				
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('valor_abono','Valor del abono(*).')!!}
					{!!Form::number('valor_abono',null,['class'=>'form-control','title'=>'Ingresa el valor del abono.','placeholder'=>'Ej: 10.000','id'=>'valor_abono','required'=>'required' ,"onkeyup"=>"valorActual()"])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('fecha_abono','Fecha de cobro(*).')!!}
					{!!Form::date('fecha_abono',null,['class'=>'form-control','title'=>'Ingresa la fecha del abono.', 'id'=>'fecha_abono','required'=>'required'])!!}
					</div>
				</div>
			
			</div>
			<div class="row">
		
			<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('saldo_actual','Saldo actual(*).')!!}
					<input type="number" name="saldo_actual" class='form-control' title='Saldo actual.' id='saldo_actual' >				
					</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group ">
				{!! Form::label('observacion','Observación')!!}
				<select class="form-control" name="observacion" id="observacion" onchange="observacion_credito()">
					<option value="" selected="selected">Seleccionar..</option>
					<option value="Abono">Abono</option>
					<option value="No abono">No abono</option>
					<option value="Aplazada">Aplazada</option>
					<option value="Cancelado">Cancelado</option>
				</select>
				<input type="hidden" name="observacion" id="observacion1" value="0">
				</div>
			</div>
				<div class="col-sm-3">
				<div class="form-group ">
				{!! Form::label('observacion','Fecha de nuevo cobro')!!}
				<input type="date" id="fecha_nuevoCobro" name="fecha_nuevoCobro" class="form-control">
			
				</div>
			</div>
			<div class="col-sm-3">
					<div class="form-group ">
					{!! Form::label('cuotas_atrasadas','Cuotas atrasadas(*).')!!}
					<input type="number" name="cuotas_atrasadas" class="form-control" title="Cuotas atrasadas." id="cuotas_atrasadas" value="{{$credito_cliente->cuotas_atrasadas}}">
				
					</div>
				</div>
			</div>
		
	</div>
	<div class="card-footer bg-transparent ">
		{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
	</div>
</div>









                                                  


