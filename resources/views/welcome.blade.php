<!doctype html>
<html lang="{{ app()->getLocale() }}">



    <head>


        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>Sistema de control J & D</title>



        <!-- <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       </head>
    <body background="/ic/logo.png">

 
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/inventario') }}"><strong>SISTEMA DE CONTROL J & D</strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
            <div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <li class="active"> <a href="{{ url('/inventario') }}">PAGINA PRINCIPAL<span class="sr-only">(current)</span></a> </li>                
                    @else
                    <li class="active">  <a href="{{ route('login') }}" >LOGIN<span class="sr-only">(current)</span></a> </li>
                    <li class="active">  <a href="{{ url('/register') }}">REGISTRO<span class="sr-only">(current)</span></a></li> 
               
                    @endauth
                </div>
            @endif

          </div>
          </div>
             </li>
          </ul>
        </div>

       </div>
    </nav> 

<br>
<br>
<br>

<div class="row"> 
<div class="col-sm-12">
<div class="navbar" >

</div>
</div>
</div>


<div class="row"> 
<div class="col-sm-6">
<div class="navbar" >
<h2 style="color:darkseagreen;align:center"><strong><u>Misión</u></strong></h2>
<p ALIGN="justify">Droguería el Triunfo es una empresa de régimen simplificado,
que tiene como objetivo suministrar y ofrecer soluciones para las 
necesidades de nuestros clientes. Contribuyendo a la calidad de
vida de las personas; entregando servicios de salud y de bienestar 
en ambientes de amabilidad y respecto, satisfaciendo los requerimientos
de nuestra clientela y proveedores mediante la comercialización
de medicamentos populares, garantizando la calidad, eficacia y competitividad.</p></font>
</div>
</div>

<div class="col-sm-6">
<div class="navbar" >
<h2 style="color:darkseagreen"><strong><u>Visión</u></strong></h2>
<p ALIGN="justify" >La Droguería el Triunfo será una organización de continuo crecimiento para la
satisfacción de nuestros clientes; logrando así un reconcomiendo por el buen servicio, a
nivel municipal por trabajar con responsabilidad hacia nuestra comunidad, colaboradores,
clientes y proveedores, siendo innovadora, efectiva, competitiva, líder en sector.</p>
</div>
</div>
</div>

          <!-- <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>
   -->
   <div id="footer">
      <div class="container" style=" position:fixed;
   left:0px;
   bottom:0px;
   height:55px;
   width:100%;
   background:darkseagreen">


        <p class="text-center"><strong>Correo electrónico:</strong>frelan2211@gmail.com<br>
        <strong>Dirección:</strong> Calle 26 #7a-42.</p>



      </div>
    </div>
    </body>
</html>