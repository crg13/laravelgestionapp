<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarEquipoRequest extends FormRequest
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
            'serial' => 'required',
            'marca' => 'required',
            'tipo_equipo' => 'required',
            'contador'=>'require',
            'id_tecnico'=>'require',
        ];
    }

    public function messages(){

      return[

          'serial.require' => 'Ingresar :attribute, es obligatorio',
          'marca.requiere'=> 'La :attribute es obligatorio',
          'tipo_equipo.require'=>'El :attribute es obligatorio',
          'contador.require'=> 'El :attribute es obligatorio',
          'id_tecnico'=>'El :attribute es obligatorio',

      ];

    }


    public function attributes(){

      return[

        'serial'=>'Serial',
        'marca'=>'Marca',
        'tipo_equipo'=>'Tipo de equipo',
        'contador'=>'Contador',
        'id_tecnico'=>'Nombre del tecnico',



      ];

    }
}
