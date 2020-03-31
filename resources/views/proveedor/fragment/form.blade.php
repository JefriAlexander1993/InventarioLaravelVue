   @include('proveedor.fragment.error') 	
<div class="card  col-sm-12" >    
 <div class="card-header bg-transparent ">Crear proveedor <a href="{{route('proveedor.index')}}" class="btn btn-sm btn-secondary"><i class="far fa-plus-square" aria-hidden="true"></i></a></div>
  <div class="card-body t">
    <div class="row">
		<div class="col-sm-3">
			<div class="form-group">
				{!!Form::label('nit', 'Nit(*).')!!}
			    <input id="nit" type="number" class="form-control" name="nit"  required  title='Ingresa el nit de proveedor.' placeholder = 'Ej: 12324242' min='1' onkeypress="return isNumberKey(event)" >					
			</div>
		</div>
		<div class="col-sm-3">
					<!--Nombre -->
			<div class="form-group">
				{!! Form:: label('nombreproveedor','Nombre del proveedor(*).')!!}
				{!!Form::text('nombreproveedor',null,['class'=>'form-control','title'=>'Nombre del proveedor del articulo.', 'placeholder' => 'Ej: Tecnoquimica','onkeypress'=>'return soloLetras(event)','onKeyUp'=>'this.value = this.value.toUpperCase()','required'=>'required','id'=>'nombreproveedor','name'=>'nombreproveedor',])!!}
			</div>
		</div>
		<div class="col-sm-3">
			<!--Nombre del Representante -->
			<div class="form-group">
					{!! Form:: label('nombrerepresentante','Nombre y apellido del representante(*).')!!}
					{!!Form::text('nombrerepresentante',null,['class'=>'form-control','title'=>'Nombre del representante del proveedor','required'=>'required','placeholder' => 'Ej: Fredy Alan Mora Chavéz','onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()','id'=>'nombrerepresentante','name'=>'nombrerepresentante'])!!}
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
		</div>
<div class="row">
	<div class="col-sm-3">
			<!-- Telefono del proveedor -->
		<div class="form-group">
				{!! Form:: label('numero_telefono','Teléfono(*)')!!}
				<input type="text" name="numero_telefonico" class="form-control" title="Numero telefono del representante o proveedor." placeholder="Ej: 3245341234" id="numero_telefono" required="">
				
		</div>
	</div>
	<div class="col-sm-3">
			<!--Precio de venta -->
		<div class="form-group">
				{!!Form:: label('email','Email')!!}
				{!!Form::email('email',null,['class'=>'form-control','title'=>'Correo electronico del proveedor.','placeholder' => 'Eje: alan@gmail.com','id'=>'email','name'=>'email' ])!!}
		</div>
	</div>
		<div class="col-sm-3">
						<!--Departamento del proveedor -->
			<div class="form-group">
			{!! Form::label('departamento_id','Departamento(*).')!!}
			<br/>
			{!!Form::select('departamento_id',$departamentos, null,['class'=>'form-control','title'=>'Elige tu departamento.', 'required'=>'required','name'=>'departamento_id','id'=>'departamento_id','style'=>'width:100%'])!!}		

			</div>
		</div>
		<div class="col-sm-3">
						<!--Direccion del proveedor -->
			<div class="form-group">
			{!! Form::label('municipio_id','Municipios(*).')!!}
			<br/>
			{!!Form::select('municipio_id',$municipios, null,['class'=>'form-control','title'=>'Elige tu proveedor.', 'required'=>'required','name'=>'municipio_id','id'=>'municipio_id','style'=>'width:100%'])!!}		

			</div>
		</div>
</div>
	<!--                          row 2                                             -->
<div class="row">
	<div class="col-sm-3">
			<!-- Telefono del proveedor -->
		<div class="form-group">
				{!! Form:: label('barrio','Barrio(*)')!!}
				{!!Form::text('barrio',null,['class'=>'form-control','title'=>'Barrio.','id'=>'barrio','name'=>'barrio','required'=>'required'])!!}
		</div>
	</div>
	<div class="col-sm-3">
			<!-- Telefono del proveedor -->
		<div class="form-group">
				{!! Form:: label('carrera','Carrera(*)')!!}
				{!!Form::text('carrera',null,['class'=>'form-control','title'=>'Carrera.','id'=>'carrera','name'=>'carrera','required'=>'required'])!!}
		</div>
	</div>
	<div class="col-sm-3">
				<!--Direccion del proveedor -->
			<div class="form-group">
				{!!Form::label('calle','Calle(*)')!!}
				{!!Form::text('calle',null,['class'=>'form-control','title'=>'Calle.','id'=>'callep','required'=>'required'])!!}
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
<div class="row">
	<div class="col-sm-12" >
			<!-- Observacion cualquiera del proveedor -->
		<div class="form-group">
				{!! Form:: label('observacion','Observación')!!}
				{!!Form::textarea('observacion', null,['class'=>'form-control', 'title'=>'Observación respecto al proveedor.','placeholder' => 'Ej: El representante solo pasa los sabados a las 4pm.','cols'=>"40" ,'rows'=>"3",'id'=>'observacion','name'=>'observacion'])!!}
		</div>
	</div>
</div>
</div>
  <div class="card-footer bg-transparent ">
			 	{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'class'=>'btn btn-primary btn-lg btn-block' ))!!}
</div>
</div>

