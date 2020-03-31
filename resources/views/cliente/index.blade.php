@extends('layouts.apphome')
@section('content')
<div class="card  col-sm-12" >    
  <div class="card-header bg-transparent "><strong>Escritorio</strong></div>
      <div class="card-body t">
        <div class="col-sm-12">
              @include('message.info')
              @include('message.error')
        </div> 
        <div class="row">
          <div class="col-sm-6" >
            <h4><strong>LISTADO DE CLIENTES.</strong> <a href="{{route('cliente.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> <a href="{{url('/clientepdf')}}" target="_blank" class="btn  btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
            </h4>
          </div>
          <div class="col-sm-6">
              @include('cliente.fragment.aside') 
          </div>
        </div> 
 
<div class="col-md-12 table-responsive">
<table class="table table-striped table-bordered" style="width:100%" id="cliente_id1">
    <thead>
        <tr>
        <th class="text-center">Nuip</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Correo Electronico</th>
        <th class="text-center">Observacion</th>
        <th class="text-center" >Editar</th>  
        <th class="text-center" >Ver</th>    
        <th class="text-center" >Eliminar</th>      
        </tr>
        </thead>
    <tbody>
        @foreach ($clientes as $cliente)
       <tr>
       <td align="center">{{$cliente->nuip}}</td>
       <td align="center">{{$cliente->primer_nombre}} {{$cliente->segundo_nombre}} 
        {{$cliente->primer_apellido}} {{$cliente->segundo_apellido}}
       </td>
       <td align="center">{{$cliente->telefono}}</td>
       <td align="center">{{$cliente->direccion}}</td>
       <td align="center">{{$cliente->correoelectronico}}</td>
       <td align="center">{{$cliente->observacion}}</td>
       <td align="center"><a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-sm btn-primary"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
       <td align="center"><a href="{{route('cliente.show', $cliente->id)}}" class="btn btn btn-light btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td align="center"><form action="{{route('cliente.destroy', $cliente->id)}}" method="POST">
       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
       <input type="hidden" name="_method" value="DELETE">  
       <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button> 
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