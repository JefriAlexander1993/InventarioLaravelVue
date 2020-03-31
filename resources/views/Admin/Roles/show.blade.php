@extends('layouts.apphome')

@section('content')
<nav aria-label="breadcrumb" style="margin-left:1040px;margin-top:-20px;margin-bottom:-20px">
          <ol class="breadcrumb" style="background-color:#fff;">
            <li class="breadcrumb-item" ><a href="#">Escritorio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver</li>
          </ol>
</nav>

<div class="card  col-sm-12" >    
       <div class="card-body t">
           <div class="row">
               <div class="col-sm-6">
                    <h4><strong>VER ROL.</strong>
                        <a class="btn btn-light pull-right" href="{{ route('Roles.index')}}" title="Listado de todos los usuarios."><i class="fa fa-list-ol"></i>
                        </a>
                        <a href="{{ route('Roles.edit', $role->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>   
                    </h4>
               </div>
               <div class="col-sm-6">
                @include('Admin.Roles.fragment.aside')
               </div>
           </div>     
            <div class="col-sm-12">
            	
                <p><b> Nombre:</b>{{ $role->name }}</p>
                  
                <p><b>Nombre a mostrar:</b>
                    {{ $role->display_name }}
                </p>
                     <p><b>Descripción:</b>
                    {{ $role->description }}
                </p>               
            </div>
     </div>
</div>   
 
@endsection