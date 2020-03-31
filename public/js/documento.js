$(document).ready(function() {

    $('#detalle_cliente').DataTable();
    $('#venta_id').DataTable();
    $('#inventario_id').DataTable();
    $('#compra_id').DataTable();
    $('#tablaArticulo').DataTable();
    $('#proveedor_id').DataTable();
    $('#cliente_id1').DataTable();
    $('#abono_id').DataTable();
    $('#tableUsuario_id').DataTable();
    $('#tableRoles_id').DataTable();
    
    $("#departamento_id2").select2({
              placeholder:'Elige un departamento.',
              allowClear:true,
              });  

    $("#municipio_id2").select2({
              placeholder:'Elige un municipio.',
              allowClear:true,
              }); 

    $("#id_proveedores").select2({
              placeholder:'Elige un proveedor.',
              allowClear:true,
              });
    $("#codigo").select2({
              placeholder:'Elige un producto.',
              allowClear:true,
              });

    $("#cliente_id").select2({
              placeholder:'Elige un cliente.',
              allowClear:true,
              });   
    $("#cliente_idc").select2({
              placeholder:'Elige un cliente.',
              allowClear:true,
              });   
     $("#clientecredito_id").select2({
              placeholder:'Elige un cliente.',
              allowClear:true,
              });            

    $("#departamento_id").select2({
              placeholder:'Elige un departamento.',
              allowClear:true,
              });  

    $("#municipio_id").select2({
              placeholder:'Elige un municipio.',
              allowClear:true,
              });  

    
   
});
    $('#btn-venta').on('click', function() {
        if ($('#codigo').val() == '') {
            swal({
            title:  "Error!",
            text:   "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon:   "error",
            button: "Cerrar!",
            });
       
            return false;
        }

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == $('#codigo').val()) {
            swal({
            title:  "Error!",
            text:   "No se puede agregar el mismo codigo, a una misma Venta!.",
            icon:   "error",
            button: "Cerrar!",
            });
               
                return false;
            }
        }

        addRowSale();

    });

    $('#btn-compra').on('click', function() {
   
        if ($('#codigo').val() == '') {

            swal({
            title:  "Error!",
            text:   "Vuelve a intentarlo, recuerda llenar el campo de codigo, no puede estar vacio, vuelve a ingresarlo.",
            icon:   "error",
            button: "Cerrar!",
            });
       
            return false;
        }

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == $('#codigo').val()) {
            
            swal({
            title:  "Error!",
            text:   "No se puede agregar el mismo codigo.', 'Compra!.'",
            icon:   "error",
            button: "Cerrar!",
            });
                return false;
            }
        }

        addRowBuy();

    });


var listcodigo = new Array();

$('#tbn_create_sale').on('click', function() {


    var data = $('#formsale').serialize();
    var route= "venta";
    $.ajax({
    url:route,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
    type:'POST',
    dataType:'json',
    data:data,
    //data:{nombre:nombre,nuip:nuip,telefono:telefono,direccion:direccion,correoelectronico:correoelectronico,observacion:observacion},
    success:function(data){
        alert()
      if (data.code === 200) {

      //  window.open("http://" + window.location.host + "venta/create");
        swal({
          title:  "Exitosamente!",
          text:   "La venta se realizo exitosamente.!",
          icon:   "success",
          button: "Cerrar!",
        });
       
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#correoelectronico').val('');
              //$('#').val(el.primer_apellido);
            $('#cliente_id').val('');


       }
           if (data.code === 600) {

                  swal({
                      title: "Error!",
                      text: "No se puedo guardar.!",
                      icon: "success",
                      button: "Cerrar!",
                    });

                    return false;
            }
    }
});
    });





