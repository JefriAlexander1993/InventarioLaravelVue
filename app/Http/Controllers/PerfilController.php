<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exceptions\Handler;
use Illuminate\Support\Facades\Auth;
use App\User;

class PerfilController extends Controller
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
    public function index()         // Funcion que envia al index de perfil
    {

   	  return  view('perfil.index');     // Retorna la vista index de perfil
    }
    public function create()         // Funcion que envia al index de perfil
    {

   	  return  view('perfil.create');     // Retorna la vista index de perfil
    }

    
    public function show()          // Funcion que muestra la informacion del perfil
    {
        $id = Auth::id();           // Se obtiene el id del usuario interactuando con el sistem

         $perfil = DB::table('users')
        ->select('id','name', 'email', 'password', 'pais', 'ciudad', 'fechaNacimiento', 'estudios', 'informacionPersonal')->where('users.id', '=', $id)
        ->first();
        // Se obtienen todos los datos del perfil
      

           return view('perfil.show', compact('perfil'));       // Se retorna a la vista show de perfil
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function edit()          // Funcion que encuentra un cliente

    {   
        $id = Auth::id();           // Se obtiene el id del usuario que se encuentra interactuando con el sistema
        $perfil = DB::table('users')
        ->select('id','name', 'email', 'password', 'pais', 'ciudad', 'fechaNacimiento', 'estudios', 'informacionPersonal')->where('users.id', '=', $id)
        ->first();
        // Se obtiene toda la informacion de ese usuario


        return view('perfil.edit', compact('perfil'));  // Se retorna a la vista edit de perfil con la variable perfil
    }
  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) // Funcion que actualiza los datos del perfil (usuario)

    {
        if (is_null($request->password)) {  // Si el campo de contraseña es vacio entonces no se modificara la contraseña
    

        $id = Auth::id();               // Obtiene el id del usuario que se encuentra interactuando con el sistema
        $perfil = User::find($id);      // Busca el usuario por medio del id
      
        $perfil->name=$request->name;
        $perfil->email=$request->email;
        $perfil->pais=$request->pais;
        $perfil->ciudad=$request->ciudad;
        $perfil->fechaNacimiento=$request->fechaNacimiento;
        $perfil->estudios=$request->estudios;
        $perfil->informacionPersonal=$request->informacionPersonal;
       

 
 
        $perfil->save();                    // Actualiza los datos del perfil (usuario)
        return redirect()->route('perfil.show', $id)        // Redirige a la ruta perfil.show (perfil/show) con la variable del id
        ->with('info', 'El perfil fue guardado.');      // El sistema muestra un mensaje de informacion diciendo "El perfil fue guardado"

}else{                                  // En caso de no ser vacia entonces se modificara la contraseña

        $id = Auth::id();               // Obtiene el id del usuario que se encuentra interactuando con el sistema
        $perfil = User::find($id);      // Busca el usuario por medio del id
      
        $perfil->name=$request->name;
        $perfil->email=$request->email;
        $perfil->pais=$request->pais;
        $perfil->ciudad=$request->ciudad;
        $perfil->fechaNacimiento=$request->fechaNacimiento;
        $perfil->estudios=$request->estudios;
        $perfil->password=bcrypt($request->password);
        $perfil->informacionPersonal=$request->informacionPersonal;
       

 
 
        $perfil->save();                    // Actualiza los datos del perfil (usuario)
        return redirect()->route('perfil.show', $id)        // Redirige a la ruta perfil.show (perfil/show) con la variable del id
        ->with('info', 'El perfil fue guardado.');      // El sistema muestra un mensaje de informacion diciendo "El perfil fue guardado"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\perfiles  $perfiles
     * @return \Illuminate\Http\Response
     */
    
}
}
