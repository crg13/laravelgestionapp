@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-2">


        <div  id="aux">

        </div>

    </div>

    <div class="col-md-8">


        <br><br><br>

        @if(session('success'))

    			<div class="alert alert-info">
    				{{Session('success')}}
    			</div>
    	@endif






        <div class="card">
            <div class="card-header">
                Editar datos
            </div>
            <div class="card-body">
              <!-- Extended material form grid -->
            <form class="form-horizontal" method="POST" action="{{route('equipos.editarEstado')}}">
            {{ csrf_field() }}
            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-2">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputNitl">Ingresar Serial</label>
                    <input type="text" class="form-control" id="inputSerial" name="serial" placeholder="SERIAL" value="{{ $equipo->serial}}"  required >

                    @if ($errors->has('serial'))
                        <small class="form-text text-danger">
                            {{ $errors->first('serial') }}
                        </small>
                    @endif

                </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputMarca">Marca</label>
                    <input type="text" class="form-control" id="inputMarca" name="marca" placeholder="Marca"  value="{{ $equipo->marca}}" required>

                    @if ($errors->has('marca'))
                        <small class="form-text text-danger">
                            {{ $errors->first('marca') }}
                        </small>
                    @endif
                </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3">
                    <!-- Material input -->
                    <div class="md-form form-group">
                        <label for="inputModelo">Modelo</label>
                        <input type="text" class="form-control" id="inputModelo" name="modelo" placeholder="Modelo"  value="{{ $equipo->modelo}}" required>

                        @if ($errors->has('modelo'))
                            <small class="form-text text-danger">
                                {{ $errors->first('modelo') }}
                            </small>
                        @endif


                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="md-form form-group">
                        <label for="exampleFormControlSelect1">Tipo de equipo</label>

                        @php
                        
                            $tipoEquipo= array('impresora','multifuncional','impresoraTermica', 'escaner','computador','pcPortatil','fotocopiadora');
                           
                        @endphp

                        
                              <select class="form-control" id="exampleFormControlSelect1" name="tipo_equipo" required>
                                  @foreach ($tipoEquipo as $item)
                                  <option value="{{$item}}"
                                  @if ($item==  $equipo->tipo_equipo)
                                      selected= "selected"
                                  @endif
                                  >{{$item}}</option>
                                  @endforeach
                                
      
                              </select>
      
      
                    </div>

                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-3">
                <!-- Material input -->
                    <div class="md-form form-group">
                        <label for="inputEstado">Estado</label>
                        @php
                                $estados= array('RETIRADO','EN STOCK','EN SERVICIO', 'DE BAJA');
                            @endphp
                            
                            <select class="form-control" name="estado" id="estado">
                                @foreach ($estados as $item)
                                <option value="{{$item}}"
                                @if ($item==  $equipo->estado)
                                    selected= "selected"
                                @endif
                                >{{$item}}</option>
                                @endforeach
                            </select>
                        @if ($errors->has('id_tecnico'))
                        <small class="form-text text-danger">
                            {{ $errors->first('id_tecnico') }}
                        </small>
                        @endif


                    </div> 
                </div>
                <!-- Grid column -->

              <!-- Grid column -->
              <div class="col-md-4">
                  <!-- Material input -->
                  <div class="md-form form-group">
                      <label for="inputNombreTecnico">Nombre de tecnico</label>
                      <input type="text" class="form-control" id="inputNombreTecnico" name="id_tecnico" placeholder="Nombre del tecnico" value="{{ $equipo->id_tecnico}}" required>

                      @if ($errors->has('id_tecnico'))
                      <small class="form-text text-danger">
                          {{ $errors->first('id_tecnico') }}
                      </small>
                  @endif


                  </div>
              </div>
              <!-- Grid column -->


              <!-- Grid column -->
              <div class="col-md-2">
              <!-- Material input -->
              <div class="md-form form-group">
                  <label for="inputContador">contador</label>
                  <input type="int" class="form-control" id="inputContador" name="contador" placeholder="contador" value="{{ $equipo->contador}}" required>

                  @if ($errors->has('contador'))
                  <small class="form-text text-danger">
                      {{ $errors->first('contador') }}
                  </small>
              @endif

              </div>
              </div>
              <!-- Grid column -->

            </div>
            <!-- Grid row -->


            <div class="form-row">
              <!-- Grid column -->
              <div class="col-md-6">
              <!-- Material input -->
              <div class="md-form form-group">
                  <label for="inputObservaciones">Observaciones</label>
                <textarea rows="3", cols="54" id="Observacion" name="observaciones" style="resize:none, "></textarea>

                  @if ($errors->has('observaciones'))
                  <small class="form-text text-danger">
                      {{ $errors->first('observaciones') }}
                  </small>
              @endif

              </div>
              </div>
              <!-- Grid column -->


            </div>


            <button  type="submit" class="btn btn-primary btn-md">Editar</button>
            </form>



<!-- Extended material form grid -->
            </div>
      </div>

      </div>
      <div class="col-md-2"></div>
    </div>
@stop
