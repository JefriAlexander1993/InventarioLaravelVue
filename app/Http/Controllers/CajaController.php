<?php

namespace App\Http\Controllers;

use App\Caja;
use App\Detalle_caja;
use Illuminate\Http\Request;
use App\Http\Requests\CajaRequest;
use PDF;
use DB;
use Illuminate\Support\Facades\Auth;

class CajaController extends Controller

{

    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
    }
        
    public function index()
    {
        
        $cajas = Caja::orderBy('id')->paginate('8');
     
       // $idA=Auth::id();
        $detalles = DB::table('detalle_caja')
        ->join('cajas', 'detalle_caja.caja_id', '=', 'cajas.id')
        ->join('users', 'detalle_caja.user_id', '=', 'users.id')
        ->select('cajas.id','cajas.nombreusuario','cajas.valorinicial','detalle_caja.valorfinal','detalle_caja.ganancia')
        ->get();

        return  view('caja.index', compact('cajas','detalles'));// SE carga en vista y le pasamos la variable
       
    }


    public function create() // Funcion encargada de enviar a la vista create de caja
    {
        $idA=Auth::id();            // Se obtiene el id del usuario que esta interactuando con el sistema

        // Realiza la suma total de las ventas de acuerdo al id del usuario
        return view('caja.create', ['sumVenta'=>DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa'), 'name'=>Auth::user()->name]); // Retorna a la vista create con las variables sumVenta y name
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Funcion que almacena los datos de caja
    {
        
        $caja = new Caja;   // Crea un objeto tipo caja
        $idA=Auth::id();    // Obtiene la id del usuario que se encuentra interactuando con el sistema
        $caja->nombreusuario= $request->nombreusuario;
        $caja->valorinicial= $request->valorinicial;
        $caja->save();      // Guarda los datos de caja

        $detalle_caja = new Detalle_caja; // Crea un objeto tipo detalle_caja
        $detalle_caja->user_id= $idA;    
        $detalle_caja->caja_id=$caja->id; 
        $detalle_caja->save();            // Guarda los datos de detalle_caja
      

        return redirect()->route('caja.index')  // Redirige a la ruta caja.index (caja/index)
        ->with('info', 'La caja fue guardada.');    // El sistema arroja la informacion "La caja fue guardada"

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function show($id)           // Funcion que muestra la informacion de la caja
    {
        $caja = Caja::find($id); // Busca un caja por medio del  id


        $detalles = Detalle_caja::where('caja_id','=',$caja->id)->first();
     
        
         return view('caja.show', compact('caja', 'detalles')); // Retorna a la vista show de caja con los datos de la caja que se busca al igual que detalles
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)       // Funcion que encuentra una caja por medio del id al igual que el usuario que este actualmente interactuando con el sistema
    {
       
        $idA=Auth::id();          // Obtiene la id del usuario que se encuentra interactuando con el sistema
        $caja = Caja::find($id); // Busca un caja por medio del  id
  
        $sumVenta = DB::table('ventas')->select('totalventa')->where('users_id','=',$idA)->sum('totalventa');//Suma toda las ventas realizadas por un determidado user
     
        $cajainicial=  DB::table('cajas')->where('id' ,'=', $caja->id)->value('valorinicial'); // seleciona el valor inicial de caja depediendo el id de la caja

        $ganancia =  $sumVenta - $cajainicial; // Se resta la suma de todas la ventas de dicho usuario, con la caja iniciar para saber la ganancia.

        
        if ($ganancia < 0) {                    // En caso de que la ganancia sea negativa, multiplicarse por   
            $ganancia = $ganancia * -1;         // -1 para volverse positivo
        }        

        
        return view('caja.edit', compact('caja', 'sumVenta','ganancia'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)//Funcion que se encarga de actualizar los datos de la caja
    {
        
        $caja =Caja::find($id);/*Buscar en caja*/
            
        $detalle_caja= detalle_caja::where('caja_id','=',$caja->id)->first();   
        $detalle_caja->valorfinal= $request->valorfinal;
        $detalle_caja->ganancia= $request->ganancia;
 
        $detalle_caja->save();
        // $caja->save();

        return redirect()->route('caja.index')
        ->with('info', 'La caja fue actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cajas  $cajas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    // Funcion que elimina una caja por medio de una id
    {
        $caja = Caja::find($id)->delete();  // Encuentra la caja por medio de su id     // Elimina la caja
        return back()->with('danger', 'La caja fue eliminado'); // Retorna atras (index) y arroja el mensaje "La caja fue eliminada"
    }

 
}