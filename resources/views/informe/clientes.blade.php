<<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
                
        <title>INFORME DE CLIENTES</title>
        <img class="" src="../public/ic/logo.png" alt="" data-src="/ic/logo.png" style="width:90px;margin-top:21px;">

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

			width:100%;
            border-collapse: collapse;
            margin: 0 auto;
            align:center;

		}

		td, th{
          
		border:1px solid black;
          
		}

	</style>
    </head>
    <br>
    <body>
<br>    
    <table class="table table-hover ">
	<thead>
		<tr>
		<th align="center">Nuip</th>
		<th align="center">Nombre</th>
		<th align="center">Telefono</th>
		<th align="center">Direccion</th>
		<th align="center">Correo Electronico</th>
		<th align="center">Observacion</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($clientes1 as $cliente)
	   <tr>
	   <td align="center">{{$cliente->nuip}}</td>
	   <td align="center">{{$cliente->nombre}}</td>
	   <td align="center">{{$cliente->telefono}}</td>
       <td align="center">{{$cliente->direccion}}</td>
       <td align="center">{{$cliente->correoelectronico}}</td>
       <td align="center">{{$cliente->observacion}}</td>
       
	  
	   </tr>
@endforeach
	</tbody>
</table>
    </body>
</html>