/*************    Adicionar filas de venta    ************/
function addRowSale() {
    if ($('#id_modopago').val() === '') {
           swal({
                        title:  "Aviso!",
                        text:   "Antes de agregar un producto debes selecionar el modo de pago.",
                        icon:   "info",
                        button: "Cerrar!",
            });
           return false;

    }

    $.ajax({
        url: $('#url_traerproducto').val() + '/' + $('#codigo').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            console.log(data);
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr id="fila' + el.id + '" style="font-size:15px">\n\
                    <td align="center"><input readonly="readonly" style="border:none;width:80px;text-align:center"  type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td align="center"><input min="1" required style="width:50px;border:none;text-align:center"  type="number" id="cantidad' + el.id + '" name="cantidad[]" onkeyup="totalizar(' + el.id + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td align="center"><input style="border:none;width:120px;text-align:center" readonly="readonly"   type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:30px;border:none;text-align:center" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:50px;border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td align="center"><input readonly="readonly"  style="width:15px;border:none;text-align:center" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td align="center"><input readonly="readonly" style="width:50px;border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
                    <td style="text-align:center"><a style="text-align:center;width:20px;" id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-venta tbody').append(row);
                    var c = parseInt($('#venta').val()) + 1;
                    $('#venta').val(c);
                    $('#totalVenta').val(parseFloat($('#totalVenta').val()) + total);
                    listcodigo.push($('#codigo').val());
                    
                    swal({
                        title:  "Tener en cuenta",
                        text:   "Solo se puede modificar el campo de cantidad.",
                        icon:   "success",
                        button: "Cerrar!",
                     });
                    });

            } else {
                if (data.code === 600) {
                     swal({
                        title:  "Aviso!",
                        text:   "El codigo ingresado no consiste con los existentes",
                        icon:   "info",
                        button: "Cerrar!",
                     });
                } 

            }
        },
        error: function() {

             swal({
                    title:  "Error!",
                    text:   "Algo salio mal, vuelve a intentarlo",
                    icon:   "error",
                    button: "Cerrar!",
                    });
        }
    });

    
  
  

}

/*************    Adicionar filas de compra    ************/

function addRowBuy() {

    $.ajax({
        url: $('#url_traerproducto').val() + '/' + $('#codigo').val(),
        dataType: 'json',
        type: 'GET',
        success: function(data) {
            if (data.code === 200) {
                $(data.datos).each(function(index, el) {
                    var totaIva = parseFloat(el.precioventa) * parseFloat(el.iva) / 100;
                    var total = parseFloat(el.precioventa) + totaIva;
                    var row = '<tr class="col-sm-12" id="fila' + el.id + '">\n\
                    <td ><input readonly="readonly" style="border:none;text-align:center" readonly="readonly" type="text" id="codigo' + el.id + '" name="codigo[]" value="' + el.codigo + '"></td>\n\
                    <td ><input readonly="readonly" style="border:none;text-align:center" readonly="readonly" type="text" id="nombre' + el.id + '" name="nombre[]" value="' + el.nombre + '"></td>\n\
                    <td ><input style="border:none;text-align:center" type="number" id="cantidad' + el.id + '" min="1" pattern="^[0-9]+" name="cantidad[]" name="cantidad[]" onkeyup="totalizarCompra(' + el.id + ');isNumberKey(event); this.value=Numeros(this.value)" value="1"></td>\n\
                    <td ><input style="border:none;text-align:center" readonly="readonly" type="text" id="precio_u' + el.id + '" name="precio_u[]" value="' + el.precioventa + '"></td>\n\
                    <td ><input readonly="readonly"  style="border:none;text-align:center" type="text" id="sub_t' + el.id + '" name="sub_t[]" value="' + el.precioventa + '"></td>\n\
                    <td ><input readonly="readonly" style="border:none;text-align:center" readonly="readonly"style="width:30px" type="text" id="iva' + el.id + '" name="iva[]" value="' + el.iva + '"></td>\n\
                    <td ><input readonly="readonly" style="border:none;text-align:center" type="text" step="0.01" id="total' + el.id + '" name="total[]" value="' + total + '"></td>\n\
                    <td ><a id="btn-borrar' + el.id + '" class="btn btn-danger btn-xs" onclick="deleteRow(' + el.id + ')" ><i class="fa fa-trash" ></i></a></td>\n\
                    </tr>';

                    $('#tbl-compra tbody').append(row);
                    var c = parseInt($('#compra').val()) + 1;
                    $('#compra').val(c);
                    $('#totalCompra').val(parseFloat($('#totalCompra').val()) + total);
                    listcodigo.push($('#codigo').val());
                    
                    swal({
                        title:  "Tener en cuenta.!",
                        text:   "Solo se puede modificar el campo de Cantidad",
                        icon:   "success",
                        button: "Cerrar!",
                     });

                });

            } else {
                if (data.code === 600) {
                    swal({
                    title:  "Aviso!",
                    text:   "El codigo ingresado no consiste con los existentes",
                    icon:   "info",
                    button: "Cerrar!",
                     });
                }

            }
        },
        error: function() {
                  swal({
                    title:  "Error!",
                    text:   "Algo salio mal, vuelve a intentarlo",
                    icon:   "error",
                    button: "Cerrar!",
                    });
          
        }
    });

}


