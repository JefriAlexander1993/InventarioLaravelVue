<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo'=> 'required|unique:articulos',
            'fechavencimiento'=> 'required',
            'nombre'=> 'required', 
            'rubro'=> 'required', 
            'marca'=> 'required', 
            'cantidad'=> 'required',
            'preciounitario'=> 'required', 
            'precioventa'=> 'required', 
            'stockmin'=> 'required', 
        ];
    }
}
