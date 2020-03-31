@extends('layouts.apphome')

@section('content')
<nav aria-label="breadcrumb"  style="margin-left:1105px;;margin-top:-20px;margin-bottom:-20px" >
    <ol class="breadcrumb" style="background-color:#fff;">
	    <li class="breadcrumb-item" ><a href="#">Escritorio</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
    </ol>
</nav>
<div class="card  col-sm-12" >    
  		<div class="card-body t">
		   <div class="row">
			   <div class="col-sm-6">
			   		<h4><strong> LISTADO USUARIOS.</strong>
					   <a class="btn btn-xs btn-success pull-right" href="{{ route('Users.create')}}" title="Agregar usuarios">
			            <i class="fa fa-plus-square">
			            </i>
			      	  </a>
					<!--	<a class="btn btn-xs btn-success pull-right" href="{{url('/usersExcel')}}" target="_blank" title="Generar excel">
						    <i class="fa fa-file-excel-o">
						    </i>
						</a>
						<a class="btn btn-xs btn-danger pull-right" href="{{url('/usersPdf')}}" target="_blank" title="Generar pdf">
						    <i aria-hidden="true" class="fa fa-file-pdf-o">
						    </i>
						</a>-->
					</h4>
			   </div>
			   <div class="col-sm-6">
			    @include('Admin.Users.fragment.aside')
			   </div>
		   </div> 

			<div class="col-sm-12 table-responsive-sm" >			   
			    <table class="table table-hover" id="tableUsuario_id">
			    	<thead>
				        <tr>
				            <th class="text-center">
				                Id
				            </th>
				            <th class="text-center">
				                Nombre
				            </th>
				            <th class="text-center">
				                Email
				            </th>
				            <th class="text-center">
				                Fecha de creación
				            </th>
				            <th class="text-center" >
				                Ver
				            </th>
				             <th class="text-center" >
				                Editar
				            </th>
				             <th class="text-center" >
				                Eliminar
				            </th>
				        </tr>
			    	</thead>
			        @foreach($users as $user)
			        <tbody>
			        <tr>
			            <td class="text-center">
			                {{ $user->id }}
			            </td>
			            <td class="text-center">
			                {{ $user->name_user }}
			            </td> 
			            <td class="text-center">
			                {{ $user->email }}
			            </td>
			            <td class="text-center">
			                {{ $user->created_at}}
			            </td>
			            <td align="center">
			                <a class="btn btn-light btn-sm " href="{{ route('Users.show', $user->id)}}" title="Ver Usuario">
			                    <i class="fa fa-eye"></i>
			                </a>
			            </td>
			            <td align="center">
			                <a class="btn btn-primary btn-sm" href="{{ route('Users.edit', $user->id) }}">
			                    <i aria-hidden="true" class="fa fa-pencil-square-o " title="Editar usuario"></i>
			                </a>
			            </td>
			            <td align="center">
			                <form action="{{ route('Users.destroy', $user->id) }}" method="post">
			                    <input name="_method" type="hidden" value="DELETE">
			                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
			                            <button class="btn btn-danger btn-sm" title="Eliminar usuario" type="submit" >
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