/************ Totaliza todos los valores de la fila agregada ************/
function totalizar(id) {

    var cantidad = $('#cantidad' + id).val();

    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio).toFixed(2) * parseFloat(cantidad).toFixed(2);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val()).toFixed(2)) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalVenta = 0;
        var fila = $("#tbl-venta > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalVenta += parseInt($(idfila).val());

        });
        $('#totalVenta').val(totalVenta);
    } else {
        $('#sub_t' + id).val(0);
        $('#total' + id).val(0);
    }


}

function totalizarCompra(id) {

    var cantidad = $('#cantidad' + id).val();
    if (cantidad != '') {

        var precio = $('#precio_u' + id).val();

        var subtotal = parseFloat(precio) * parseFloat(cantidad);
        $('#sub_t' + id).val(subtotal);

        var totalIva = (subtotal * parseFloat($('#iva' + id).val())) / 100;
        var total = subtotal + totalIva;
        $('#total' + id).val(total);


        var totalCompra = 0;
        var fila = $("#tbl-compra > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total");
            totalCompra += parseInt($(idfila).val());

        });
        $('#totalCompra').val(totalCompra);
    } else {
        $('#sub_t' + id).val(0);
        $('#total' + id).val(0);
    }

}
/*--------- Eliminar fila por medio del id-------------*/
function deleteRow(id, e) {

    if ($('#fila' + id).remove()) {
        file = $('#venta').val() - 1;
        filec = $('#compra').val() - 1;
        $('#venta').val(file)
        $('#compra').val(filec)
        $('#codigo').val('');
        var totalVenta = 0;
        var fila = $("#tbl-venta > tbody > tr").each(function(index, element) {
            var idfila = element.id.replace("fila", "#total"); /*Debe ser este*/
            totalVenta = parseInt($(idfila).val());

        });
        $('#totalVenta').val(totalVenta);

        listcodigo.pop();

        if (isNaN(totalVenta)) {
            $('#totalVenta').val(0);
        } else {
            $('#totalVenta').val(e);

        }

          swal({
                    title: "Exito!",
                    text: "Se ha eliminado correctamente, !El producto.",
                    icon: "info",
                    button: "Cerrar!",
                });

        $('#totalVenta').val(totalVenta);

        for (i = 0; i < listcodigo.length; i++) {
            if (listcodigo[i] == id) {

                listcodigo.splice(i);
                return false;

            }
        }
    }
}


/************   Cuando se vaya a guarda primero se consulta que el contador sea mayor a cero si no es asi,
                                 se envia un mersaje y se cancela el guardado ************/
$('#btn_create_sale').on("click", function() {

    if ($('#venta').val() < 1) {
            swal({
                    title:  "Tener en cuenta!",
                    text:   "No se pueden guardar ventas sin productos",
                    icon:   "info",
                    button: "Cerrar!",
                 });

        return false;

    }
   
});



$('#enviarCompra').on("click", function() {
    if ($('#compra').val() < 1) {
           swal({
                    title:  "Tener en cuenta!",
                    text:   "No se pueden guardar compras sin productos",
                    icon:   "info",
                    button: "Cerrar!",
                     });
         return false;
    }

    /*
       swal({     
            title: "Exito!",
            text: "La compra se guardado, Exitosamente",
            icon: "success",
            button: "Cerrar!",
            });
    */        
});

// function fechavencimiento() {

//     if ($('#fecha').val() == $('#fechavencimiento').val()) {
//         $("#tr").css({ 'background': 'yellow' });
//         // toastr.warning('El articulo (medicamento)', '!Debe ser retirado.')
//     }
// }

// Crear un proveedor

