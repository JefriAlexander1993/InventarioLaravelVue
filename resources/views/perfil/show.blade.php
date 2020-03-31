@extends('layouts.apphome')
@section('content')
 
 <div class="panel panel-primary">
      <div class="panel-heading"><strong>Información del perfil.</strong>&nbsp;&nbsp;&nbsp;
      <td align="center"><a  data-target="#myModal" data-toggle="modal" id="reset" name="reset" class="btn btn-sm btn-default">
        <i class="fa fa-cog fa-spin fa-1x fa-lg" aria-hidden="true"></i></a></td>
      	
</div>
<div class="panel-body">
<div class="col-md-12">
<p><strong>Nombre:&nbsp;</strong>{{$perfil->name}}</p> 
<p><strong>Correo Electronico:&nbsp;</strong>{{$perfil->email}}</p>
<p><strong>Pais:&nbsp;</strong>{{$perfil->pais}}</p> 
<p><strong>Ciudad:&nbsp;</strong>{{$perfil->ciudad}}</p> 
<p><strong>Fecha de Nacimimiento:&nbsp;</strong>{{$perfil->fechaNacimiento}}</p> 
<p><strong>Estudios:&nbsp;</strong>{{$perfil->estudios}}</p> 
<p><strong>Informacion Personal:&nbsp;</strong>{{$perfil->informacionPersonal}}</p> 
</div>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title" id="exampleModalLabel"><strong>CONFIRMAR</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Si desea editar su información y cambiar su contraseña, de le click al boton modicar de lo contrario cerrar.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar&nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>
        <a type="button" href="{{route('perfil.edit', $perfil->id )}}" class="btn btn-primary">Modificar&nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
      </div>
    </div>
  </div>
</div>

@endsection

