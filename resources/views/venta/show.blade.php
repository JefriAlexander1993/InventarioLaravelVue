@extends('layouts.apphome')
@section('content')
<div class="panel1 panel-primary">
      <div class="panel-heading"><strong>Información del venta.</strong>&nbsp;&nbsp;&nbsp;
      	  
      	
		  <a href="{{route('venta.index')}}" class="btn btn-default"><i class="fa fa-list-alt" aria-hidden="true"></i></a>  
</div>
<div class="panel-body">
<div class="col-md-12">
@foreach($detalles as $detalle)
---------------------------------------------------------------------------------------
<p>Numero de venta:&nbsp;{{ $detalle->venta_id }}</p> 
<p>Nombre:&nbsp;{{$detalle->nombre}}</p><!-- Descripcion corta-->
<p>Cantidad:&nbsp;{{$detalle->cantidad}}</p><!-- Descripcion corta-->
<p>Precio unitario:&nbsp;{!!$detalle->preciounitario!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Subtotal:&nbsp;{!!$detalle->subtotal!!}</p> <!-- Descripcion larga y se va interpretar-->
<p>Total:&nbsp;{!!$detalle->total!!}</p> <!-- Descripcion larga y se va interpretar-->


@endforeach
</div>
</div>
</div>

@endsection