$("#btn-registroProveedor").on("click",function(e){

    e.preventDefault();

    var nit = $('#nit').val();
    var nombreproveedor= $('#nombreproveedor').val();
    var nombrerepresentante = $('#nombrerepresentante').val();
    var direccion =$('#direccion').val();
    var telefono =$('#telefono').val();
    var email= $('#email').val();
    var observacion =$('#observacion').val();

    if(nit ==='' || nombreproveedor === '' 
         || nombrerepresentante ==='' || direccion ==='' || telefono ===''){

        swal({
          title: "Error",
          text: "Algunos campos estan vacios.!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        });
             return false;

    }

    var route= "proveedor";
    var token=$("#token").val();
    $.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN':token},
    type:'POST',
    dataType:'json',
    data:{nit:nit,nombreproveedor:nombreproveedor,nombrerepresentante:nombrerepresentante
    ,direccion:direccion,telefono:telefono,email:email,observacion:observacion},
    success:function(data){
          $.each(data.errors, function(key, value){
                          
                                $('.alert-danger').show();
                                $('.alert-danger').append('<p>'+value+'</p>');
            });
      if (data.code === 200) {
        listarProveedores();
        $('#exampleModal').modal('hide');
        swal({
          title: "Exitosamente!",
          text: "Se ha guardado el proveedor.!",
          icon: "success",
          button: "Cerrar!",
        });
       
           $('#nit').val('');
           $('#nombreproveedor').val('');
           $('#nombrerepresentante').val('');
           $('#direccion').val('');
           $('#telefono').val('');
           $('#email').val('');
           $('#observacion').val('');
          
       }
           if (data.code === 500) {

                    $.each(data.errors, function(key, value){
                          
                                $('.alert-danger').show();
                                $('.alert-danger').append('<p>'+value+'</p>');
                      });

                    return false;
            }

    }
    
  });

});

function listarProveedores() {
        var route= "proveedores";
        var datos = $('#id_proveedor');

         $.get(route,function(response){
            $(response).each(function(key, value){
         
                datos.append(
                    "<tr>\n\
                    <td align='center'>"+value.nit+" </td>\n\
                    <td align='center'>"+value.nombreproveedor+" </td>\n\
                    <td align='center'>"+value.nombrerepresentante+"</td> \n\
                    <td align='center'>"+value.direccion+" </td> \n\
                    <td align='center'>"+value.telefono+" </td>\n\
                    <td align='center'>"+value.email+" </td>\n\
                    <td align='center'>"+value.observacion+" </td>\n\
                    <td ><a class='btn btn-sm btn-default' id='btn-verProveedor'><i class='fa fa-eye' aria-hidden='true'></i></a></td>\n\
                    <td ><button class='btn btn-sm btn-primary' id='actualizarProveedor' ><i  class='far fa-edit' aria-hidden='true'></i></button></td>\n\
                    <td ><a class='btn btn-sm btn-danger'  id='btn-eliminarProveedor'><i class='fas fa-trash' aria-hidden='true'></i></a></td>\n\
                    </tr>"
     
                    );
            });

         });
} 

//------------------------ENVIAR CLIENTE------------------------------//

$('#enviarCliente').on("click",function(e){
    e.preventDefault();
    var data = $('#formsaleclient').serialize();
    var route= "cliente";
    var token=$("#token").val();
    $.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN':token},
    type:'POST',
    dataType:'json',
    data:data,
    //data:{nombre:nombre,nuip:nuip,telefono:telefono,direccion:direccion,correoelectronico:correoelectronico,observacion:observacion},
    success:function(data){

      if (data.code === 200) {
      //  window.open("http://" + window.location.host + "venta/create");
        aler()
        swal({
          title: "Exitosamente!",
          text: "Se ha guardado el cliente.!",
          icon: "success",
          button: "Cerrar!",
        });
       
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#correoelectronico').val('');
              //$('#').val(el.primer_apellido);
            $('#cliente_id').val('');


       }
           if (data.code === 600) {

                  swal({
                      title: "Error!",
                      text: "No se puedo guardar.!",
                      icon: "success",
                      button: "Cerrar!",
                    });

                    return false;
            }
    }
});
    });


$('#editarCliente').on("click",function(e){
    e.preventDefault();
    var data = $('#formsaleclient').serialize();
    var route= 'cliente/' + $('#cliente_id').val();

    $.ajax({
    url:route,
    type:'POST',
    dataType:'json',
    data:data,
    //data:{nombre:nombre,nuip:nuip,telefono:telefono,direccion:direccion,correoelectronico:correoelectronico,observacion:observacion},
    success:function(data){
        alert();
        return 0;
      if (data.code === 200) {
      //  window.open("http://" + window.location.host + "venta/create");
        aler()
        swal({
          title: "Exitosamente!",
          text: "Se ha guardado el cliente.!",
          icon: "success",
          button: "Cerrar!",
        });
       
            $('#primer_nombre').val('');
            $('#segundo_nombre').val('');
            $('#primer_apellido').val('');
            $('#segundo_apellido').val('');
            $('#correoelectronico').val('');
              //$('#').val(el.primer_apellido);
            $('#cliente_id').val('');


       }
           if (data.code === 600) {

                  swal({
                      title: "Error!",
                      text: "No se puedo guardar.!",
                      icon: "success",
                      button: "Cerrar!",
                    });

                    return false;
            }
    }
});
    });

