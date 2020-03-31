<?php
use App\Http\Middleware\CheckPermission;
use App\Http\Controllers\Auth\ForgotPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Mail::to('bbac4f60d2-440227@inbox.mailtrap.io')->send(new App\Mail\newMail);
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('proveedor','ProveedorController');
        Route::resource('venta','VentasController');
        Route::post('venta/cliente','VentasController@storeCliente')->name('venta.storeCliente');

        Route::get('venta/cliente/{nuip}', 'ClienteController@update')->name('venta.cliente.update');

        Route::resource('cliente','ClienteController');
     
        Route::resource('compra', 'CompraController');
        Route::resource('articulo', 'ArticuloController');
        Route::resource('perfil', 'PerfilController');
        Route::resource('inventario', 'InventarioController');
        Route::resource('abono', 'AbonoController');
        Route::resource('credito', 'CreditosController',['except'=>['create','show','edit']]);
        Route::resource('Roles', 'RoleController');
        Route::resource('Permission_roles', 'PermissionRoleController');
        Route::resource('Role_users', 'RoleUserController');
        Route::resource('Permissions', 'PermissionController');
        Route::resource('Users', 'UserController');
   
        // Route::get('perfil/reset', 'PerfilController@reset');
        Route::get('articulo/getArticulo/{codigo}' , 'ArticuloController@getArticuloByCodigo')->name('articulo.getcodigo');
        
            // Ruta de busqueda.
        Route::get('cliente/getClient/{nuip}' , 'ClienteController@getClientByNuip')->name('cliente.getnuip');


            // Ruta de busqueda credito.
        Route::get('credito/getCredito/{id}' , 'CreditosController@getCreditByNuip')->name('credito.getid');

        //pdf

        Route::get("/cajapdf","PdfController@cajasPDF");  
        Route::get("/proveedorpdf","PdfController@proveedoresPDF");  
        Route::get("/compraspdf","PdfController@comprasPDF");  
        Route::get("/articulopdf","PdfController@articulosPDF"); 
        Route::get("/clientepdf","PdfController@clientesPDF"); 
        Route::get("/facturapdf","PdfController@facturaPDF"); 
        Route::get("/perfil","PdfController@facturaPDF"); 
        Route::get("facturapdf/{id}","PdfController@facturaPDF")->name('facturapdf'); 

    