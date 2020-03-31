<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->


 <html class="no-js"> <!--<![endif]-->
    <head >
          <title>FACTURA</title>
    </head>
        <body>
    <style>
   @page { size: 58mm {{ $height }}pt; margin:0px;border:0.2px solid}
   table {
        font-size: 9px;
   }
   p {
       margin: 0px;
       font-size: 10px;
   }
  </style>
<center>
<!-- <img class="" src="../public/ic/logo.png" alt="" data-src="/ic/logo.png" alt="" witdh="80" height="80"> -->
        <?php  $fecha=date("j/n/Y");?>
<br>
<p align="center"><strong>Fecha:&nbsp;</strong><?php echo $fecha;?> </p> 
<p align="center"><strong>Vendedor:&nbsp;</strong>{{ Auth::user()->name }}</p>
<p align="center"><strong>Dirección:&nbsp;</strong> Calle 26 #7a-42</p>

<br>
<table align="center">
        <thead>
        
            <tr>
          
                <th  align="center"><strong>Cod</strong></th>
                <th  align="center"><strong>Nombre</strong></th>
                <th  align="center"><strong>Cant</strong></th>
                <th  align="center"><strong>Iva</strong></th>
                <th  align="center"><strong>Precio</strong></th>
                <th  align="center"><strong>Total</strong></th>
              
            </tr>
        </thead>
        <tbody>
	@foreach ($venta_articulos as $venta_articulo)   
<tr>
   
    <td align="center">
        {{$venta_articulo->codigo}}  
    </td>

    <td align="center">
        {{$venta_articulo->nombre}}
    </td>

    <td align="center">
        {{$venta_articulo->cantidad}}
    </td>
    <td alig="center">
        {{$venta_articulo->iva}}  
    </td>
    <td align="center">
        {{$venta_articulo->preciounitario}}
    </td>
    <td align="center">
        {{$venta_articulo->total}}
    </td>
  
</tr>
<tr>
            <td colspan="3">-------------------------------------------------------------------------</td>
            </tr>
@endforeach

<tr>
<td colspan="7" align="right">
  <strong>TOTAL NETO:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>{{$venta}}
</td>
</tr>

	</tbody>
    </body>
</html>