$('#id_modopago').on("click",function(e){

     var cadena = $("#id_modopago").val();
     console.log(cadena)

     if (cadena == 'Credito') {

            swal({ 
                    title:  "Tener en cuenta!",
                    text:   "Recuerde primero agregar los productos al credito.!",
                    icon:   "info",
                    button: "Cerrar!",
            });


        $("#id_creditocontado").css("display",'block');
     }
     else if(cadena == 'Contado') {
     
        
        $('#id_creditocontado').css("display",'none');
    }

    else{
            $('#id_creditocontado').css("display",'none');
    }

});

function valorCuotas() {
     var totalv= $('#totalVenta').val();
     var cuota = $('#cuotas').val();
     valorCuota = totalv / cuota;
     var resultado = Math.round(valorCuota*100)/100;
     $('#valor_de_cuota').val(parseFloat(resultado));
}


function valorActual() {
     var totalv= $('#valor_credito').val();
     var cuota = $('#valor_abono').val();
     valorCuota = totalv - cuota;
     var resultado = Math.round(valorCuota*100)/100;
     $('#saldo_actual').val(parseFloat(resultado));
     $('#observacion').val('Abono');

     if(totalv ==cuota){
             $('#observacion').val('Cancelado');

     }

}


$(document).ready(function() {
    
     $('#id_creditocontado').css('display', 'none'); 
     $('#fecha_nuevoCobro').css('display', 'none'); 
     var totalCredito = $('#total_credito').val();
     $('#valor_credito').val(totalCredito);
  
     
      
});

var cuo = $('#cuotas_atrasadas').val();

function observacion_credito() {
   
    var observacion=$('#observacion').val(); 
   
 
    if ((observacion ==='No abono')|| (observacion ==='Aplazada')) {
        
                 
        if (observacion ==='No abono') {

            o= parseInt($('#observacion1').val());
            if (o==1) {
              return false;
            }else{

                var c=parseInt($('#cuotas_atrasadas').val());
                var ca= c+1;
                var obA= $('#cuotas_atrasadas').val(ca);
                $('#fecha_nuevoCobro').show(); 
                $('#observacion1').val(1);
            }
             
        }
        if (observacion ==='Aplazada') {

            op= parseInt($('#observacion1').val());
            if (op==1) {
              return false;
            }else{
                var cat= parseInt(cuo) +1;
                var obA= $('#cuotas_atrasadas').val(cat);
                $('#fecha_nuevoCobro').show();
                $('#observacion1').val(1); 
            }
          
        }
    
        $('#fecha_nuevoCobro').show(); 
        $('#valor_abono').val(0);

        var totalv= $('#valor_credito').val();
        $('#saldo_actual').val(totalv);
       
    }
    if (observacion ==='Abono') {
        var abono =$('#valor_abono').val();
        if (abono == 0) {

           swal({ 
                    title: "Error!",
                    text: "Recuerde llenar el cambo de valor abono.!",
                    icon: "warning",
                    button: "Cerrar!",
                });

            $('#observacion').val('');
            $('#observacion1').val(0);
                    return false;

        }
   
        parseInt($('#cuotas_atrasadas').val($('#cuotas_atrasadas').val()));
        $('#observacion1').val(0); 
        $('#fecha_nuevoCobro').hide(); 

    }if (observacion ==='Cancelado') {
         var ca= $('#cuotas_atrasadas').val();
     
        if (ca>cuo) {
          
                var oper = ca-1;
                $('#cuotas_atrasadas').val(parseInt(oper));
        }else{

          parseInt($('#cuotas_atrasadas').val(cuo));
        }              

        var totalv= $('#valor_credito').val();
        $('#valor_abono').val(totalv);
        $('#saldo_actual').val(0);
        $('#fecha_nuevoCobro').hide(); 
    
        $('#observacion1').val(0); 
        
    }

      
 
}

