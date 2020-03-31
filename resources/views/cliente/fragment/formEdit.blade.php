<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Editar cliente.</strong><a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t">
  	
	    	<h5 class="card-title"><strong>Acción:</strong>
	      	<a href="{{route('cliente.index')}}" class="btn btn-sm btn-light"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
	    	</h5>
	    	<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
					{!! Form::label('nuip','Numero de cedula(*).')!!}
					{!!Form::number('nuip',null,['class'=>'form-control','title'=>'Ingresa un numero de cedula, no registrado.','min'=>'11','placeholder'=>'Ej: 66.345.234','onkeypress'=>'return isNumberKey(event)','id'=>'nuip','required'=>'required'])!!}
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					{!! Form::label('nombre','Nombre del cliente(*).')!!}
					{!!Form::text('nombre',null,['class'=>'form-control','title'=>'Ingresa un nombre.','onblur'=>'limpia()','title'=>'Ingresa un nombre(s) y apellido(s) ','onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()','placeholder'=>'Ej: Juan Perez','id'=>'nombreCliente','required'=>'required' ])!!}
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group ">
					{!! Form::label('telefono','Telefono(*).')!!}
					{!!Form::text('telefono',null,['class'=>'form-control','title'=>'Ingresa un numero de celular.','onkeypress'=>'return soloNumeros(event)','placeholder'=>'Ej: 3207697523','id'=>'telefonoCliente','required'=>'required'])!!}
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-sm-6">
				<div class="form-group ">
				{!! Form::label('direccion','Direccion.')!!}
				{!!Form::text('direccion',null,['class'=>'form-control','title'=>'Ingresa una dirección', 'placeholder'=>'Ej: Cra 10a #24-22', 'id'=>'direccion'])!!}
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group ">
				{!!Form::label('correoelectronico','Correo Electronico.')!!}
				{!!Form::email('correoelectronico', null,['class'=>'form-control','title'=>'Ingresa un correo electronico','placeholder'=>'Ej: ejemplo@correo.com','id'=>'emailCliente'])!!}
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group ">
					{!!Form::label('observacion','Observacion.')!!}
					{!!Form::textarea('observacion',null,['class'=>'form-control','title'=>'Ingresa una observación que debas recordar.','placeholder'=>'Ej: Llamar al cliente cada 5 de mes.', 'id'=>'obCliente','cols'=>"40" ,'rows'=>"3",])!!}
					</div> 
				</div> 
			</div> 
	</div>
	<div class="card-footer bg-transparent ">
		{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
	</div>
</div>









                                                  


