@extends('layouts.apphome')
    @section('content')

<div class="card  col-sm-12" >    
  <div class="card-header bg-transparent "><strong>Escritorio</strong></div>
      <div class="card-body t">
    
        <div class="row">
          <div class="col-sm-6" >
            <h4><strong>LISTADO DE VENTAS.</strong> <a class="btn btn-success btn-sm" href="{{route('venta.create')}}" ><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
              <a href="{{url('/comprapdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></h4>
          </div>
          <div class="col-sm-6">
               @include('venta.fragment.aside') 
          </div>
        </div> 

		<div class="col-sm-6">
			<div class="form-group">
				<div class="row">
					<div class="col-sm-3">
						{!!Form:: label('totalventa','Total de ventas')!!}
					</div>
					<div class="col-sm-9">
						<input class="form-control" style="align:right" disabled  value="<?php echo $sumVenta ?>"  type="text">
					</div>	
				</div>
			</div>
		</div>
		</div>	
		{!!Form::close()!!}
	
<br/>
<div class="col-md-12 table-responsive-sm">
	<table class="table table-striped table-bordered" style="width:100%" id="venta_id">
	<thead>
		<tr>
		<th class="text-center">#Factura</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Total</th>
		<th class="text-center">Editar</th>	
		<th class="text-center">Ver</th>
		<th class="text-center">Eliminar</th>
        </tr>
	</thead>
	<tbody>
		@foreach ($ventas as $venta)
	   <tr>
	   <td align="center">{{$venta->id}}</td>
	   <td align="center">{{$venta->created_at}}</td>
       <td align="center">{{$venta->totalventa}}</td>
	   	<td align="center"><a class="btn btn btn-warning" target="_blank"   href="{{route('facturapdf', $venta->id)}}"><i class="fa fa-file-text" aria-hidden="true"></i></a></td>
	   
	   <td align="center"> <a href="{{route('venta.show', $venta->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hcodigoden="true"></i></a></td>
	   <td align="center"><form action="{{route('venta.destroy', $venta->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">	
	   <button class="btn btn-sm btn-danger" id="btn-delete-sale"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
	   </form>
	   </td>
	   </tr>
@endforeach
	</tbody>
</table>
    </div>
    <div class="card-footer bg-transparent col-sm-12">
          {!!$ventas->render() !!}
     </div>
  	</div>
</div>

@endsection

</script>