@extends('layouts.apphome')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Id del permiso: {{ $permission->namep }}</b>
      
                       <a href="{{ route('Permission_roles.edit', $permission_role->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>           
        </h2>
     
                     <a href="{{ route('Permission_roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
             
        <p><b> Id del rol:</b>
            {{ $role->name }}
          
    </div>
    
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>
@endsection