<?php

namespace App\Http\Controllers;


use Carbon\Carbon;

use App\Equipo;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;



class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          $equipos=DB::table('equipos')->get();

          //dd($equipos);

        return view('equipos.index', compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //$equipo=DB::table('equipos')->where('id', $activo)->get();
      return view('equipos.crear');
    }





   

    public function autocompletar(Request $request){

      $data = Cliente::select("razon_social")->where("razon_social","LIKE", "%{$request->query}%")->get();

      return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $date = Carbon::now();
        $date = $date->format('Y-m-d');
        //dd($date);

        $input= $request->all();
        //dd($input);

        $serial= $input['serial'];

        //dd($serial);

        $auxserial = DB::table('equipos')->where('serial', $serial)->first() ;

       //dd($auxserial);

        if (isset($auxserial->serial)) {
          // code...
      //  dd($auxserial);
        return redirect()->route('equipos.create')->with(['message'=>$auxserial] )->withinput($input);

        }else{

          $estado= "EN STOCK";

          $auxcreate= new Equipo;

          $auxcreate->serial = $input['serial'];
          $auxcreate->marca = $input['marca'];
          $auxcreate->modelo = $input['modelo'];
          $auxcreate->tipo_equipo = $input['tipo_equipo'];
          $auxcreate->contador = $input['contador'];
          $auxcreate->fecha_mnto = $date;
          $auxcreate->id_tecnico = $input['id_tecnico'];
          $auxcreate->observaciones = $input['observaciones'];
          $auxcreate->estado=$estado;
         // $auxcreate->otromnto = $input['otromnto'];


        //  dd($auxcreate);

          //  $equipo= Equipo::create($auxcreate);
          // dd($equipo);
           $auxcreate->save();
            $activo= DB::select('select * from equipos where serial = ?', [$serial]);
          //  dd($activo);
             return redirect()->route('equipos.index')->with('success','Registro creado satisfactoriamente');


           }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $equipo = DB::table('equipos')->where('serial', $id)->first() ;

        //dd($equipo);

        return view('equipos.editar', compact('equipo', $equipo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function editarEstado(Request $request )
    {
        
        //dd($request->all());

        $inputall= $request->all();


        $equipo = DB::table('equipos')->where('serial', $inputall['serial'])->first() ;

        $id= $equipo->id;
        $cd= Equipo::find($id);   
        $cd->estado= $inputall['estado'];
        $cd->save();


        return redirect()->route('equipos.index');

    }

    public function actualizar(Request $request){
      //

      $date = Carbon::now()->setTimezone('America/Bogota');
      //dd($date);
      $date = $date->format('Y-m-d');


      $input= $request->all();
      //dd($input);

      $equipo = DB::table('equipos')->where('serial', $input['serial'])->first() ;
      //dd($equipo);

      //$aux variable de tipo string json
      $aux= $equipo->otromnto;

      // is used to decode or convert a json object to  associative array to insert date
      $aux=json_decode($aux);

      $ultimo_mnto= $equipo->fecha_mnto;
      $tecnico= $equipo->id_tecnico;
      $aux[]=['fecha'=>$ultimo_mnto, 'tecnico'=> $tecnico ];

      // al insertar un nuevo dato, es necesario codificar nuevamente a json
    //  $aux=json_encode($aux);
      //dd($aux);

      $equipo->otromnto=$aux;


      //array_push($aux , ['fecha'=>"2020-07-24", 'tecnico'=> "silomefalome" ]);
      //dd($aux);

      $equipo->fecha_mnto= $date;
      $equipo->id_tecnico=$input['id_tecnico'];
      $equipo->contador=$input['contador'];

    //  dd($equipo);

      $updatequipo= Equipo::find($equipo->id);
      //dd($updatequipo);

    //  $aux1 = json_decode($equipo->otromnto);

      $updatequipo->otromnto =$equipo->otromnto ;
      $updatequipo->id_tecnico = $equipo->id_tecnico;
      $updatequipo->contador = $equipo->contador;
      $updatequipo->fecha_mnto = $equipo->fecha_mnto;
      $updatequipo->estado = "EN STOCK";




      $updatequipo->save();

      return redirect()->route('equipos.index')->with('success','otro mantenimiento adicionado corrrectamente');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }
}
