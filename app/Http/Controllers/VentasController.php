<?php

namespace App\Http\Controllers;

use App\Articulo;
use Illuminate\Http\Request;
use App\Venta;
use App\Cliente;
use App\Venta_articulo;
use App\Credito;
use App\Creditos_cliente;
use App\Departamento;
use App\Municipio;
use App\Http\Requests\VentaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class VentasController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }
    
    public function index(Request $request)     // Funcion que envia al index de venta
    {   
        $sumVenta = DB::table('ventas')->select('totalventa')->sum('totalventa');
        // Suma el total de las ventas   
      
        $ventas = Venta::orderBy('created_at','desc')->paginate(100);
        
        return  view('venta.index', compact('ventas', 'sumVenta'));// Se carga en vista y le pasamos la variable
   
    }

    public function create()        // Funcion encargada de enviar a la vista create de venta
    {
      
        return view('venta.create', ['articulos'=>Articulo::pluck('nombre','codigo'),'clientes'=>Cliente::select('nuip','primer_nombre','id','primer_apellido')->get(),'departamentos'=>Departamento::pluck('nombre','id'),'municipios'=>Municipio::pluck('nombre','id')]);    // Retorna al create de venta
    }


    public function store(Request $request) // Funcion que almacena los datos de venta
    {   
            
         if ($request->modo_de_pago == 'Contado') {
                $id = Auth::id(); // Obtiene el id del usuario que se encuentra interactuando con el sistema
                $venta = new Venta;         // Se crea un nuevo objeto tipo venta
                $venta->totalventa = $request->totalVenta;
                $venta->users_id = $id;
                $venta->save();             // Se almacenan los datos
              
               for($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta
                     
                $venta_articulo = new Venta_articulo;          

                $venta_articulo->cantidad = $request->cantidad[$x];
                $venta_articulo->preciounitario = $request->precio_u[$x];
                $venta_articulo->subtotal = $request->sub_t[$x];
                $venta_articulo->total = $request->total[$x];
                $venta_articulo->venta_id = $venta->id;
                $venta_articulo->cliente_id = $request->cliente_id;
                $articulo = Articulo::where('codigo','=',$request->codigo[$x])->first() ;
                $articulo->cantidad -= $request->cantidad[$x];
                $venta_articulo->articulo_id = $articulo->id;
                $articulo->save();  
              
                $venta_articulo->save();

                return redirect()->route('venta.index')     // Redirige a la ruta venta.index (venta/index)
                    ->with('info', 'La venta fue guardada.');  
            }
        }
                $id = Auth::id();
                $creditos = new Credito;
                $creditos->total_credito  = $request->totalVenta;
                $creditos->modo_de_pago   = $request->modo_de_pago;
                $creditos->forma_de_pago  = $request->forma_de_pago;
                $creditos->cantidad_de_cuotas = $request->cuotas_credito;
                $creditos->valor_de_cuota = $request->valor_de_cuota;
                $creditos->observacion = $request->observacion;
                $creditos->users_id = $id;
                $creditos->save();

            for($x = 0; $x < $request->cantidadarticulos; $x++) { // Ciclo el cual almacena todos los articulos entrantes en la venta
             
                $creditos_cliente = new Creditos_cliente;
                       
                $creditos_cliente->cuotas_restantes = $request->cuotas_credito;
                $creditos_cliente->cantidad = $request->cantidad[$x];
                $creditos_cliente->preciounitario = $request->precio_u[$x];
                $creditos_cliente->subtotal = $request->sub_t[$x];
                $creditos_cliente->total = $request->total[$x];
                $creditos_cliente->credito_id = $creditos->id;
                $creditos_cliente->cliente_id = $request->cliente_id;
                $creditos_cliente->saldo_actual = $request->totalVenta;

               
                $articulo =Articulo::where('codigo','=',$request->codigo[$x])->first() ;
                $articulo->cantidad -= $request->cantidad[$x];
                $creditos_cliente->articulo_id = $articulo->id;
                $articulo->save();  
              
                $creditos_cliente->save();

                return redirect()->route('venta.index')     // Redirige a la ruta venta.index (venta/index)
                ->with('info', 'El credito fue creado exitosamente.');
            
            }    

            
         return view('venta.create')->with('error', 'Algo salio mal.');
        
       
    }
    

    public function show($id)       // Funcion que muestra la informacion de la venta
    {
        $venta = Venta::find($id);  // Busca una venta por medio de su id
      

        $detalles = DB::table('venta_articulo')
        ->join('articulos','articulos.id','=', 'venta_articulo.articulo_id')
        ->select('venta_articulo.*','articulos.nombre')->where('venta_articulo.venta_id', '=', $venta->id)
        ->get();
        
        // Se obtienen los detalles de la venta_articulo
    
        return view('venta.show', compact('venta', 'detalles'));    // Retorna a la vista show de venta con la variables venta y detalles
    }


    public function edit($id)       // Funcion que encuentra una venta por medio del id
    {
        // Busca una venta por medio del  id
        
        return view('venta.edit', ['venta'=>Venta::find($id)]);    // Retorna a la vista edit de venta con la variable venta
    }

    public function update(VentaRequest $request, $codigo)  // Funcion que actualiza los datos de la venta
    {
        $venta = new Venta;             // Se crea un objeto de tipo venta
        $venta->totalventa=$request->totalventa;
       
        $venta->save();                 // Se almacena la informacion
        return redirect()->route('venta.index')     // Redirige a la ruta venta.index (venta/index)
        ->with('info', 'La venta fue guardada.');   // El sistema muestra un mensaje de informacion "La venta fue guardada"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy($codigo)  // Funcion que elimina una venta por medio de un codigo
    {
        $venta = Venta::find($codigo)->delete();      // Busca una venta por medio de su codigo        // Elimina la venta
        return back()->with('error', 'La venta fue eliminada'); // Retorna a la pagina anterior con el mensaje de informacion "La venta fue eliminada"
    }
    
    public function storeCliente(Request $request) // Funcion que almacena los datos de cliente
    {      

        if(Cliente::nuipUnico($request->nuipCliente)){  // Si el nuip es unico entonces se permite proceder a guardar los datos del cliente
            $cliente = Cliente::create($request->all()); 
        
           // return response()->json([
           //     'datos' => $cliente,
           //     'code'=>200 
           // ]);
            return redirect()->route('venta.create')       // Se retorna a la ruta cliente.index (cliente/index)
            ->with('info', 'El cliente a sido guardado con exito.'); // El sistema arroja la infomacion "El cliente a sido guardado con exito"
        }  // En caso de no ser un nuip unico


            return response()->json([
                "error" => 'Error en el momento de guardar.',
                "code" => 600
            ]);
         
           // return redirect()->route('cliente.create')  // Se redirige a  la ruta cliente.create (cliente/create)
           // ->with('info', 'Ya existe un cliente con el nuip digitado.'); // El sistema arroja la informacion "Ya existe un cliente con el nuip digitado"

        }

         
        
}
