@extends('layouts.apphome')
@section('content')

<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Crear un articulo.</strong><a href="{{route('articulo.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t">
  	
	    	<h5 class="card-title"><strong>Acción:</strong>
	      	<a href="{{route('caja.index')}}" class="btn btn-sm btn-light"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
	    	</h5>
				
			<p><strong>Identificacion:</strong>&nbsp;{{$caja->id}}</p> <!-- id de la caja-->
			<p><strong>Nombre del usuario de la caja:</strong>&nbsp;{{$caja->nombreusuario}}</p><!-- Nombre usuario caja-->
			<p><strong>Valor inicial:</strong>&nbsp;{{$caja->valorinicial}}</p> <!-- Valor inicial-->
			<p><strong>Valor final:</strong>&nbsp;{{$detalles->valorfinal}}</p> 
			<p><strong>Ganancia:</strong>&nbsp;{!!$detalles->ganancia!!}</p> <!-- Ganancia del dia-->
	</div>
	<div class="card-footer bg-transparent ">
		
	</div>
</div>

@endsection