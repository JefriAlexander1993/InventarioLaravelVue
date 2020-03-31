@extends('layouts.apphome')
@section('content')

<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Información del articulo.</strong></div>
  		<div class="card-body t">
	    	<h5 class="card-title"><strong>Acciones:</strong>
			   <a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-primary"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		      	<a href="{{route('articulo.index')}}" class="btn btn-secondary"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
	    	</h5>
	  		<p><strong>Codigo:&nbsp;</strong>{{$articulo->codigo}}</p> <!-- Imprimir el nombre del articulo-->
			<p><strong>Fecha de vencimiento:</strong>&nbsp;{{$articulo->fechavencimiento}}</p><!-- Descripcion corta-->
			<p><strong>Nombre:</strong>&nbsp;{{$articulo->nombre}}</p><!-- Descripcion corta-->
			<p><strong>Rubro:</strong>&nbsp;{!!$articulo->rubro!!}</p>
			<p><strong>Marca:</strong>&nbsp;{!!$articulo->marca!!}</p> <!-- Descripcion larga y se va interpretar-->
			<p><strong>Precio unitario:</strong>&nbsp;{!!$articulo->preciounitario!!}</p> <!-- Descripcion larga y se va interpretar-->
			<p><strong>Iva:</strong>&nbsp;{!!$articulo->iva!!}</p> <!-- Descripcion larga y se va interpretar-->
			<p><strong>Precio venta:</strong>&nbsp;{!!$articulo->precioventa!!}</p> <!-- Descripcion larga y se va interpretar-->
			<p><strong>Stock:</strong>&nbsp;{!!$articulo->stockmin!!}</p> <!-- Descripcion larga y se va interpretar-->
			<p><strong>Fecha ingreso:</strong>&nbsp;{!!$articulo->created_at!!}</p> 
		</div>
	<div class="card-footer bg-transparent ">
				
	</div>
</div>

@endsection