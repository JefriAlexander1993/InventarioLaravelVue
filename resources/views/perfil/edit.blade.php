@extends('layouts.apphome')
@section('content')
<div class="col-md-3">

</div>

 <div class="panel1 panel-default1">
      <div class="panel-heading"><strong>Editar perfil.</strong>&nbsp;&nbsp;<a href="{{route('perfil.show', $perfil->id)}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a>
   
     </div>
<div class="panel-body">
<div class="col-md-12">
{!!Form::model($perfil,['route'=>['perfil.update', $perfil->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('perfil.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
</div>
</div>
</div>
@endsection
