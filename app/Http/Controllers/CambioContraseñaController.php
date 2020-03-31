<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class CambioContraseñaController extends Controller
{
    public function __construct()
    {
        // Filtrar todos los métodos
        $this->middleware('auth');

    }

    public function index()
    {
     
        $id=Auth::id();
        $contraseña = User::find($id);
        $correo = DB::table('users')->select('email','id')->where('id','=',$id)->pluck('email','id');
    
        $user = DB::table('users')
        ->select('id', 'email', 'password')->where('users.id', '=', $id)
        ->first();
        return  view('resetPassword.index',compact('correo','user','contraseña'));// SE carga en vista y le pasamos la variable
    }

    public function store(Request $request)
        
    {
        
        $id = Auth::id();
        $user = User::find($id)->update($request->all());

                return redirect()->route('resetPassword.index')
                ->with('info', 'Cambio de contraseña realizada con exitos.');
    }

}
