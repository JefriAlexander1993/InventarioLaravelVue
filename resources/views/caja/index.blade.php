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
            <h4><strong>LISTADO DE CAJAS.</strong> <a class="btn btn-success btn-sm" href="{{route('caja.create')}}"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
              <a href="{{url('/cajapdf')}}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></h4>
          </div>
          <div class="col-sm-6">
              @include('caja.fragment.aside') 
          </div>
        </div> 
        {!!Form::open(['route'=>'articulo.index', 'method'=>'GET','class'=>'navbar-form'])!!}
        <div class="col-sm-5 input-group">
        {!!Form::number('codigo',null,['class'=>'form-control', 'placeholder'=>'Buscar..', 'aria-describedby'=>'search'])!!}
        <span class="input-group-addon" id="search">
        <i class="fa fa-search" aria-hidden="true"></i>
        </span>
        </div>
        {!!Form::close()!!}
      <br/>
      <div class="col-md-12 table-responsive-sm">
<table class="table table-hover">
    <thead>
        <tr>
        <th  class="text-center">Id</th>
        <th  class="text-center">Nombre usuario</th>
        <th  class="text-center">Caja inicial</th>
        <th  class="text-center">Caja final</th>
        <th  class="text-center">Ganancia</th>
        <th  class="text-center"colspan="3" >Acción</th>  
        </tr>
        </thead>
    <tbody>
        @foreach ($detalles as $caja)
       <tr>
       <td align="center">{{$caja->id}}</td>
       <td align="center">{{$caja->nombreusuario}}</td>
       <td align="center">{{$caja->valorinicial}}</td>
       <td align="center">{{$caja->valorfinal}}</td>
       <td align="center">{{$caja->ganancia}}</td>
       <td><a title="Cerrar caja." id="edit" href="{{route('caja.edit', $caja->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-times-circle-o" aria-hidden="true"></i></a></td>
     <td><a title="Ver caja." href="{{route('caja.show', $caja->id)}}" class="btn btn-light btn-sm "><i class="fa fa-eye" aria-hidden="true"></i></a></td>
       <td><form action="{{route('caja.destroy', $caja->id)}}" method="POST">
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
      <div class="card-footer bg-transparent col-sm-12"  >
        
         {!!$cajas->render() !!}
        
      </div>
  </div>
</div>

@endsection