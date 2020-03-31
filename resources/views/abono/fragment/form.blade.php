<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Crear un abono.</strong><a href="{{route('articulo.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t"  id="infocredito">
  	
	    	<h5 class="card-title"><strong>Acción:</strong>
	      		<a href="{{route('abono.index')}}" class="btn btn-sm btn-light"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
	    	</h5>
	    	<div class="row">
				<div class="col-sm-8" >
					<input id="url_traercredito" type="hidden" value="{{url('credito/getCredito/')}}">
						<!-- Observacion cualquiera del proveedor -->
					<div class="form-group">
						{!!Form:: label('cliente_id','Cliente')!!}	

 						<select name="cliente_id" id="cliente_idc"
                                class="form-control"
                                required=""
                                title="Elige el número de de cédula'"
                                style="width:100%"
                                >
                            <option value>[Numero de cédula(*)]</option>
                                 @foreach($clientes as $item)
                            <option value="{{$item['id']}}">{{$item['nuip']}} - {{$item['primer_nombre']}} {{$item['primer_apellido']}}</option>
                                @endforeach
                         </select>
					</div>
				</div>
				<div class="col-sm-4" >
						<!-- Observacion cualquiera del proveedor -->
					<div class="form-group">
						{!!Form:: label('acción','Acción')!!}<br>
						{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar', array('type' => 'button', 'class'=>'btn btn-primary btn-block', 'id'=>'btn-seachcredito'))!!}
					</div>
				</div>
		
			</div>	
			<div  style="display:none" id="id_abono">
				<div class="row">
					<div class="col-sm-3">
						{!!Form::label('total_credito', 'Total del credito.(*)')!!}
						{!!Form::number('total_credito',null,['class'=>'form-control','title'=>'Total credito.','id'=>'total_credito','name'=>'total_credito','readonly'])!!}
					</div>
					<div class="col-sm-3">
						{!!Form::label('saldo_actual','Saldo actual.(*)')!!}
						{!!Form::number('saldo_actual',null,['class'=>'form-control','title'=>'Saldo actual.','id'=>'saldo_actual','name'=>'saldo_actual','readonly'])!!}
					</div>
					<div class="col-sm-3">
						{!!Form::label('cantidad_de_cuotas','Cantidad de cuotas establecidas.(*)')!!}
						{!!Form::number('cantidad_de_coutas',null,['class'=>'form-control','title'=>'Cantidad de cuotas .','id'=>'cantidad_de_cuotas','name'=>'cantidad_de_cuotas','readonly'])!!}

					</div>
					<div class="col-sm-3">
						{!!Form::label('cuotas_restantes','Cuotas restantes.(*)')!!}
						{!!Form::number('cuotas_restantes',null,['class'=>'form-control','title'=>'Cuotas restantes.','id'=>'cuotas_restantes','name'=>'cuotas_restantes','readonly'])!!}

					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-sm-4" >
						<!-- Observacion cualquiera del proveedor -->
					<div class="form-group">
						{!!Form::label('fecha_abono','Fecha del abono.(*)')!!}
						{!!Form::date('fecha_abono',null,['class'=>'form-control','title'=>'Numero de la casa.','id'=>'fecha_abono','name'=>'fecha_abono' ])!!}
					</div>
				</div>
				<div class="col-sm-4" >
						<!-- Observacion cualquiera del proveedor -->
					<div class="form-group">
						{!!Form::label('valor_abono','Valor de abono.(*)')!!}
						{!!Form::text('valor_abono',null,['class'=>'form-control','title'=>'Numero de la casa.','id'=>'valor_abono','name'=>'valor_abono','onkeyup'=>'saldo_Actual()'])!!}
					</div>
				</div>
				<div class="col-sm-4" >
						<!-- Observacion cualquiera del proveedor -->
					<div class="form-group">
						{!!Form::label('cuota_numero','Cuota número.(*)')!!}
						{!!Form::text('cuota_numero',null,['class'=>'form-control','title'=>'Numero de la casa.','id'=>'cuota_numero','name'=>'cuota_numero','onkeyup'=>'cuota_Restante()'])!!}
					</div>
				</div>
			</div>	
				<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						
					</div>
				</div>
			</div>
			<div class="card-footer bg-transparent ">
							{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime',  'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_sale' ))!!}
			</div>
		</div>
</div>
				