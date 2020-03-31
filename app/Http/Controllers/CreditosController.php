<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Credito;
use App\Abono;
use App\Cliente_abono;
use App\Creditos_cliente ;
use DB;

class CreditosController extends Controller
{
       public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes_creditos = Creditos_cliente::orderBy('id','DESC')->paginate(100);
        return view('credito.index',compact('clientes_creditos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('credito.create',['clientes'=>Cliente::pluck('primer_nombre','id')]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $credito = Credito::findOrFail($id);

        return view('credito.show',compact('credito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credito  = Credito::findOrFail($id);
        $clientes = Cliente::pluck('primer_nombre','id');
        
        $credito_cliente = 
            DB::table('creditos_cliente')
                ->select('saldo_actual','cuotas_atrasadas')
                ->where('creditos_cliente.credito_id','=', $credito->id)
               ->first();

        return view('credito.edit', compact('credito','clientes','credito_cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        $credito_cliente = Creditos_cliente::where('creditos_cliente.credito_id','=', $id)->first();

        $credito_cliente->fecha_abono  = $request->fecha_abono;
        $credito_cliente->valor_abono  = $request->valor_abono;
        $credito_cliente->saldo_actual = $request->saldo_actual;
        $credito_cliente->cliente_id   = $request->cliente_id;
        $credito_cliente->credito_id   = $id;
        $credito_cliente->observacion  = $request->observacion;
        $credito_cliente->cuotas_atrasadas = $request->cuotas_atrasadas;
        if ($request->observacion === 'Abono') {
             $op = $credito_cliente->cuotas_credito - 1;
             $credito_cliente->cuotas_restantes =$op;
        }


        $credito_cliente->save();

        $abono = new Abono;
        $abono->fecha_abono = $request->fecha_abono;
        $abono->valor_abono = $request->valor_abono;
        $abono->cuotas_atrasadas = $request->cuotas_atrasadas;

        $abono->save();

        $cliente_abono = new Cliente_abono;
        $cliente_abono->saldo_total = $credito_cliente->saldo_total;
        $cliente_abono->saldo_actual = $request->saldo_actual;
        $cliente_abono->abono_id =$abono->id;
        $cliente_abono->cliente_id =$request->cliente_id;
        $cliente_abono->observacion =$request->observacion;
        $cliente_abono->fecha_nuevoCobro =$request->fecha_nuevoCobro;
        $cliente_abono->save();


          return redirect()->route('credito.index')  //Redirige a la vista index de articulo
                ->with('info', 'El abono fue guardado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
           $articulo = Credito::findOrFail($id)->delete();  // Busca un articulo por medio de su id    // Elimina al articulo encontrado
             return back()->with('error', 'El credito fue eliminado'); //Rerotna a la pagina anterior la cual seria el index de articulo con un mensaje diciendo "El articulo fue eliminado"
    }


    public function getCreditByNuip($id) //Funcion que obtiene un credito  por medio de su nuip
    {   

        $credito_cliente  = Creditos_cliente::where('cliente_id',$id)->select('credito_id','cuotas_restantes','saldo_actual')->first();
       
    
        if( $credito_cliente === null){

            return response()->json(['error'=>'No existen datos con ese codigo.',"code" => 600]);
           
        }

        $credito = Credito::where('id',$credito_cliente->credito_id)
                            ->select('total_credito','valor_de_cuota','cantidad_de_cuotas')->get();
                             
            return response()->json(
                    ['datoscredito_cliente' => $credito_cliente, 
                     'datoscredito' =>  $credito,
                     'code' => 200]);   
    } 

}
