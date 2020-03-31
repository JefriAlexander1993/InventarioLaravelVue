@extends('layouts.apphome')
   @section('content')

<div class="card  col-sm-12" >    
 	<div class="card-header bg-transparent "><strong>Escritorio</strong></div>
  		<div class="card-body t">
	    	 <div class="col-sm-12">
			     @include('proveedor.fragment.info')  
   			</div> 
   <div class="row">
	   <div class="col-sm-6">
	   		<h4><strong> LISTADO DE PROVEEDOR.</strong>
				<a href="{{route('proveedor.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i></a>
				<a href="{{url('/proveedorpdf')}}" target="_blank" class="btn btn-danger  btn-sm"><i class="fal fa-file-pdf" aria-hidden="true"></i></a>
			</h4>
	   </div>
	   <div class="col-sm-6">
	    @include('proveedor.fragment.aside') 
	   </div>
   </div> 

<br/>
<div class="table-responsive-sm">
	<table class="table table-hover" id="proveedor_id">
		<thead>
			<tr>
			<th class="text-center">Id</th>
			<th class="text-center">Nit</th>
			<th class="text-center">Nombre de proveedor</th>
			<th class="text-center">Nombre de representante</th>
			<th class="text-center">Dirección</th>
			<th class="text-center">Teléfono</th>
			<th class="text-center">Email</th>
			<th class="text-center">Editar</th>	
			<th class="text-center">Ver</th>
			<th class="text-center">Eliminar</th>
			</tr>
		</thead>
		<tbody >
		
		   <tr>
	       		@foreach ($proveedores as $proveedor)
	       	<td align="center">{{$proveedor->id}}</td>
		   <td align="center">{{$proveedor->nit}}</td>
	       <td align="center">{{$proveedor->nombreproveedor}}</td>
	       <td align="center">{{$proveedor->nombrerepresentante}}</td>
	       <td align="center">{{$proveedor->direccion}}</td>
	       <td align="center">{{$proveedor->telefono}}</td>
	       <td align="center">{{$proveedor->email}}</td>
		   <td align="center"> <a href="{{route('proveedor.edit', $proveedor->id)}}" class="btn btn-sm btn-primary" id="editProveedor"><i  class="far fa-edit" aria-hidden="true"></i></a ></td>
		   <td align="center"> <a href="{{route('proveedor.show', $proveedor->id)}}" class="btn btn-sm btn btn-light"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
		   <td align="center"><form action="{{route('proveedor.destroy', $proveedor->id)}}" method="POST">
	       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
	       <input type="hidden" name="_method" value="DELETE">	
		   <button class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>	
		   </form>
		   </td>
		   </tr>
	@endforeach

		</tbody>
	</table>
</div>
	<div class="card-footer bg-transparent col-sm-12"  >
		
			{!!$proveedores->render() !!}
		
	</div>
</div>
</div>
  
@endsection