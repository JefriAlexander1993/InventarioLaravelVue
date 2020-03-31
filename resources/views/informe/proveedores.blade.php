<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 

<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <img  src="../public/ic/logo.png"  style="width:150px;margin-top:21px;">
        <title>INFORME DE CAJAS</title>
        
    
        <?php  $fecha=date("j/n/Y");?>
        <p><h1 align="center">SISTEMA DE CONTROL J & D</h1>
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
      <h3 align="center"stye="width:80%"><strong>INFORME DE PROVEEDORES.</strong></h3>
      <div class="container" style="text-align:center">
      <table class="table table-hover">
      <thead>
		<tr>
		<th align="center">Id</th>
		<th align="center">Nit</th>
		<th align="center">Nombre de proveedor</th>
		<th align="center">Nombre de representante</th>
		<th align="center">Dirección</th>
		<th align="center">Telefono</th>
		<th align="center">Email</th>
		<th align="center">Observación</th>   
		</tr>
	</thead>
	<tbody>
		@foreach ($proveedores1 as $key => $proveedors)
	   <tr>
       <td align="center">{{$proveedors->id}}</td>
	   <td align="center">{{$proveedors->nit}}</td>
       <td align="center">{{$proveedors->nombreproveedor}}</td>
       <td align="center">{{$proveedors->nombrerepresentante}}</td>
       <td align="center">{{$proveedors->direccion}}</td>
       <td align="center">{{$proveedors->telefono}}</td>
       <td align="center">{{$proveedors->email}}</td>
       <td class="text-justify">{{$proveedors->observacion}}</td>
       </tr>
       @endforeach
        </tbody>
</table>
    </body>
</html>