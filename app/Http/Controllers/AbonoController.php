<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Abono;
use App\Cliente_abono;
use App\Creditos_cliente;
use App\Credito;

class AbonoController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');
    }
    
    public function index()
    {   
        $cliente_abonos = Cliente_abono::orderBy('id','desc')->paginate();

        return view('abono.index',compact('cliente_abonos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $clientes = Cliente::select('nuip','primer_nombre','id','primer_apellido')->get();
        return view('abono.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $abono = new Abono;
        $abono->fecha_abono = $request->fecha_abono;
        $abono->valor_abono = $request->valor_abono;
        $abono->cuota_numero = $request->cuota_numero;
        $abono->save();
        
        $cliente_abono = new Cliente_abono;
        $cliente_abono->saldo_actual = $request->saldo_actual;
        $cliente_abono->cuotas_restantes = $request->cuotas_restantes;
        $cliente_abono->abono_id = $abono->id;
        $cliente_abono->cliente_id = $request->cliente_id;
        $cliente_abono->save();

        $cliente_credito = Creditos_cliente::where('cliente_id',$request->cliente_id)->first();
     
        $cliente_credito->saldo_actual -= $request->valor_abono;
        $cliente_credito->cuotas_restantes -= $request->cuota_numero;
        $cliente_credito->save();

            return back()->with('info', 'El abono fue guardado exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abono = Cliente_abono::find($id)->delete();

        return back()->with('error', 'El  abono fue eliminado.');
    }
}
