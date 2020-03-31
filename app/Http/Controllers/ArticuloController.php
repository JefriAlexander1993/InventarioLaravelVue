<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Proveedor;
use App\Articulo_proveedor;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
         return  view('articulo.index', ['articulos'=>Articulo::search($request->codigo)->orderBy('id')->paginate('5')]);// Se carga en vista y le pasamos la variable articulos
    }

    public function create(){
         
         return view('articulo.create',['proveedores'=>Proveedor::pluck('nombreproveedor','id')]); //Retorna a la vista create con la variable proveedores  
    }

    public function store(Request $request){   

        $validator = Validator::make($request->all(), [
            'codigo'=> 'required|unique:articulos',
            'fechafabricacion'=> 'required|date',
            'fechavencimiento'=> 'required|date',
            'nombre'=> 'required', 
            'preciounitario'=> 'required', 
            'precioventa'=> 'required', 
            'stockmin'=> 'required|integer|min:1', 
        ]);

        if ($validator->fails()) {
            return redirect('articulo/create')
                        ->withErrors($validator)
                        ->withInput();
        }
            $articulo = Articulo::create($request->all());   
            
            //Guarda los datos provenientes del request en el objeto articulo creado
            $art_id = $articulo->id;
            $prov_id= $request->proveedor;

            $pivot = new Articulo_proveedor; //Crea un nuevo articulo_proveedor
            $pivot->articulo_id= $art_id;
            $pivot->proveedor_id= $prov_id;
            $pivot->save();   //Guarda los datos en el nuevo objeto tipo articulo_proveedor
      
            return redirect()->route('articulo.index')  //Redirige a la vista index de articulo
                ->with('info', 'El articulo fue guardado exitosamente.');
    }

    public function show($id){
        // Busca un articulo por medio del  id
        return view('articulo.show', ['articulo'=>Articulo::findOrFail($id)]); //Rerotna la vista show de articulo
    }

    public function edit($id){
        return view('articulo.edit',['articulo'=>Articulo::findOrFail($id),'proveedores'=>Proveedor::pluck('nombreproveedor','id')]); //Retorna a la vista edit de articulo y envia los datos del articulo y los proveedores
    }

    public function update(Request $request, $id){
        $articulo = Articulo::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'codigo'=> ['required',Rule::unique('articulos')->ignore($articulo->id)],
            'fechavencimiento'=> 'required|date',
            'nombre'=> 'required', 
            'rubro'=> 'required', 
            'marca'=> 'required', 
            'preciounitario'=> 'required', 
            'precioventa'=> 'required', 
            'stockmin'=> 'required|integer|min:1', 
        ]);

        if ($validator->fails()) {
            $id=$articulo->id;
            $route ="articulo/$id/edit";
            return redirect($route)
                        ->withErrors($validator)
                        ->withInput();
        }
              
        $articulo->update($request->all());
        return redirect()->route('articulo.show', ['articulo' => $articulo]);
    }

    public function destroy($id){
          $articulo = Articulo::findOrFail($id)->delete();  // Busca un articulo por medio de su id    // Elimina al articulo encontrado
             return back()->with('error', 'El articulo fue eliminado'); //Rerotna a la pagina anterior la cual seria el index de articulo con un mensaje diciendo "El articulo fue eliminado"
    }

    public function getArticuloByCodigo($codigo) //Funcion que obtiene un articulo por medio de su codigo
    {
        $articulo=DB::table('articulos')->where('codigo', $codigo)->get(['id','codigo', 'nombre','precioventa', 'iva']);
     
        if(count($articulo)>0){
            $answer=array(
                "datos" => $articulo,
                "code" => 200
            ); 
        }else{
            $answer=array(
                "error" => 'No existen datos con ese codigo.',
                "code" => 600
            ); 
    }
         return response()->json($answer);
        
    }  
}
