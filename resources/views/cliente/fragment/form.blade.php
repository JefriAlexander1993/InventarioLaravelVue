	
<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Crear cliente.</strong><a href="{{route('cliente.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t">
  		
	    	<h5 class="card-title"><strong>Acción:</strong>
	      	<a href="{{route('venta.create')}}" class="btn  btn-link" style="color:red;font-size:15px" title="Desea crear un venta"><i class="fa fa-list-alt" aria-hidden="true"></i><b>Crear venta.</b></a> 
	    	</h5>
	    	
	    	<div class="row">
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('nuip','Nuip(*).')!!}
					{!!Form::number('nuip',null,['class'=>'form-control','title'=>'Ingresa un numero de cedula, no registrado.','min'=>'11','placeholder'=>'Ej: 66.345.234','onkeypress'=>'return isNumberKey(event)','id'=>'nuip'])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('primer_nombre','Primer nombre(*).')!!}
					{!!Form::text('primer_nombre',null,['class'=>'form-control','title'=>'Ingresa tu primer nombre.','id'=>'primer_nombre','name'=>'primer_nombre'])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('segundo_nombre','Segundo nombre(*).')!!}
					{!!Form::text('segundo_nombre',null,['class'=>'form-control','title'=>'Ingresa un nombre.'])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('primer_apellido','Primer apellido(*).')!!}
					{!!Form::text('primer_apellido',null,['class'=>'form-control','title'=>'Ingresa tu primer apellido.' ])!!}
					</div>
				</div>
				
			</div>
			<div class="row">

				<div class="col-sm-3">
					<div class="form-group">
					{!! Form::label('segundo_apellido','Segundo apellido(*).')!!}
					{!!Form::text('segundo_apellido',null,['class'=>'form-control','title'=>'Ingresa tu segundo apellido.'])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group ">
					{!!Form::label('correoelectronico','Correo Electronico.')!!}
					{!!Form::email('correoelectronico', null,['class'=>'form-control','title'=>'Ingresa un correo electronico','placeholder'=>'Ej: ejemplo@correo.com','id'=>'emailCliente'])!!}
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group ">
					{!! Form::label('nombre_tipo','Tipo de teléfono.')!!}
					<select class="form-control" id="nombre_tipo" name="nombre_tipo">
						<option value="Fijo">Fijo</option>
						<option value="Celular">Celular</option>
					</select>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="form-group ">
					{!! Form::label('numero_telefonico','Telefono(*).')!!}
					{!!Form::text('numero_telefonico',null,['class'=>'form-control','title'=>'Ingresa un numero de celular.','onkeypress'=>'return soloNumeros(event)','placeholder'=>'Ej: 3207697523','id'=>'numero_telefonico', 'name'=>'numero_telefonico'])!!}
					</div>
				</div>
			
			</div>
			<div class="row">
			    <div class="col-sm-3">
						<!--Departamento del proveedor -->
					<div class="form-group">
						{!! Form::label('departamento_id','Departamento(*).')!!}
						<br/>
						{!!Form::select('departamento_id',$departamentos, null,['class'=>'form-control','title'=>'Elige tu departamento.', 'name'=>'departamento_id','id'=>'departamento_id','style'=>'width:100%'])!!}		
					</div>
				</div>
				<div class="col-sm-3">
						<!--Direccion del proveedor -->
					<div class="form-group">
					{!! Form::label('municipio_id','Municipios(*).')!!}
					<br/>
					{!!Form::select('municipio_id',$municipios, null,['class'=>'form-control','title'=>'Elige tu proveedor.','name'=>'municipio_id','id'=>'municipio_id','style'=>'width:100%'])!!}		
					</div>
				</div>

				<div class="col-sm-3">
			<!-- Telefono del proveedor -->
					<div class="form-group">
							{!! Form:: label('barrio','Barrio(*)')!!}
							{!!Form::text('barrio',null,['class'=>'form-control','title'=>'Barrio.','id'=>'barrio','name'=>'barrio'])!!}
					</div>
				</div>
				<div class="col-sm-3">
			<!-- Telefono del proveedor -->
					<div class="form-group">
							{!! Form:: label('carrera','Carrera(*)')!!}
							{!!Form::text('carrera',null,['class'=>'form-control','title'=>'Carrera.','id'=>'carrera','name'=>'carrera'])!!}
					</div>
				</div>
			</div> 
			<div class="row">
				<div class="col-sm-3">
				<!--Direccion del proveedor -->
					<div class="form-group">
						{!!Form::label('calle','Calle(*)')!!}
						{!!Form::text('calle',null,['class'=>'form-control','title'=>'Calle.','id'=>'callec'])!!}
					</div>
				</div>
				<div class="col-sm-3">
						<!--Precio de venta -->
					<div class="form-group">
							{!! Form:: label('numero_casa','Numero de la casa.(*)')!!}
							{!!Form::text('numero_casa',null,['class'=>'form-control','title'=>'Numero de la casa.','id'=>'numero_casa','name'=>'numero_casa' ])!!}
					</div>
				</div>
			
			</div>	
		</div> 
	</div> 
	<div class="card-footer bg-transparent ">
		{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
	</div>
</div>









                                                  


