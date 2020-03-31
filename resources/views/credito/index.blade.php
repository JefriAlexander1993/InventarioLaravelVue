@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" >    
 	<div class="card-header bg-transparent "><strong>Escritorio</strong></div>
  		<div class="card-body t">
	    	 <div class="col-sm-12">
			     @include('credito.fragment.info')  
   			</div> 
   <div class="row">
	   <div class="col-sm-6">
	   		<h4><strong> LISTADO DE CREDITOS.</strong>
				<a href="{{url('/creditopdf')}}" target="_blank" class="btn btn-danger  btn-sm"><i class="fal fa-file-pdf" aria-hidden="true"></i></a>
			</h4>
	   </div>
	   <div class="col-sm-6">
	    @include('credito.fragment.aside') 
	   </div>
   </div> 
   <!--{!!Form::open(['route'=>'credito.index', 'method'=>'GET','class'=>'navbar-form'])!!}
	<div class="col-sm-5 input-group">
	{!!Form::number('nit',null,['class'=>'form-control' , 'placeholder'=>'Buscar..', 'aria-describedby'=>'search'])!!}
	<span class="input-group-addon" id="search">
	<i class="fa fa-search" aria-hidden="true"></i>
	</span>
	</div>-->
<br/>
<div class="table-responsive-sm">
	<table class="table table-striped table-bordered" style="width:100%" id="detalle_cliente">
		<thead>
			<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Nuip</th>
			<th class="text-center">Fecha de credito</th>
			<th class="text-center">Valor de credito</th>
			<th class="text-center">Saldo actual</th>
			<th class="text-center">Cuotas</th>
			<th class="text-center">Valor de cuota</th>
			<th class="text-center">Forma de pago</th>
			<th class="text-center">Observación</th>
			<th class="text-center">Acción</th>	
			</tr>
		</thead>
		<tbody >
		 	<tr>
	       <td align="center"></td>
	       <td align="center"></td>
	       <td align="center"></td>
	       <td align="center"><td>
	       <td align="center"></td>
	       <td align="center"></td>
	       <td align="center"></td>
	       <td align="center"></td>
	       <td align="center"></td>
		   </tr>
	

		</tbody>
	</table>
</div>

</div>
</div>
@endsection
