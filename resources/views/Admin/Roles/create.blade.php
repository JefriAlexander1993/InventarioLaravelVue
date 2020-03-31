@extends('layouts.apphome')

@section('content')
<nav aria-label="breadcrumb" style="margin-left:1040px;margin-top:-20px;margin-bottom:-20px">
          <ol class="breadcrumb" style="background-color:#fff;">
            <li class="breadcrumb-item" ><a href="#">Escritorio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{route('Roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
          </ol>
</nav>

<div class="card  col-sm-12" >    
       <div class="card-body t">
           <div class="row">
               <div class="col-sm-6">
                    <h4><strong>CREAR ROL.</strong>
                          <a class="btn btn-light pull-right" href="{{ route('Roles.index')}}" title="Listado de todos los roles.">
                                <i class="fa fa-list-ol">
                                </i>
                          </a>
                    </h4>
               </div>
               <div class="col-sm-6">
                @include('Admin.Roles.fragment.aside')
               </div>
           </div> 
                {!! Form::open(['route' => 'Roles.store']) !!}

                   @include('Admin.Roles.fragment.form')

                {!! Form::close() !!}
    </div>            
</div>

@endsection
