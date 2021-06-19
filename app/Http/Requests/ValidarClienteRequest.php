<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarClienteRequest extends FormRequest
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
            //
            'nit' => 'required|unique:clientes,nit',
            'razon_social' => 'required',
           'nombre_contacto' => 'required',
            'direccion' => 'required',
            'tel_empres' => 'required',
            'tel_contacto' => 'required',
            'email' => 'required|email|unique:clientes,email',
            'ciudad' => 'required',
        ];
    }

    public function messages(){
        return[
          'nit.required'   => 'El :attribute es obligatorio.',
          'nit.unique'        => 'El :attribute ya existe.',
          'razon_social.required'=> 'El :attribute es obligatorio.',
          'razon_social.unique'=> 'El :attribute ya existe.',
          'nombre_contacto.required'=> 'El :attribute es obligatorio.',
          'direccion.required'=> 'El :attribute es obligatorio.',
          'tel_empres.required'=> 'El :attribute es obligatorio.',
          'tel_contacto.required'=> 'El :attribute es obligatorio.',
          'email.required'=> 'El :attribute es obligatorio.',
          'email.email'=> 'Este :attribute no es valido.',
          'email.unique'=> 'El :attribute ya existe.',
          'ciudad'=> 'El :attribute es obligatorio.',
  
  
        ];

    }

    

    public function attributes(){
        return[
          'nit'=>'Nit',
          'razon_social'=>'Razon Social',
          'nombre_contacto'=>'Nombre de contacto',
          'direccion'=>'Direccion',
          'tel_empres'=>'telefono de empresa',
          'tel_contacto'=>'telefono de contacto',
          'email'=>'correo electronico',
          'ciudad'=>'ciudad',
        ];
  
      }
}
