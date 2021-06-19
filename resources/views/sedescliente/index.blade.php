@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-2">
    </div>

    <div class="col-md-8">

        <br><br><br>

          @if(session('success'))
            <div class="alert alert-info">
              {{Session('success')}}
            </div>
          @endif



            <h4 class="card-title">Empresa: {{$cliente[0]->razon_social}} </h4>

            <p class="card-text">Nit: {{$cliente[0]->nit}}</p>


          <div class="table-responsive">

          <table class="table" id="example" >
              <thead>
                  <tr>
                      <th>Nombre</th>
                      <th>Direccion </th>
                      <th>Ciudad</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($sedesxcliente as $value)
                  <tr>
                    <td>{{$value->sede_lugar}}</td>
                    <td>{{$value->direccion}}</td>
                    <td>{{$value->ciudad}}</td>
                  </tr>
                @endforeach
              </tbody>

          </table>


        </di>




      </div>




  </div>

  <div class="col-md-2">
  </div>

@stop
