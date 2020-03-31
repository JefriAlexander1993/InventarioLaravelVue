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
        <title>INFORME DE PRODUCTOS</title>
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
		<th align="center">Codigo</th>
		<th align="center">Fecha de llegada</th>
		<th align="center">Nombre</th>
		<th align="center">Rubio</th>
		<th align="center">Proveedor</th>
		<th align="center">Precio de unitario</th>
		<th align="center">Cant</th>
		<th align="center">Total de compra</th>
		<th align="center">Iva</th>
		<th align="center">Precio de Venta</th>
		<th align="center" >Fecha de vencimiento</th>
		<th align="center">Stock</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($productos1 as $producto)
	   <tr>
	   <td align="center">{{$producto->codigo}}</td>
	   <td align="center">{{$producto->fechaLlegada}}</td>
       <td align="center">{{$producto->nombre}}</td>
       <td align="center">{{$producto->rubio}}</td>
	   <td align="center">{{$producto->nombreProveedor}}</td>
       <td align="center">{{$producto->precioUnitario}}</td>
       <td align="center">{{$producto->cantidad}}</td>
       <td align="center">{{$producto->totalCompra}}</td>
       <td align="center">{{$producto->iva}}</td>
       <td align="center">{{$producto->precioVenta}}</td>
       <td align="center">{{$producto->fechaVencimiento}}</td>
	   <td align="center">{{$producto->stock}}</td>
	  
	   </tr>
@endforeach
	</tbody>
</table>
    </body>
</html>