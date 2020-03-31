<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoDrogueriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


/*-------------------------ARTICULOS-------------------------------*/   
     Schema::create('articulos', function (Blueprint $table) {    
         $table->increments('id')->unsigned();
         $table->string('codigo')->unique();
         $table->date('fechavencimiento')->nullable();
         $table->date('fechafabricacion')->nullable();
         $table->string('nombre')->unique();
         $table->integer('cantidad')->default(0);
         $table->float('iva')->default(0.0);
         $table->float('preciounitario')->default(0.0);  
         $table->float('precioventa')->default(0.0);  
         $table->integer('stockmin')->default(0);
         $table->timestamps();   

 });

    //----------------------Dirección--------------------------//
    Schema::create('direcciones', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->char('calle',50);
        $table->char('carrera',50);
        $table->char('numero_casa',50);
        $table->char('barrio',50);
        $table->timestamps();
    });


/*--------------------------PROVEEDORES------------------------------------*/

    Schema::create('proveedores', function (Blueprint $table) {
    
        $table->increments('id')->unsigned();
        $table->string('nit')->unique();
        $table->string('nombreproveedor')->unique();
        $table->string('nombrerepresentante');
        $table->string('email')->nullable();
        $table->text('observacion')->nullable();

        $table->unsignedInteger('direccion_id')->nullable();
        $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
        
       // $table->unsignedInteger('_id')->nullable();
       // $table->foreign('direccion_id')->references('id')->on('addresses')->onDelete('cascade');

        $table->timestamps();


    });

   
    /*--------------------------ARTICULO_PROVEEDOR------------------------------------*/


    Schema::create('articulo_proveedor', function (Blueprint $table) {
      
        $table->increments('id')->unsigned();
        $table->integer('articulo_id')->unsigned();
        $table->integer('proveedor_id')->unsigned();

        $table->foreign('articulo_id')->references('id')->on('articulos')
            ->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('proveedor_id')->references('id')->on('proveedores')
            ->onUpdate('cascade')->onDelete('cascade');

        // $table->primary(['articulo_id', 'proveedor_id']);
       
        $table->timestamps();

    });

    //------------------------Creditos---------------------/
    Schema::create('creditos', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->float('total_credito')->default('0.0')->unsigned();
        $table->char('modo_de_pago',50);
        $table->char('forma_de_pago',50);
        $table->float('valor_de_cuota')->default('0.0')->unsigned();
        $table->integer('cantidad_de_cuotas')->default('0')->unsigned();
        $table->text('observacion')->nullable();  

        $table->integer('users_id')->unsigned();
        $table->foreign('users_id')->references('id')->on('users');     
      
        $table->timestamps();
        
    });

    /*--------------------------CLIENTES----------------------------*/

    Schema::create('clientes', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->string('nuip')->unique();
        $table->char('primer_nombre',50);
        $table->char('segundo_nombre',50)->nullable();
        $table->char('primer_apellido',50);
        $table->char('segundo_apellido',50)->nullable();
        $table->string('correoelectronico',160)->nullable()->unique();
            
        $table->unsignedInteger('usuario_id')->nullable();
        $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        $table->unsignedInteger('direccion_id')->nullable();
        $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
   
        $table->timestamps();
        
    });

    //-----------------------Vendedora------------------//
    Schema::create('vendedores', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->string('nuip')->unique();
        $table->char('primer_nombre',50);
        $table->char('segundo_nombre',50);
        $table->char('primer_apellido',50);
        $table->char('segundo_apellido',50);
        $table->string('email')->unique();
       
        $table->unsignedInteger('usuario_id')->nullable();
        $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
       
       $table->unsignedInteger('direccion_id')->nullable();
        $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
        $table->timestamps();
    });
    
    //----------------------Tipos de teléfono-----------------//
    Schema::create('tipos_telefonos', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->char('nombre_tipo',50);
        $table->timestamps();
    });

        //----------------------------Abono------------------------//

    Schema::create('abonos', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->date('fecha_abono')->nullable();
        $table->float('valor_abono')->unsigned()->nullable();
        $table->integer('cuota_numero')->default('0')->unsigned()->nullable();
        $table->timestamps();
        
    });


     //------------------------Creditos---------------------/
    Schema::create('creditos_cliente', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->integer('saldo_actual')->default('0')->unsigned()->nullable();
        $table->integer('cuotas_restantes')->default('0')->unsigned()->nullable();
        $table->integer('cantidad')->default('0')->unsigned();
        $table->float('preciounitario')->default('0.0')->unsigned();
        $table->float('subtotal')->default('0.0')->unsigned();
        $table->float('total')->default('0.0')->unsigned();
        $table->timestamps();
        
        
        // Llaves foraneas.

        //Cliente
        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onUpdate('cascade')->onDelete('cascade');

        //Articulo
        $table->unsignedInteger('articulo_id')->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')
             ->onUpdate('cascade')->onDelete('cascade');
            
        // Credito    
        $table->unsignedInteger('credito_id')->nullable();
        $table->foreign('credito_id')->references('id')->on('creditos')
            ->onUpdate('cascade')->onDelete('cascade');

        // Credito    
        $table->unsignedInteger('abono_id')->nullable();
        $table->foreign('abono_id')->references('id')->on('abonos')
            ->onUpdate('cascade')->onDelete('cascade');          

    });


    //------------------------Cliente abono---------------------/
    Schema::create('cliente_abonos', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->float('saldo_actual')->nullable();
        $table->integer('cuotas_restantes')->nullable();          
        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('abono_id')->nullable();
        $table->foreign('abono_id')->references('id')->on('abonos')
            ->onUpdate('cascade')->onDelete('cascade');  

        $table->timestamps();      
    });



  /*--------------------------CAJAS------------------------------------

    Schema::create('cajas', function (Blueprint $table) {
       
        $table->increments('id');
        $table->string('nombreusuario');
        $table->float('valorinicial')->default(0);
 
        $table->timestamps();

        
    });

    Schema::create('detalle_caja', function (Blueprint $table) {
        
        $table->increments('id');
        $table->float('valorfinal')->nullable();
        $table->float('ganancia')->nullable();

        $table->integer('caja_id')->unsigned();       
        $table->integer('user_id')->unsigned();
        
        $table->foreign('caja_id')->references('id')->on('cajas')
         ->onUpdate('cascade')->onDelete('cascade');

        $table->foreign('user_id')->references('id')->on('users')
         ->onUpdate('cascade')->onDelete('cascade');
    
         $table->timestamps();

           

    });

    */
   /*--------------------------COMPRAS------------------------------*/
 
    Schema::create('compras', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->double('totalCompra');
        $table->integer('users_id')->unsigned();
        $table->foreign('users_id')->references('id')->on('users');

        $table->timestamps();
    });



    /*--------------------------COMPRA_ARTICULO------------------------------------*/
  
    
    Schema::create('compra_articulo', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->integer('cantidad')->default('0');
        $table->float('preciounitario')->default('0.0');
        $table->float('subtotal')->default('0.0');
        $table->float('total')->default('0.0');
        
        $table->integer('compra_id')->unsigned()->nullable();       
        $table->foreign('compra_id')->references('id')->on('compras')
         ->onUpdate('cascade')->onDelete('cascade');

        $table->integer('articulo_id')->unsigned()->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')
         ->onUpdate('cascade')->onDelete('cascade');
    
         $table->timestamps();
           
    });
    
    
