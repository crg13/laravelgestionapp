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

       @if(session('message'))

            <div class="alert alert-warning ">
              <button type="button" class="close" data-dismiss="alert">&times</button>
              Ya existe un equipo con este serial, ¿desea adicionar otro mantenimiento?
              <button type="button"  id="inputall" class="btn btn-success" name="button" data-toggle="modal" data-target="#exampleModalCenter">Sí</button>&nbsp&nbsp
              <button type="button" class="btn btn-danger" name="button" data-dismiss="alert">No</button>

      			</div>


                          <!-- Modal -->
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Otro mantenimiento</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p class="card-text lead">Activo: <strong>{{Session::get('message')->id}}</strong> <br>  Serial: <strong>{{Session::get('message')->serial}}</strong></p>
                      <p  id="marca"class="card-text lead">Equipo de tipo <strong>{{Session::get('message')->tipo_equipo}}</strong>, marca <strong>{{Session::get('message')->marca}} {{Session::get('message')->modelo }}</strong>.<br>
                        Fecha de ultimo mantenimiento: <strong>{{Session::get('message')->fecha_mnto}}</strong></p>

                      <form class="form-horizontal" method="POST" action="{{route('equipos.actualizar')}}">
                          {{ csrf_field() }}
                          <!--input hidden -->
                          <input  type='hidden' class="form-control" id="inputId" name="id"  value="{{ Session::get('message')->id}}">
                          <input  type='hidden' class="form-control" id="inputSerial" name="serial"  value="{{ Session::get('message')->serial}}">
                          <input  type='hidden' class="form-control" id="inputMarca" name="marca"  value="{{ Session::get('message')->marca}}">
                          <input  type='hidden' class="form-control" id="inputModelo" name="modelo"  value="{{ Session::get('message')->modelo}}">
                          <input  type='hidden' class="form-control" id="inputTipo_equipo" name="tipo_equipo"  value="{{ Session::get('message')->tipo_equipo}}">
                          <input  type='hidden' class="form-control" id="inputEstado" name="estado"  value="{{Session::get('message')->estado}}">

                          <!-- Grid row -->
                          <div class="form-row">

                            <!-- Grid column -->
                            <div class="col-md-6">
                                <!-- Material input -->
                                <div class="md-form form-group">
                                    <label for="inputNombreTecnico">Nombre de tecnico</label>
                                    <input type="text" class="form-control" id="inputNombreTecnico" name="id_tecnico" placeholder="Nombre del tecnico" value="{{ old('id_tecnico')}}" required>


                                </div>
                            </div>
                            <!-- Grid column -->


                            <!-- Grid column -->
                            <div class="col-md-4">
                            <!-- Material input -->
                            <div class="md-form form-group">
                                <label for="inputContador">contador</label>
                                <input type="int" class="form-control" id="inputContador" name="contador" placeholder="contador" value="{{ old('contador')}}" required>



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
                              <textarea rows="3", cols="40" id="Observacion" name="observaciones" style="resize:none, "></textarea>


                            </div>
                            </div>
                            <!-- Grid column -->


                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" >Guardar cambios</button>
                        </div>

                    </form>
                  </div>
                </div>
              </div>
        @endif




        <div class="card">
            <div class="card-header">
              Crear activo

            </div>
            <div class="card-body">
              <!-- Extended material form grid -->
                <form class="form-horizontal" method="POST" action="{{route('equipos.store')}}">
                    {{ csrf_field() }}
                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Grid column -->
                        <div class="col-md-4">
                          <!-- Material input -->
                          <div class="md-form form-group">
                              <label for="inputNitl">Ingresar Serial</label>
                              <input type="text" class="form-control" id="inputSerial" name="serial" placeholder="SERIAL" value="{{ old('serial')}}"  required >

                              @if ($errors->has('serial'))
                                  <small class="form-text text-danger">
                                      {{ $errors->first('serial') }}
                                  </small>
                              @endif

                          </div>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4">
                          <!-- Material input -->
                          <div class="md-form form-group">
                              <label for="inputMarca">Marca</label>
                              <input type="text" class="form-control" id="inputMarca" name="marca" placeholder="Marca"  value="{{ old('marca')}}" required>

                              @if ($errors->has('marca'))
                                  <small class="form-text text-danger">
                                      {{ $errors->first('marca') }}
                                  </small>
                              @endif
                          </div>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-4">
                          <!-- Material input -->
                          <div class="md-form form-group">
                              <label for="inputModelo">Modelo</label>
                              <input type="text" class="form-control" id="inputModelo" name="modelo" placeholder="Modelo"  value="{{ old('modelo')}}" required>

                              @if ($errors->has('modelo'))
                                  <small class="form-text text-danger">
                                      {{ $errors->first('modelo') }}
                                  </small>
                              @endif


                          </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->

                    <!-- Grid row -->
                    <div class="form-row">
                        <!-- Grid column -->
                        <div class="col-md-4">
                            <!-- Material input -->
                            <div class="md-form form-group">
                              <label for="exampleFormControlSelect1">Tipo de equipo</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="tipo_equipo" required>
                                      <option value="">selecciona una opcion</option>
                                      <option value="impresora">Impresora</option>
                                      <option value="multifuncional">Multifuncional</option>
                                      <option value="impresoraTermica">Impresora termica</option>
                                      <option value="escaner">Escaner</option>
                                      <option value="computador">Computador</option>
                                      <option value="pcPortatil">Pc portatil</option>
                                      <option value="fotocopiadora">Fotocopidora</option>

                                    </select>


                            </div>
                        </div>
                        <!-- Grid column -->

                      <!-- Grid column -->
                      <div class="col-md-4">
                          <!-- Material input -->
                          <div class="md-form form-group">
                              <label for="inputNombreTecnico">Nombre de tecnico</label>
                              <input type="text" class="form-control" id="inputNombreTecnico" name="id_tecnico" placeholder="Nombre del tecnico" value="{{ old('id_tecnico')}}" required>

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
                          <input type="int" class="form-control" id="inputContador" name="contador" placeholder="contador" value="{{ old('contador')}}" required>

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


                    <button  type="submit" class="btn btn-primary btn-md">Crear activo</button>
                </form>
        
         
 
            </div>
       </div>

    </div>
    <div class="col-md-2">
      
    </div>
  </div>
@stop
