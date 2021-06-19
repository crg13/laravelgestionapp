@extends('layouts.app')

@section('content')
  <style type="text/css">

  td.details-control {
      background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
      cursor: pointer;
  }
  tr.shown td.details-control {
      background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
  }
</style>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-1">

        </div>

        <div class="col-md-10">

            <br>

            @if(session('success'))

          <div class="alert alert-info">
            {{Session('success')}}
          </div>
        @endif

           <div class="row">
             <div class="col-md-10">
             </div>
             <div class="col-md-2">
               <a role="button" href="{{route('equipos.create')}}" class="btn btn-primary btn-sm btn-block" aria-pressed="true"> crear activo</a>
             </div>
           </div>
           <br>

      <div class="table">

        <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>">
            <table class="table" id="indexEquipos" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Serial</th>
                        <th>Activo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Tipo de Equipo</th>
                        <th>contador</th>
                        <th>Fecha de Mtto</th>
                        <th>Nombre de tecnico</th>
                        <th>Observciones</th>
                        <th>Otro mnto</th>
                        <th>estado</th>
                        <th>instalar equipo</th>
                        <th>editar estado</th>


                    </tr>
                </thead>
                <tbody>

                        @foreach ($equipos as $item)
                            <tr>
                                <td class="details-control" data-agencies='["agency22", "agency33","agency17","agency89"]'  width="2%"></td>
                                <td>{{$item->serial}}</td>
                                <td>{{$item->id}}</td>
                                <td>{{$item->marca}}</td>
                                <td>{{$item->modelo}}</td>
                                <td>{{$item->tipo_equipo}}</td>
                                <td>{{$item->contador}}</td>
                                <td>{{$item->fecha_mnto}}</td>
                                <td>{{$item->id_tecnico}}</td>
                                <td>{{$item->observaciones}}</td>
                                
                                <td>  
                                    @if(isset($item->otromnto))
                                      @php
                                      $a=json_decode($item->otromnto);
                                      @endphp

                                      @foreach ($a as $value)
                                        <b>fecha:</b> {{$value->fecha}},<b> Tecnico: </b> {{$value->tecnico}} <br>
                                      @endforeach                                                                                                                                                                     
                                    
                                        
                                    @endif

                                    

                                    
                                </td>
                                
                                @php
                                    $w=$item->estado;
                                @endphp

                                @switch($w)
                                    @case("EN STOCK")
                                        <td ><span class="badge badge-success">EN STOCK</span></td>
                                      @break
                                    @case("DE BAJA")
                                    <td ><span class="badge badge-dark">DE BAJA</span></td>
                                    @break
                                    @case("RETIRADO")
                                    <td ><span class="badge badge-danger">RETIRADO</span></td>
                                    @break
                                    @case("EN SERVICIO")
                                    <td ><span class="badge badge-primary">EN SERVICIO</span></td>
                                    @break

                                    @default
                                    <td ><span class="badge badge-danger">---</span></td>
                                        
                                @endswitch
                                <!--href="{url('equipos/instalar', $item->serial)}}"  -->
                                <td style="text-align: center;"><a  href="{{url('instalarEquipo/create', $item->serial)}}"><img aling="center" src="{{asset('imagen/plus-add.png')}}" /></a></td>
                                <td><a href="{{route('equipos.edit', $item->serial)}}"> editar </a></td>
                              </tr>
                        @endforeach




                </tbody>

            </table>


         </div>
      </div>

        <div class="col-md-1">

        </div>
    </div>
</div>

@endsection
