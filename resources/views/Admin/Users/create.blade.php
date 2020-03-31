@extends('layouts.apphome')

@section('content')
<nav aria-label="breadcrumb" style="margin-left:1040px;margin-top:-20px;margin-bottom:-20px">
          <ol class="breadcrumb" style="background-color:#fff;">
            <li class="breadcrumb-item" ><a href="#">Escritorio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Users.index')}}">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
          </ol>
</nav>
<div class="card  col-sm-12" >    
        <div class="card-body t">
           <div class="row">
               <div class="col-sm-6">
                    <h4><strong> CREAR USUARIOS.</strong>
                       <a class="btn btn-xs btn-success pull-right" href="{{ route('Users.index')}}" title="Listar usuarios">
                        <i class="fa fa-plus-square">
                        </i>
                      </a>
                    <!--    <a class="btn btn-xs btn-success pull-right" href="{{url('/usersExcel')}}" target="_blank" title="Generar excel">
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
                {!! Form::open(['url' => 'Users/register']) !!}

                @include('Admin.Users.fragment.form')

                {!! Form::close() !!}
         </div>
</div>     

@endsection
