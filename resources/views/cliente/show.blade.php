@extends('layouts.apphome')
@section('content')

<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Información del cliente.</strong></div>
  		<div class="card-body t">
	    	<h5 class="card-title"><strong>Acciones:</strong>
			   <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-primary btn-sm"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      			<a href="{{route('cliente.index')}}" class="btn  btn-light btn-sm"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
	    	</h5>
	  		<p><strong>Nombre:&nbsp;</strong>{{$cliente->nombre}}</p> <!-- Imprimir el nombre del cliente-->
			<p><strong>Telefono:&nbsp;</strong>{{$cliente->telefono}}</p><!-- Telefono del cliente-->
			<p><strong>Direccion:&nbsp;</strong>{!!$cliente->direccion!!}</p> <!-- Direccion del cliente-->
			<p><strong>Correo Electronico:&nbsp;</strong>{!!$cliente->correoelectronico!!}</p> <!-- Correo electronico del cliente-->
			<p><strong>Observacion:&nbsp;</strong>{!!$cliente->observacion!!}</p>
		</div>
		<div class="card-footer bg-transparent ">
					
		</div>
</div>
@endsection