/*--------------------------VENTAS------------------------------------*/
    Schema::create('ventas', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->float('totalventa')->default('0.0')->unsigned();  
        
        $table->integer('users_id')->unsigned();
        $table->foreign('users_id')->references('id')->on('users');
       
        $table->timestamps();
        
     });

   //-----------------------Ventas vendedoras--------------------//
    Schema::create('ventas_vendedoras', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->float('saldo_credito')->unsigned();
            
              // Relación foranea
        $table->unsignedInteger('venta_id')->nullable();
        $table->foreign('venta_id')->references('id')->on('ventas')
            ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('vendedor_id')->nullable();
        $table->foreign('vendedor_id')->references('id')->on('vendedores')
            ->onUpdate('cascade')->onDelete('cascade');
        
        $table->timestamps();
        
        });

/*--------------------------VENTA_ARTICULO------------------------------------*/

    Schema::create('venta_articulo', function (Blueprint $table) {
        
        $table->increments('id')->unsigned();
        $table->integer('cantidad')->default('0')->unsigned();
        $table->float('preciounitario')->default('0.0')->unsigned();
        $table->float('subtotal')->default('0.0')->unsigned();
        $table->float('total')->default('0.0')->unsigned();

        $table->integer('venta_id')->unsigned()->nullable();                
        $table->foreign('venta_id')->references('id')->on('ventas')
         ->onUpdate('cascade')->onDelete('cascade');

        $table->integer('articulo_id')->unsigned()->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
            ->onUpdate('cascade')->onDelete('cascade');
    
      
         $table->timestamps();
         
         

     });

    //------------------------Categorias----------------------
    Schema::create('categorias', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->char('nombrecategoria', 50)->unique();
        $table->mediumText('descripcion');

        $table->integer('articulo_id')->unsigned()->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')
             ->onUpdate('cascade')->onDelete('cascade');
        $table->timestamps();
          
           
    });

    //------------------------Clientes y telefono-----------------
    Schema::create('clientes_telefonos', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->char('numero_telefonico',50);

        $table->unsignedInteger('cliente_id')->nullable();
        $table->unsignedInteger('tipo_id')->nullable();
         
            // Relación foranea
        $table->foreign('cliente_id')->references('id')->on('clientes')
             ->onUpdate('cascade')->onDelete('cascade');
      
        $table->foreign('tipo_id')->references('id')->on('tipos_telefonos')
             ->onUpdate('cascade')->onDelete('cascade');
        $table->timestamps();
        
        });
     //-----------------------Proveedor y telefono-----------------
    Schema::create('proveedores_telefonos', function (Blueprint $table) {
        $table->increments('id')->unsigned();
        $table->char('numero_telefonico',50);

        $table->unsignedInteger('proveedor_id')->nullable();
        $table->unsignedInteger('tipo_id')->nullable();
         
            // Relación foranea
        $table->foreign('proveedor_id')->references('id')->on('proveedores')
             ->onUpdate('cascade')->onDelete('cascade');
      
        $table->foreign('tipo_id')->references('id')->on('tipos_telefonos')
             ->onUpdate('cascade')->onDelete('cascade');
        $table->timestamps();
        
        });
    //--------------------------------------------------------------//
    Schema::create('vendedores_telefonos', function (Blueprint $table){
        $table->increments('id')->unsigned();
        $table->char('numero_teléfonico',50);
         
              // Relación foranea
        $table->unsignedInteger('vendedor_id')->nullable();
        $table->foreign('vendedor_id')->references('id')->on('vendedores')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('tipo_id')->nullable();
        $table->foreign('tipo_id')->references('id')->on('tipos_telefonos')
             ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    //-------------------------------------------------------------//
    Schema::create('cliente_articulos', function (Blueprint $table) 
    {
        $table->increments('id')->unsigned();
        $table->float('totalactual');
         
              // Relación foranea
        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('articulo_id')->nullable();
        $table->foreign('articulo_id')->references('id')->on('articulos')
             ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
    });

    //---------------------Departamentos--------------------------//
    Schema::create('departamentos', function (Blueprint $table) 
    {
        $table->increments('id')->unsigned();
        $table->char('nombre',50);

        $table->timestamps();
    });

    //---------------------Municipios--------------------------//
    Schema::create('municipios', function (Blueprint $table) 
    {
        $table->increments('id')->unsigned();
        $table->char('nombre',50);

        $table->timestamps();
    });

    //-------------------Departamentos_Municipios-------------------//
   
    Schema::create('departamento_municipios', function (Blueprint $table) 
    {
        $table->increments('id')->unsigned();
         
              // Relación foranea
        $table->unsignedInteger('departamento_id')->nullable();
        $table->foreign('departamento_id')->references('id')->on('departamentos')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('municipio_id')->nullable();
        $table->foreign('municipio_id')->references('id')->on('municipios')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
             ->onUpdate('cascade')->onDelete('cascade');
        
        $table->unsignedInteger('proveedor_id')->nullable();
        $table->foreign('proveedor_id')->references('id')->on('proveedores')
             ->onUpdate('cascade')->onDelete('cascade');             

        $table->timestamps();
    });

    //------------------Departamentos_Municipios-------------------//
   
    Schema::create('municipio_direcciones', function (Blueprint $table) 
    {
        $table->increments('id')->unsigned();
         
              // Relación foranea
        $table->unsignedInteger('direccion_id')->nullable();
        $table->foreign('direccion_id')->references('id')->on('direcciones')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('municipio_id')->nullable();
        $table->foreign('municipio_id')->references('id')->on('municipios')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('cliente_id')->nullable();
        $table->foreign('cliente_id')->references('id')->on('clientes')
             ->onUpdate('cascade')->onDelete('cascade');

        $table->unsignedInteger('proveedor_id')->nullable();
        $table->foreign('proveedor_id')->references('id')->on('proveedores')
             ->onUpdate('cascade')->onDelete('cascade');     


            $table->timestamps();
    });
    

}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropIfExists('categorias');
        Schema::dropIfExists('articulos');
        Schema::dropIfExists('tipos_telefonos');
        Schema::dropIfExists('direcciones');  
        Schema::dropIfExists('proveedores');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('creditos');
        Schema::dropIfExists('vendedores');
        Schema::dropIfExists('abonos');
        Schema::dropIfExists('cliente_abonos');
        //Schema::dropIfExists('cajas');
        //Schema::dropIfExists('detalle_caja');
        Schema::dropIfExists('compras'); 
        Schema::dropIfExists('ventas'); 
        Schema::dropIfExists('articulo_proveedor');
        Schema::dropIfExists('venta_articulo');
        Schema::dropIfExists('compra_articulo');
        Schema::dropIfExists('ventas_vendedoras');
        Schema::dropIfExists('creditos_cliente');
        Schema::dropIfExists('clientes_telefonos');


    }
}
