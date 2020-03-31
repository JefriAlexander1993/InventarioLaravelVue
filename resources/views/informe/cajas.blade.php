<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 

<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <img class="" src="../public/ic/logo.png" alt="" data-src="/ic/logo.png" style="width:90px;margin-top:21px;">
        <title>INFORME DE CAJAS</title>
        <img  src="../public/ic/logo.png"  style="width:150px;margin-top:21px;">    
        <?php  $fecha=date("j/n/Y");?>

        <p><h1 align="center">SISTEMA DE CONTROL J & D.</h1>
        <strong>DROGUERIA EL TRIUNFO.</strong>

        <br>
        <strong>Fecha de realizacion del reporte:</strong> <?php echo $fecha;?>
        <br>
        <strong>Usuario:</strong> {{ Auth::user()->name }}</p>
       
        <meta name="description" content="">
        <style type="text/css">

		table{

			width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            align:center;

		}

		td, th{
          
		border:1px solid black;
          
		}

	</style>
    </head>
    <body>
      <h3 align="center"stye="width:80%"><strong>INFORME DE CAJAS.</strong></h3>
      <div class="container" style="text-align:center">
      <table class="table table-hover">
    <thead>
        <tr>
        <th align="center">Id</th>
        <th align="center">Nombre usuario</th>
        <th align="center">Caja inicial</th>
        <th align="center">Caja final</th>
        <th align="center">Ganancia</th>
        </tr>
        </thead>
    <tbody>
        @foreach ($cajas1 as $key => $caja)
       <tr>
       <td align="center">{{$caja->id}}</td>
       <td align="center">{{$caja->nombreUsuario}}</td>
       <td align="center">{{$caja->valorInicial}}</td>
       <td align="center">{{$caja->valorFinal}}</td>
       <td align="center">{{$caja->ganancia}}</td>
     
       </tr>
       @endforeach
        </tbody>
</table>
</div>
    
    </body>
</html>