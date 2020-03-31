<?php
namespace App\Http\Controllers;
use App\Compra;
use App\Compra_articulo;
use App\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CompraController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
    }
    
    public function index()     // Funcion que envia al index de compra
    {

        // $articulos = articulo::search($request->codigo)->orderBy('id')->paginate('8');
        
        return  view('compra.index', ['compras'=>Compra::orderBy('id','desc')->paginate('8')]);// Se carga en vista y le pasamos la variable
    }
    
    public function create()        // Funcion encargada de enviar a la vista create de compra
    {
        return view('compra.create',['articulos'=>Articulo::pluck('nombre','codigo')]); // Retorna a la vista create de compra
    }

    public function store(Request $request)     // Funcion que almacena los datos de compra
    {
      
        $id = Auth::id();       // Obtiene el id del usuario que esta interactuando con el sistema
     
        $compra = new Compra;   // Crea un objeto tipo compra
        $compra->totalCompra=$request->totalCompra;
        $compra->users_id=$id;
        $compra->save();        // guarda los datos entrantes de la nueva compra
       
       for($x = 0; $x < $request->cantidadarticulos; $x++) {   // Ciclo el cual almacena todos los articulos entrantes en la compra
         
          $compra_articulo= new Compra_articulo;     
        
        $compra_articulo->cantidad=$request->cantidad[$x];
        $compra_articulo->preciounitario=$request->precio_u[$x];
        $compra_articulo->subtotal=$request->sub_t[$x];
        $compra_articulo->total=$request->total[$x];
        $compra_articulo->compra_id= $compra->id;
       
        $articulo =Articulo::where('codigo','=',$request->codigo[$x])->first() ;
        $articulo->cantidad += $request->cantidad[$x];
        $compra_articulo->articulo_id=$articulo->id;
        $articulo->save();  
      
       $compra_articulo->save();
    }
        return redirect()->route('compra.index')        // Redirige a la ruta compra.index (compra/index)
         ->with('info', 'La compra fue guardada.');     // El sistema arroja el mensaje "La compra fue guardada"
}
    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show($id)       // Funcion que muestra la informacion de la compra
    {
        
        $compra = Compra::find($id); // Busca una compra por medio del  id
        $detalles = DB::table('compra_articulo')
        ->join('articulos','articulos.id','=', 'compra_articulo.articulo_id')
        ->select('compra_articulo.*','articulos.nombre')->where('compra_articulo.compra_id', '=', $compra->id)
        ->get();
        // Se obtienen los detalles de la compra de acuerdo a su id
         return view('compra.show', compact('compra', 'detalles'));  // Retorna a la vista show de compra con las variables compra y detalles
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra una compra por medio del id
    {
         // Busca un Articulo por medio del  id
        
        return view('compra.edit', ['compra'=>Compra::find($id)]);  // Retorna a la vista edit de compra con la variable compra
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   // Funcion que encuentra una compra por medio del id
    {
 
        $compra = new Compra;        // Crea un nuevo objeto de tipo 
        $compra->totalcompra=$request->totalcompra;
        $compra->save();            // guarda los datos actualizados de la compra
        return redirect()->route('compra.index')
        ->with('info', 'La compra fue guardado.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)   // Funcion encargada de eliminar compras por medio de una id
    {
       
        $compra = Compra::find($id)->delete();       // Busca una compra por medio de su id         // Elimina la compra encontrada
        return back()->with('info', 'La compra fue eliminado'); // Retorna atras con un mensaje de informacion "La compra fue eliminada"
    }
    }