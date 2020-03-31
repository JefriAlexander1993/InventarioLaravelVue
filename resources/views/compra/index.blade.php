@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" >    
  <div class="card-header bg-transparent "><strong>Escritorio</strong></div>
      <div class="card-body t">
        <div class="col-sm-12">
           @include('proveedor.fragment.info')  
        </div> 
        <div class="row">
          <div class="col-sm-6" >
            <h4><strong>LISTADO DE COMPRAS.</strong> <a class="btn btn-success btn-sm" href="{{route('compra.create')}}"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
              <a href="{{url('/comprapdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></h4>
          </div>
          <div class="col-sm-6">
               @include('compra.fragment.aside') 
          </div>
        </div> 

    <div class="col-md-12 table-responsive-sm" >
		<table class="table table-hover " id="compra_id">
			<thead>
				<tr>
				<th class="text-center"># de Compra</th>
				<th class="text-center">Fecha Compra</th>
				<th class="text-center">Total Compra</th>
				<th class="text-center">Editar</th>	
				<th class="text-center">Ver</th>
				<th class="text-center">Eliminar</th>
				</tr>
			</thead>
		<tbody>
		@foreach ($compras as $compra)
		   <tr>
		   <td class="text-center">{{$compra->id}}</td>
		   <td class="text-center">{{$compra->created_at}}</td>
		   <td class="text-center">{{$compra->totalCompra}}</td>
		   <td> <a href="{{route('compra.show', $compra->id)}}" class="btn btn-labeled btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
		   <td><form action="{{route('compra.destroy', $compra->id)}}" method="POST">
	       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
	       <input type="hidden" name="_method" value="DELETE">	
		   <button class="btn btn-labeled btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
		   </form>
		   </td>
		   </tr>
			@endforeach
		</tbody>
		</table>
    </div>
    <div class="card-footer bg-transparent col-sm-12">
          {!!$compras->render() !!}   
     </div>
  	</div>
</div>


@endsection