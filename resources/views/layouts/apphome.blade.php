<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<!-- <link rel="shortcut icon" src="{{asset('../../ic/medicina.ico')}}" ></link>
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
     <title>
    SISTEMA DE INFORMACIÓN 
    </title>

      <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
      <link rel="stylesheet" type="text/css" href="{{asset('css/select2.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('css/datatable/bootstrap.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/datatable/dataTables.bootstrap4.min.css')}}">
      
      <!--<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">-->

</head>
<body >
<div id="app">
  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="col-sm-10">
    <a class="navbar-brand" href="{{ url('/inventario') }}">
               <strong>SISTEMA DE CONTROL JM .</strong>
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </div>
  <div class="col-sm-2" >
  <div class="collapse navbar-collapse" id="navbarNavDropdown" >
    <ul class="navbar-nav">
   
       @guest
              @else
      <li class="nav-item dropdown"  >
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="far fa-user-circle" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }} <span class="caret"></span>
        </a>
         <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <li>
                        <a href="{{ route('perfil.show','1')}}" class="dropdown-item">
                         <i class="far fa-user-circle"></i>&nbsp;&nbsp;Perfil      
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                               <i class="fa fa-power-off" aria-hidden="true" ></i>&nbsp;&nbsp;Cerrar
                                        
                        </a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>

      </li>
    </ul>
  </div>
 </div>
</nav>

  <div class="card  col-sm-12" >
      <ul class="nav nav-pill-sard">
         <ul class="nav nav-pills nav-stacked">
          <li class="dropdown">
            <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#"><i class="far fa-list-alt"></i>&nbsp;Administración</a>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item "></a> </li>
              <li><a href="{{route('Users.index')}}" class="dropdown-item"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Usuarios</a> </li>
              <li><a href="{{route('Roles.index')}}" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Roles</a> </li>
              <li><a href="" class="dropdown-item "><i class="fa fa-hand-paper-o" aria-hidden="true"></i>&nbsp;Permisos</a></li>               
              <li><a href="" class="dropdown-item "><i class="fa fa-key" aria-hidden="true"></i>&nbsp;Cambiar contraseña</a></li>               
              <li><a href="#" class="dropdown-item "><i class="fa fa-clipboard" aria-hidden="true"></i>&nbsp;Backup</a></li>                
            </ul>
          </li>
          <li class="nav-item">
            <a id="inventario" onclick="return fechavencimiento()" href="{{route('inventario.index')}}" class="nav-link"><i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Inventario</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('compra.index')}}"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Compras</a>
          </li>
          <li class="nav-item">
            <a href="{{route('articulo.index')}}" class="nav-link" id="id_articulo"><i class="fa fa-medkit" aria-hidden="true"></i>&nbsp; Articulos</a>
          </li>
          <li class="nav-item">
         <a href="{{route('proveedor.index')}}" class="nav-link"><i class="fa fa-id-card-o " aria-hidden="true"></i>&nbsp;Proveedores</a>
          </li>
          <li class="nav-item">
            <a href="{{route('venta.index')}}" class="nav-link"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Ventas</a>
          </li>
          <li class="nav-item"> 
            <a href="{{route('cliente.index')}}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Clientes</a>
          </li>
          <li class="nav-item"> 
            <a href="{{route('credito.index')}}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Creditos</a>
          </li>
          <li class="nav-item"> 
            <a href="{{route('abono.index')}}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Abono</a>
          </li>
          @role('admin')
          <li class="nav-item"> 
            <a href="{{route('caja.index')}}" class="nav-link"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;Caja</a>
          </li>
          @endrole

      </ul>
    </ul>
</div>
  <div class="card-body col-sm-12">
    <div class="col-sm-12">
              @include('message.info')
              @include('message.error')
    </div> 
    @yield('content') 

  </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/select2.min.js') }}"></script>
<script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/datatable/dataTables.bootstrap4.min.js') }}"></script>

 <script src="{{ asset('js/sweetalert.min.js')}}"></script>
 <script src="{{ asset('js/documento.js') }}"></script>

    <!--  <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
</body>
</html>