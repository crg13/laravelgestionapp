<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarSedeRequest extends FormRequest
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
            'sede_lugar' => 'required|unique:sedes_cliente,sede_lugar',
            'direccion' => 'required',
            'ciudad' => 'required',
        ];
    }

    public function messages(){
        return[
          'sede_lugar.required'   => 'Ingresar :attribute es obligatorio.',
          'sede_lugar.unique'        => 'La :attribute ya existe.',
          'direccion.required'=> 'El :attribute es obligatorio.',
          'ciudad'=> 'El :attribute es obligatorio.',


        ];

    }



    public function attributes(){
        return[
          'sede_lugar'=>'Sede',
          'direccion'=>'Dirección',
          'ciudad'=>'Ciudad',
        ];

      }
}
