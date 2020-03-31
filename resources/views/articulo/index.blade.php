@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" >    
  <div class="card-header bg-transparent "><strong>Escritorio</strong></div>
      <div class="card-body t">
        <div class="col-sm-12">
           @include('articulo.fragment.info')  
           @include('articulo.fragment.error')  
        </div> 
        <div class="row">
          <div class="col-sm-6" >
            <h4><strong>LISTADO DE ARTICULOS.</strong> <a class="btn btn-success btn-sm" href="{{route('articulo.create')}}"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
              <a href="{{url('/articulopdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></h4>
          </div>
          <div class="col-sm-6">
              @include('articulo.fragment.aside') 
          </div>
        </div> 
  
      <div class="col-md-12 table-responsive-sm" >
        <br><br>
      <table class="table table-striped table-bordered" style="width:100%"  id="tablaArticulo">
          <thead>
              <tr>
              <th class="text-center">Codigo</th>
              <th class="text-center">Fecha vencimiento</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Precio_U</th>
              <th class="text-center">Iva</th>
              <th class="text-center">Precio_V</th>
              <th class="text-center">Stock minimo</th>
              <th class="text-center">Fecha de creación</th>
              <th class="text-center" >Editar</th>  
              <th class="text-center">Ver</th>
              <th class="text-center">Eliminar</th>
              </tr>
              </thead>
               <tbody>
              @foreach ($articulos as $articulo)
             <tr>
             <td class="text-center">{{$articulo->codigo}}</td>
             <td class="text-center">{{$articulo->fechavencimiento}}</td>
             <td class="text-center">{{$articulo->nombre}}</td>
             <td class="text-center">{{$articulo->preciounitario}}</td>
             <td class="text-center">{{$articulo->iva}}</td>
             <td class="text-center">{{$articulo->precioventa}}</td>
             <td class="text-center">{{$articulo->stockmin}}</td>
             <td class="text-center">{{$articulo->created_at}}</td>
           
             <td  class="text-center"><a href="{{route('articulo.edit', $articulo->id)}}" class="btn btn-sm btn-primary"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
           <td  class="text-center"><a href="{{route('articulo.show', $articulo->id)}}" class="btn btn-light btn-sm "><i class="fa fa-eye" aria-hidden="true"></i></a></td>
             <td  class="text-center"><form action="{{route('articulo.destroy', $articulo->id)}}" method="POST">
             {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
             <input type="hidden" name="_method" value="DELETE">  
           <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>  
           </td>
             </tr>
             @endforeach
              </tbody>
      </table>
      </div>
      <div class="card-footer bg-transparent col-sm-12"  >
        
          {!!$articulos->render() !!}
        
      </div>
  </div>
</div>

@endsection
