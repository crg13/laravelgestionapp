<?php

namespace App\Http\Controllers;

use App\Sedecliente;
use Illuminate\Http\Request;

use App\Http\Requests\ValidarSedeRequest;
use App\Cliente;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SedeclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sedesxcliente= DB::table('sedes_cliente')->where('cliente_id', $id);

        return view('clientes.crearsede');
    }

    /**
     * Display a listing of the sedes .
     *
     * @return \Illuminate\Http\Response
     */
    public function sedes($id)
    {
        //
        $sedesxcliente= DB::table('sedes_cliente')->where('cliente_id', $id)->get();

        $cliente=DB::table('clientes')->where('id', $id)->get();
      //  dd($cliente);

        return view('sedescliente.index',compact('sedesxcliente', 'cliente'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
       $cliente=DB::table('clientes')->where('id', $id)->get();

        //dd($cliente);

        return view('sedescliente.crearsede', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarSedeRequest $request)
    {
        //
           $input = $request->all();

           $id = $input['cliente_id'];
           //dd($input);

          $sede= Sedecliente::create($input);
           $sede->save;

            return redirect()->route('sedecliente.sedes', $id)->with('success','Registro creado satisfactoriamente');


      }


    /**
     * Display the specified resource.
     *
     * @param  \App\Sedecliente  $sedecliente
     * @return \Illuminate\Http\Response
     */
    public function show(Sedecliente $sedecliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sedecliente  $sedecliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedecliente $sedecliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sedecliente  $sedecliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sedecliente $sedecliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sedecliente  $sedecliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sedecliente $sedecliente)
    {
        //
    }
}