// Busqueda de cliente.

$('#btn-seach').on('click', function() {
       var ext =$('#url_clientseach').val();
       var doc_number = $('#nuipClient').val();
       var url = ext +'/'+doc_number ;
       $.ajax({
       url:url, 
       dataType: 'json',
       type: 'GET',
       success: function(data) {
            if(data.code === 200){
              $(data.datos).each(function(index, el) {
    
              $('#primer_nombre').val(el.primer_nombre);
              $('#segundo_nombre').val(el.segundo_nombre);
              $('#primer_apellido').val(el.primer_apellido);
              $('#segundo_apellido').val(el.segundo_apellido);
              $('#correoelectronico').val(el.correoelectronico);
              //$('#').val(el.primer_apellido);
              $('#cliente_id').val(el.id);


               });

               swal({
                 
                    title: "Éxito.",
                    text:  "Se han cargado datos del cliente exitosamente.",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
              
                }); 

            }
            if (data.code === 600) {
                 swal({ 
                    title: "Advertencia.",
                    text:  "El documento de identidad ingresado no conside con ninguno de los clientes registrado.",
                    icon:  "info",   
                    dangerMode: true,

        
              
                });  
                    return false;
            }


                 
       }

});

});

    
// Busqueda del credito

$('#btn-seachcredito').on('click', function() {
       var ext =$('#url_traercredito').val();
       var doc_number = $('#cliente_idc').val();
       var url = ext +'/'+doc_number ;
       var div = $('#tbl-credito tbody');
       $.ajax({
       url:url, 
       dataType: 'json',
       type: 'GET',
       success: function(data) {
            if(data.code === 200){
              $(data.datoscredito_cliente).each(function(index, el) {
                
                $('#id_abono').css('display','block')
                $('#cuotas_restantes').val(el.cuotas_restantes); 
                $('#saldo_actual').val(el.saldo_actual);


               });

               swal({
                 
                    title: "Éxito.",
                    text:  "Se han cargado datos del cliente exitosamente.",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
              
                }); 
            
            $(data.datoscredito).each(function(index, el) {
    
                $('#total_credito').val(el.total_credito); 
                $('#valor_de_cuota').val(el.valor_de_cuota);
                $('#cantidad_de_cuotas').val(el.cantidad_de_cuotas);


               });

               swal({
                 
                    title: "Éxito.",
                    text:  "Se han cargado datos del cliente exitosamente.",
                    icon: "success",
                    buttons: false,
                    timer: 3000,
              
                }); 

                }
            
            if (data.code === 600) {
                 swal({ 
                    title: "Advertencia.",
                    text:  "El documento de identidad ingresado no conside con ninguno de los clientes registrado.",
                    icon:  "info",   
                    dangerMode: true,
                });  
                    return false;
            }


                 
       }

});

});

    
function cuota_Restante(){

    var cuota_actual = $('#cantidad_de_cuotas').val();
    var cuota_numero = $('#cuota_numero').val();
    var cuotas_restantes = cuota_actual - cuota_numero;

        if (cuotas_restantes < 0 || cuotas_restantes > cuota_actual) {

            swal({ 
                    title: "Tener en cuenta.",
                    text:  "El campo cuota numero, debe ser menor que la cantidad de cuotas establecidas.",
                    icon:  "info",   
                    dangerMode: true,
            });     
                $('#cuota_numero').val(''); 
                $('#cuotas_restantes').val(cuota_actual);
                return false;
        }
       
             $('#cuotas_restantes').val(cuotas_restantes);

        
}

function saldo_Actual() {
    
    var total_credito = $('#total_credito').val();
    var saldo_actual =  $('#saldo_actual').val();
    var valor_abono  =  $('#valor_abono').val();
    var saldo_pendiente = total_credito - valor_abono;

     if (saldo_pendiente <  0 || saldo_pendiente > total_credito) {
           
            swal({ 
                    title: "Tener en cuenta.",
                    text:  "El campo cuota numero, debe ser menor que la cantidad de cuotas establecidas.",
                    icon:  "info",   
                    dangerMode: true,
            });     
                
                $('#saldo_actual').val(total_credito);
                $('#valor_abono').val('');
                return false;

        
     }
     var sa=  saldo_actual - valor_abono
     $('#saldo_actual').val(sa);


}

