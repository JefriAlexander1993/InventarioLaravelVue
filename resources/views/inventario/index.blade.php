@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" style="margin-left:auto;">    
  <div class="card-header bg-transparent "><strong>Inventario</strong></div>
      <div class="card-body t">
        <div class="row">
          <div class="col-sm-6">
          <a href="{{url('/articulopdf')}}" target="_blank" class="btn btn btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
           <a href="{{route('compra.create')}}" target="_blank" class="btn btn btn-success"><i class="" aria-hidden="true"></i></a>
          </div>
          <div class="col-sm-6">
               @include('inventario.fragment.aside') 
          </div>
        </div>
          <div class="col-sm-12 table-responsive-sm"  >
    <table class="table table-hover" id="inventario_id">
        <thead>
            <tr>
       
            <th class="text-center">Codigo</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Precio Unitario</th>
            <th class="text-center">Precio Venta</th>
            <th class="text-center">Stock minimo </th>
            <th class="text-center">Fecha vencimiento </th>
            </tr>
            </thead>
        <tbody>
            @foreach ($detalles as $articulo)
           <tr      
           @if($articulo->cantidad <= $articulo->stockmin)
           
           style="background-color:#e3342f;color:#fff"

           @endif
           
           >
        
           <td class="text-center">{{$articulo->codigo}}</td>
           <td class="text-center">{{$articulo->nombre}}</td>
           <td class="text-center">{{$articulo->cantidad}}</td>
           <td class="text-center">{{$articulo->preciounitario}}</td>
           <td class="text-center">{{$articulo->precioventa}}</td>
           <td class="text-center">{{$articulo->stockmin}}</td>
           <td class="text-center">{{$articulo->fechavencimiento}}</td>
           </tr>
           @endforeach
            </tbody>
    </table>
</div>
</div>
<div class="card-footer bg-transparent ">
          
</div>
</div>



@endsection
