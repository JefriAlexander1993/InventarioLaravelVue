@extends('layouts.apphome')

@section('content')
 <nav aria-label="breadcrumb"  style="margin-left:1040px;margin-top:-20px;margin-bottom:-20px" >
    <ol class="breadcrumb" style="background-color:#fff;">
      <li class="breadcrumb-item" ><a href="#">Escritorio</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Users.index')}}">Usuarios</a></li>
      <li class="breadcrumb-item active" aria-current="page">Ver</li>
    </ol>
</nav>
<div class="card">    
      <div class="card-body t">

        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title"><b>VER USUARIO.</b>
                    <a class="btn btn-xs btn-success pull-right" href="{{ route('Users.index')}}" title="Listar usuarios">
                      <i class="fa fa-plus-square">
                      </i>
                    </a>
                    <a class="btn btn-primary pull-right" href="{{ route('Users.edit', $user->id)}}" title="Editar usuario">
                    <i class="fa fa-edit"></i>
                    </a>
                </h4> 
            </div>
            <div class="col-sm-6">
              @include('Admin.Users.fragment.aside')
             </div>
        </div> 
        <br>
        <div class="col-sm-12">
        
                <p><b>Nombres:</b>{{ $user->name_user }}</p>
                <p><b>Apellidos:</b>{{ $user->lastname }}</p>
                <p><b>Nuip:</b>{{ $user->nuip }}</p>
                <p><b>Fecha de nacimiento:</b>{{ $user->date_birth}}</p>
                <p><b>Dirección:</b>{{ $user->address}}</p>
                <p><b>Teléfono:</b>{{ $user->phone}}</p>
                <p><b>Email:</b>{{ $user->email}}</p>
       
        </div>

@endsection
