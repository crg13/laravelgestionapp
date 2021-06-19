<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Cliente;
use App\Sedecliente;

use App\Sedeinstalacion;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SedeinstalacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($serial)
    {
        
       // dd($serial);
        $equipo = DB::table('equipos')->where('serial', $serial)->first() ;
      //dd($equipo);
      return view('equipos.instalar', compact('equipo',$equipo)) ;
    }



    public function search(Request $request){
        

      //dd($request);
      if($request->ajax()) {
        
          $data = Cliente::where('razon_social', 'LIKE', $request->cliente.'%')
              ->get();
         
          $output = '';
         
          if (count($data)>0) {
            
              $output = '<ul class="list-group listEmp" style="display: block; position: relative; z-index: 1">';
            
              foreach ($data as $row){
                 
                  $output .= '<li class="list-group-item nameEmp">'.$row->razon_social.'</li>';
              }
            
              $output .= '</ul>';
          }
          else {
           
              $output .= '<li class="list-group-item">'.'No results'.'</li>';
          }
         
          return $output;
      }
    }

    public function listarSedes(Request $request){
        
            
      //dd($request);
            $aux= $request->cliente;
      
            # code...

            $cliente = DB::table('clientes')->where('razon_social', $aux)->first() ;
                      
            $idcliente = $cliente->id;

            $data = Sedecliente::where('cliente_id', $idcliente)->get();
              
         
            $output = '';
         
            if (count($data)>0) {
                
                $output = '<ul class="list-group listSedes" style="display: block; position: relative; z-index: 1">';
                
                foreach ($data as $row){
                    
                    $output .= '<li class="list-group-item nameSedes">'.$row->sede_lugar.'</li>';
                }
                
                $output .= '</ul>';
            }
            else {
            
                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }
            
          return $output;
            
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sedeinstalacion  $sedeinstalacion
     * @return \Illuminate\Http\Response
     */
    public function show(Sedeinstalacion $sedeinstalacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sedeinstalacion  $sedeinstalacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sedeinstalacion $sedeinstalacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sedeinstalacion  $sedeinstalacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sedeinstalacion $sedeinstalacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sedeinstalacion  $sedeinstalacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sedeinstalacion $sedeinstalacion)
    {
        //
    }
}
