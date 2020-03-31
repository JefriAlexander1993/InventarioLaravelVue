<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Articulo;
use App\Direccion;
use App\Cliente_telefonos;
use App\Tipos_telefonos;
use App\Detalle_cliente_articulo;
use App\Municipio_direccion;
use App\Departamento_municipio;
use App\Municipio;
use App\Departamento;


use Illuminate\Http\Request;
// use  App\Http\Requests\ClienteRequest;

class ClienteController extends Controller
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
    public function index(Request $request)     // Funcion que envia al index de cliente
    {
      
        return  view('cliente.index', ['clientes'=>Cliente::orderBy('id','asc')->paginate(100)]);// Se carga en vista y le pasamos la variable
       
    }
    
    public function create()        // Funcion encargada de enviar a la vista create de cliente
    {
        $departamentos = Departamento::pluck('nombre','id');
        $municipios = Municipio::pluck('nombre','id');

        return view('cliente.create' , compact('departamentos','municipios'));   
    }


    public function store(Request $request) // Funcion que almacena los datos de cliente
    {      
    
       if(Cliente::nuipUnico($request->nuip)){  // Si el nuip es unico entonces se permite proceder a guardar los datos del cliente           

            $cliente = new Cliente; 
            $cliente->nuip = $request->nuip;
            $cliente->primer_nombre=$request->primer_nombre;
            $cliente->segundo_nombre = $request->segundo_nombre;
            $cliente->primer_apellido =$request->primer_apellido;
            $cliente->segundo_apellido = $request->segundo_apellido;
            $cliente->correoelectronico = $request->correoelectronico;
         
            $direccion = new Direccion;
            $direccion->calle = $request->calle;
            $direccion->carrera = $request->carrera;
            $direccion->numero_casa =$request->numero_casa;
            $direccion->barrio = $request->barrio;
            $direccion->save();

            $cliente->direccion_id = $direccion->id;
            $cliente->save();

            $municipio_direccion = new Municipio_direccion;
            $municipio_direccion->direccion_id=$direccion->id;
            $municipio_direccion->municipio_id= $request->municipio_id;
            $municipio_direccion->cliente_id =$cliente->id;
            $municipio_direccion->save();

            $departamento_minicipio = new Departamento_municipio;
            $departamento_minicipio->departamento_id= $request->departamento_id;
            $departamento_minicipio->municipio_id = $request->municipio_id;
            $departamento_minicipio->cliente_id = $cliente->id;
            $departamento_minicipio->save();

            $tipos_telefonos =new Tipos_telefonos;
            $tipos_telefonos->nombre_tipo = $request->nombre_tipo;
            $tipos_telefonos->save();

            $cliente_telefonos = new Cliente_telefonos;
            $cliente_telefonos->numero_telefonico = $request->numero_telefonico;
            $cliente_telefonos->cliente_id= $cliente->id;
            $cliente_telefonos->tipo_id= $tipos_telefonos->id;
            $cliente_telefonos->save();


            return redirect()->route('cliente.index')       // Se retorna a la ruta cliente.index (cliente/index)
            ->with('info', 'El cliente a sido guardado con exito.'); // El sistema arroja la infomacion "El cliente a sido guardado con exito"
        }  // En caso de no ser un nuip unico
         
            return redirect()->route('cliente.create')  // Se redirige a  la ruta cliente.create (cliente/create)
            ->with('info', 'Ya existe un cliente con el nuip digitado.'); // El sistema arroja la informacion "Ya existe un cliente con el nuip digitado"

        

        }
    
        
    public function show($id)       // Funcion que muestra la informacion del cliente
    {
        // Busca un cliente por medio del id
         return view('cliente.show', ['cliente'=>Cliente::find($id)]);  // Retorna a la vista show de clientes con la variable cliente
    }

    public function edit($id)       // Funcion que encuentra un cliente por medio del id
    {
    
        // Busca un cliente por medio del  id
        return view('cliente.edit',['cliente'=>Cliente::find($id)]);    // Envia a la vista edit de cliente con la variable cliente
    
    }

    public function update(Request $request, $id)  // Funcion que actualiza los datos del cliente
    {
        
        $cliente =Cliente::find($id)->update($request->all());   // Busca un cliente por medio de su id
         // Guarda los datos actualizados del cliente
        return redirect()->route('cliente.index')           // Redirige a la ruta cliente.index (index del cliente)
        ->with('info', 'El cliente fue actualizado.'); // El sistema arroja un mensaje "El cliente fue actualizado"
    }

    public function destroy($id)  // Funcion que elimina un cliente por medio de una id
    {
        $cliente = Cliente::find($id)->delete();   // Busca un cliente por medio de su id
           // Elimina al cliente
        return back()->with('error', 'El cliente fue eliminado.'); //Retorna a la pagina anterior con el mensaje "El cliente fue eliminado"
    }

    public function getClientByNuip($nuip) //Funcion que obtiene un articulo por medio de su codigo
    {
        $client = Cliente::where('nuip', $nuip)->get();
     
        if(count($client)>0){

            return response()->json(
                ['datos' => $client, 'code' => 200]);    
        }

            return response()->json(['error'=>'No existen datos con ese codigo.',"code" => 600]);
        
    } 


}
