   @include('proveedor.fragment.error') 	
<div class="card  col-sm-12" >    
 <div class="card-header bg-transparent ">Editar proveedor</div>
  <div class="card-body t">
    <h5 class="card-title">Acciones:
    	<a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-primary"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>  
      	<a href="{{route('proveedor.show',$proveedor->id)}}" class="btn btn-default"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
    </h5>
    <div class="row">
		<div class="col-sm-4">
			<div class="form-group">
				{!!Form::label('nit', 'Nit(*).')!!}
				{!!Form::number('nit',null,['class'=>'form-control','title'=>'Ingresa el nit de proveedor.', 'placeholder' => 'Ej: 123241232','required'=>'required','id'=>'nombreproveedor','name'=>'nombreproveedor','id'=>'id'])!!}
			  				
			</div>
		</div>
		<div class="col-sm-4">
					<!--Nombre -->
			<div class="form-group">
					{!! Form:: label('nombreproveedor','Nombre del proveedor(*).')!!}
					{!!Form::text('nombreproveedor',null,['class'=>'form-control','title'=>'Nombre del proveedor del articulo.', 'placeholder' => 'Ej: Tecnoquimica','onkeypress'=>'return soloLetras(event)','onKeyUp'=>'this.value = this.value.toUpperCase()','required'=>'required','id'=>'nombreproveedor','name'=>'nombreproveedor',])!!}
			</div>
		</div>
		<div class="col-sm-4">
			<!--Nombre del Representante -->
		<div class="form-group">
					{!! Form:: label('nombrerepresentante','Nombre de representante(*).')!!}
					{!!Form::text('nombrerepresentante',null,['class'=>'form-control','title'=>'Nombre del representante del proveedor','required'=>'required','placeholder' => 'Ej: Fredy Alan Mora Chavéz','onkeypress'=>'return soloLetras(event)' ,'onKeyUp'=>'this.value = this.value.toUpperCase()','id'=>'nombrerepresentante','name'=>'nombrerepresentante'])!!}
		</div>
	</div>
	</div>
<div class="row">
	
	<div class="col-sm-4">
					<!--Direccion del proveedor -->
					<div class="form-group">
					{!!Form:: label('direccion','Dirección')!!}
					{!!Form::text('direccion',null,['class'=>'form-control','title'=>'Dirección del proveedor.', 'placeholder' => 'Ej: Calle 5 13-18','id'=>'direccion','name'=>'direccion','required'=>'required'])!!}
					</div>
	</div>
	<div class="col-sm-4">
			<!-- Telefono del proveedor -->
		<div class="form-group">
				{!! Form:: label('telefono','Teléfono(*)')!!}
				{!!Form::text('telefono',null,['class'=>'form-control','title'=>'Numero telefono del representante o proveedor.','placeholder' => 'Ej: 3245341234','onKeyPress'=>'return soloNumeros(event)','id'=>'telefono','name'=>'telefono','required'=>'required'])!!}
		</div>
	</div>
	<div class="col-sm-4">
			<!--Precio de venta -->
		<div class="form-group">
				{!! Form:: label('email','Email')!!}
				{!!Form::text('email',null,['class'=>'form-control','title'=>'Correo electronico del proveedor.','placeholder' => 'Eje: alan@gmail.com','id'=>'email','name'=>'email' ])!!}
		</div>
	</div>
</div>
	<!--                          row 2                                             -->

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
		{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
</div>
</div>

