@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2">


    </div>

    <div class="col-md-8">



        <br>
        <br>


        @if(session('success'))
    			<div class="alert alert-info">
    				{{Session('success')}}
    			</div>
    		@endif



        <a href="{{url("/clientes")}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Volver</a>
        <br> <br>
        <div class="card">
            <div class="card-header">
              Ingresar sede

            </div>
            <div class="card-body">
              @foreach ($cliente as $item)
                <h5 class="card-title">Empresa: {{$item->razon_social}}</h5>
                <p class="card-text">Nit: {{$item->nit}}</p>
              @endforeach

              <!-- Extended material form grid -->
            <form class="form-horizontal" method="POST" action="{{route('sedescliente.store')}}">
            {{ csrf_field() }}
            <!-- Grid row -->
            <div class="form-row">
              @foreach ($cliente as $item)
                <input id="cliente_id"name="cliente_id" type="hidden" value="{{$item->id}}">
              @endforeach

                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                    <div class="md-form form-group">
                        <label for="inputSedelugar">Nombre de la sede</label>
                        <input type="text" class="form-control" id="inputSedelugar" name="sede_lugar" placeholder="Sede"  value="{{ old('sede_lugar')}}" required>

                        @if ($errors->has('sede_lugar'))
                            <small class="form-text text-danger">
                                {{ $errors->first('sede_lugar') }}
                            </small>
                        @endif
                    </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputDireccion">Ingresar Direccion</label>
                    <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="Direccion"  value="{{ old('direccion')}}" required>

                    @if ($errors->has('direccion'))
                        <small class="form-text text-danger">
                            {{ $errors->first('direccion') }}
                        </small>
                    @endif


                </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputCiudad">Ciudad</label>
                    <input type="text" class="form-control" id="inputCiudad" name="ciudad" placeholder="Ciudad" value="{{ old('ciudad')}}" required>

                    @if ($errors->has('ciudad'))
                    <small class="form-text text-danger">
                        {{ $errors->first('ciudad') }}
                    </small>
                @endif


                </div>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->




            <button type="submit" class="btn btn-primary btn-md">Ingresar Sede</button>
            </form>



<!-- Extended material form grid -->
            </div>
      </div>

      </div>
      <div class="col-md-2"></div>
    </div>
@stop
