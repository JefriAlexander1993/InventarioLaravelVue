@extends('layouts.apphome')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de asignaciones de permisos a roles.
    		<a href="{{ route('Permission_roles.create')}}" class="btn btn-success pull-right" title="Agregar permiso asignado a rol"><i class="fa fa-plus-square"></i></a>
    	</h2>
			<table class="table table-hover" style="margin-top:8px">
			    <tr>
			        <th>Nombre del permiso</th>
			        <th>Nombre del rol</th>
			        <th colspan="3" class="text-center">Acción&nbsp;</th>

			    </tr>
			    @foreach($permission_roles1 as $permission_role)
			        <tr>
			            <td>{{ $permission_role->namep }}</th>
			         	<td>{{ $permission_role->name }}</th>
		
			            <td>
                			<a href="{{ route('Permission_roles.show', $permission_role->id)}}" class="btn btn-secundary btn-xs" title="Ver permiso asignado a rol"><i class="fa fa-eye"></i></a>
                		</td>
                		<td>
                	    <a href="{{ route('Permission_roles.edit', $permission_role->id)}}" class="btn btn btn-primary  btn-xs" title="Editar permiso asignado rol"><i class="fa fa-edit"></i></a>
                		</td>
			            <td >
			      			<form action="{{ route('Permission_roles.destroy', $permission_role->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger  btn-xs" title="Eliminar permiso  asignado a rol"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                			</form>
			            </td>
			        </tr>
			    @endforeach
			</table>
        <div class="text-center">
            {!! $permission_roles1->render() !!}
        </div>
    	
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>

@endsection


