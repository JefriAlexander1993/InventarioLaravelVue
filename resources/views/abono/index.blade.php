@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" >    
 	<div class="card-header bg-transparent "><strong>Escritorio</strong></div>
  		<div class="card-body t">
		   <div class="row">
			   <div class="col-sm-6">
			   		<h4><strong> LISTADO ABONOS.</strong>
						<a href="{{route('abono.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i></a>
						<a href="{{url('/abonospdf')}}" target="_blank" class="btn btn-danger  btn-sm"><i class="fal fa-file-pdf" aria-hidden="true"></i></a>
					</h4>
			   </div>
			   <div class="col-sm-6">
			    @include('proveedor.fragment.aside') 
			   </div>
		   </div> 

<br/>
		<div class="table-responsive-sm">
			<table class="table table-hover" id="abono_id">
		   		 <thead>
			        <tr>
				        <th  class="text-center">Nuip</th>
				        <th  class="text-center">Nombre de completo</th>
				        <th  class="text-center">Fecha de abono</th>
				        <th  class="text-center">Valor del abono</th>
				        <th  class="text-center">Saldo restante</th>
				        <th  class="text-center">Ver</th>  
				        <th  class="text-center">Editar</th>  
				        <th  class="text-center">Eliminar</th>  
			        </tr>
		        </thead>
		    <tbody>
		        @foreach ($cliente_abonos as $abono)
		       <tr>
			        <td align="center">{{$abono->clientes->nuip}}</td>
			        <td align="center">{{$abono->clientes->primer_nombre}}{{$abono->clientes->primer_apellido}}</td>
			        <td align="center">{{date("d/m/Y", strtotime($abono->abonos->fecha_abono))}}</td>
			        <td align="center">{{$abono->abonos->valor_abono}}</td>
			        <td align="center">{{$abono->saldo_actual}}</td>
			    	<td align="center">
			    		<a title="Ver abono." href="{{route('abono.show', $abono->id)}}" class="btn btn-light btn-sm "><i class="fa fa-eye" aria-hidden="true"></i></a>
			    	</td>
			    	 <td align="center">
			    	 	<a title="Editar abono." id="edit" href="{{route('abono.edit', $abono->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a>
			    	 </td>
			        <td align="center">
				       	<form action="{{route('abono.destroy', $abono->id)}}" method="POST">
				       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
				       <input type="hidden" name="_method" value="DELETE">  
				     	<button title="Eliminar caja." class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
				     	</form>
			     	</td>
		       </tr>
		       @endforeach
		     </tbody>
			</table>
		</div>
	</div>
</div>
  
@endsection