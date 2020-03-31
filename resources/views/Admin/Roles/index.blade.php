@extends('layouts.apphome')

@section('content')
<div class="card  col-sm-12" >    
    <div class="card-header bg-transparent "><strong>Escritorio/Roles</strong></div>
        <div class="card-body t">
           <div class="row">
               <div class="col-sm-6">
                    <h4><strong> LISTADO ROLES.</strong>
                       <a class="btn btn-success pull-right" href="{{ route('Roles.create')}}" title="Agregar producto">
                            <i class="fa fa-plus-square"></i>
                        </a>
        
                    </h4>
               </div>
               <div class="col-sm-6">
                @include('Admin.Roles.fragment.aside')
               </div>
           </div> 
        <div class="col-sm-12 table-responsive-sm" >        
            <table class="table table-hover" id="tableRoles_id">
                <thead>
                    <tr>
                        <th class="text-center">
                            Nombre
                        </th>
                        <th class="text-center">
                            Nombre a mostrar
                        </th>
                        <th class="text-center">
                            Descripción
                        </th>
                        <th class="text-center">
                            Ver
                        </th>
                        <th class="text-center">
                            Editar
                        </th>
                        <th class="text-center">
                            Eliminar
                        </th>
                    </tr>
                </thead>
                @foreach($roles as $role)
                <tbody>
                    <tr>
                        <td align="center">
                            {{ $role->name }}
                        </td>
                        <td align="center">
                            {{ $role->display_name }}
                        </td>
                        <td align="center">
                            {{ $role->description}}
                        </td>
                        <td align="center">
                            <a class="btn  btn-light btn-xs" href="{{ route('Roles.show', $role->id)}}" title="Ver rol">
                                <i class="fa fa-eye">
                                </i>
                            </a>
                        </td>
                        <td align="center">
                            <a class="btn btn btn-primary btn-xs" href="{{ route('Roles.edit', $role->id)}}" title="Editar rol">
                                <i class="fa fa-edit">
                                </i>
                            </a>
                        </td>
                        <td align="center">
                            <form action="{{ route('Roles.destroy', $role->id) }}" method="POST">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn btn-danger btn-xs " title="Eliminar permiso">
                                        <i aria-hidden="true" class="fa fa-trash-o">
                                        </i>
                                    </button>
                            </form>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>    
    </div>
</div>    
@endsection
