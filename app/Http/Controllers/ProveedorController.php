<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Articulo;
use App\Direccion;
use App\Articulo_proveedor;
use App\Departamento;
use App\Municipio;
use App\Departamento_municipio;
use App\Municipio_direccion;
use App\Tipos_telefonos;
use App\Proveedor_telefonos;
use Validator;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
          return  view('proveedor.index',['proveedores'=>Proveedor::orderBy('id','DESC')->paginate(100)]);// Se carga en vista y le pasamos la variable
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articulos = Articulo::pluck('nombre','id');
        $departamentos = Departamento::pluck('nombre','id');
        $municipios = Municipio::pluck('nombre','id');

        return view('proveedor.create' , compact('articulos','departamentos','municipios'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'nit' =>'required|unique:proveedores',
                'nombreproveedor'=>'required|unique:proveedores',
                'email'=>'required|email|unique:proveedores',
                ]);
        
        if ($validator->fails())
        {
            return redirect()->route('proveedor.index')      // Redirige a la ruta proveedor.index (proveedor/index)
               ->with('error', 'Error al guardar el proveedor.'); 
        }
        
          //Proveedor
          $proveedor = new Proveedor;
          $proveedor->nit = $request->nit;
          $proveedor->nombreproveedor = $request->nombreproveedor;
          $proveedor->nombrerepresentante =$request->nombrerepresentante;
          $proveedor->email = $request->observacion;
          
          // Dirección
          $direccion = new Direccion;
          $direccion->barrio =$request->barrio;;
          $direccion->calle = $request->calle;
          $direccion->carrera = $request->carrera;
          $direccion->numero_casa = $request->numero_casa;
          $direccion->save();

          $proveedor->direccion_id = $direccion->id;
          $proveedor->save();
          // Municipio y dirección.
          
           $municipio_direccion = new Municipio_direccion;
           $municipio_direccion->direccion_id=$direccion->id;
           $municipio_direccion->municipio_id= $request->municipio_id;
           $municipio_direccion->proveedor_id =$proveedor->id;
           $municipio_direccion->save();
          
          // Departamento y municipio

          $departamento_minicipio = new Departamento_municipio;
          $departamento_minicipio->departamento_id= $request->departamento_id;
          $departamento_minicipio->municipio_id = $request->municipio_id;
          $departamento_minicipio->proveedor_id = $proveedor->id;
          $departamento_minicipio->save();

          $tipos_telefonos =new Tipos_telefonos;
          $tipos_telefonos->nombre_tipo = $request->nombre_tipo;
          $tipos_telefonos->save();

          $proveedor_telefonos = new Proveedor_telefonos;
          $proveedor_telefonos->numero_telefonico = $request->numero_telefonico;
          $proveedor_telefonos->proveedor_id= $proveedor->id;
          $proveedor_telefonos->tipo_id= $tipos_telefonos->id;
        
          $proveedor_telefonos->save();


          return redirect()->route('proveedor.index')      // Redirige a la ruta proveedor.index (proveedor/index)
               ->with('info', 'El proveedor fue guardado exitosament.'); 
               
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view('proveedor.show', ['proveedor'=>Proveedor::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // Busca un proveedor por medio del  id
        return view('proveedor.edit',['proveedor'=>Proveedor::findOrFail($id)]);    // Retorna a la vista edir de proveedor con la variable proveedor
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $proveedor=Proveedor::findOrFail($id);
     
         if (Proveedor::nitUnico($request->nuip) && Proveedor::nombreUnico($request->nombreproveedor) && Proveedor::emailUnico($request->email)) {
                    return redirect()->route('proveedor.index')      // Redirige a la ruta proveedor.index (proveedor/index)
               ->with('info', 'El proveedor fue actualizado.'); 
        }elseif (!Proveedor::nombreUnico($request->nombreproveedor)) {
            
                 return back()   // Redirige a la ruta proveedor.index (proveedor/index)
                    ; 
        } 
         return back()->with('info', 'Algo salio mal.'); 
       

     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $proveedor = Proveedor::find($id)->delete();      // Busca al proveedor por medio de su id   // Elimina al proveedor
        return back()->with('danger', 'El proveedor fue eliminado');    // Retorna a la pagina anterior con el mensaje de informacion "El proveedor fue eliminado"
    }
}
