<input type="hidden" id="url_clientseach" value="{{url('cliente/getClient/')}}">
<!--<input type="hidden" name="cliente_id" id="cliente_id">-->
<input id="url_editarcliente" type="hidden" value="{{url('venta/cliente/')}}">


<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('nuip','Nuip(*).')!!}
			{!!Form::number('nuip',null,['class'=>'form-control','title'=>'Ingresa un numero de cedula, no registrado.','min'=>'11','placeholder'=>'Ej: 66.345.234','id'=>'nuipClient','required'=>'required','name'=>'nuip'])!!}</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			{!!Form::label('primer_nombre','Primer nombre(*).')!!}
			{!!Form::text('primer_nombre',null,['class'=>'form-control','title'=>'Ingresa tu primer nombre.','id'=>'primer_nombre','name'=>'primer_nombre','required'])!!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('segundo_nombre','Segundo nombre.')!!}
			{!!Form::text('segundo_nombre',null,['class'=>'form-control','title'=>'Ingresa un nombre.' ])!!}
		</div>
	</div>	
<!--	<div class="col-sm-3" align="center">
		<div class="form-group">
			{!!Form:: label('acción','Acción')!!}<br>
			{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Buscar', array('type' => 'button', 'class'=>'btn btn-primary btn-block', 'id'=>'btn-seach'))!!}
		</div>
	</div>-->
</div>
<div class="row">

	<div class="col-sm-4">
		<div class="form-group">
			{!! Form::label('primer_apellido','Primer apellido(*).')!!}
			{!!Form::text('primer_apellido',null,['class'=>'form-control','title'=>'Ingresa tu primer apellido.', 'required'])!!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			{!!Form::label('segundo_apellido','Segundo apellido.')!!}
			{!!Form::text('segundo_apellido',null,['class'=>'form-control','title'=>'Ingresa tu segundo apellido.','placeholder'=>'Ej: Álvarez','id'=>'segundo_apellido'])!!}
		</div>
	</div>
	<div class="col-sm-4">
					<!--Departamento del proveedor -->
		<div class="form-group">
			{!! Form::label('departamento_id','Departamento(*).')!!}
			{!!Form::select('departamento_id',$departamentos, null,['class'=>'form-control','title'=>'Elige tu departamento.', 'name'=>'departamento_id','id'=>'departamento_id2','style'=>'width:100%'])!!}		
		</div>
	</div>
</div>	
<div class="row">

	<div class="col-sm-4">
						<!--Direccion del proveedor -->
		<div class="form-group">
			{!! Form::label('municipio_id','Municipios(*).')!!}
			<br/>
			{!!Form::select('municipio_id',$municipios, null,['class'=>'form-control','title'=>'Elige tu proveedor.','name'=>'municipio_id','id'=>'municipio_id2','style'=>'width:100%'])!!}		
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group ">
			{!!Form::label('correoelectronico','Correo Electronico.')!!}
			{!!Form::email('correoelectronico', null,['class'=>'form-control','title'=>'Ingresa un correo electronico','placeholder'=>'Ej: ejemplo@correo.com','id'=>'correoelectronico'])!!}
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group ">
			{!! Form::label('nombre_tipo','Tipo de teléfono.')!!}
			<select class="form-control" id="nombre_tipo" name="nombre_tipo">
				<option value="Fijo">Fijo</option>
				<option value="Celular">Celular</option>
			</select>
		</div>
	</div>
</div>	
<div class="row">
	<div class="col-sm-4">
		<div class="form-group ">
			{!! Form::label('numero_telefonico','Telefono(*).')!!}
			{!!Form::text('numero_telefonico',null,['class'=>'form-control','title'=>'Ingresa un numero de celular.','onkeypress'=>'return soloNumeros(event)','placeholder'=>'Ej: 3207697523','id'=>'numero_telefonico', 'name'=>'numero_telefonico'])!!}
		</div>
	</div>
	<div class="col-sm-4">
			<!-- Telefono del proveedor -->
		<div class="form-group">
			{!! Form:: label('barrio','Barrio(*)')!!}
			{!!Form::text('barrio',null,['class'=>'form-control','title'=>'Barrio.','id'=>'barrio','name'=>'barrio'])!!}
		</div>
	</div>
	<div class="col-sm-4">
		<!-- Telefono del proveedor -->
		<div class="form-group">
			{!! Form:: label('carrera','Carrera(*)')!!}
			{!!Form::text('carrera',null,['class'=>'form-control','title'=>'Carrera.','id'=>'carrera','name'=>'carrera'])!!}
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<!--Precio de venta -->
		<div class="form-group">
			{!! Form:: label('numero_casa','Numero de la casa.(*)')!!}
			{!!Form::text('numero_casa',null,['class'=>'form-control','title'=>'Numero de la casa.','id'=>'numero_casa','name'=>'numero_casa' ])!!}
		</div>
	</div>
	<div class="col-sm-4">
		<!--Direccion del proveedor -->
		<div class="form-group">
			{!!Form::label('calle','Calle(*)')!!}
			{!!Form::text('calle',null,['class'=>'form-control','title'=>'Calle.','id'=>'callec'])!!}
		</div>
	</div>
</div>
	








                                                  


