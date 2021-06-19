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




        <div class="card">
            <div class="card-header">
              Crear Cliente

            </div>
            <div class="card-body">
              <!-- Extended material form grid -->
            <form class="form-horizontal" method="POST" action="{{route('clientes.store')}}">
            {{ csrf_field() }}
            <!-- Grid row -->
            <div class="form-row">
                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputNitl">Ingresar NIT</label>
                    <input type="text" class="form-control" id="inputNit" name="nit" placeholder="NIT" value="{{ old('nit')}}"  required >

                    @if ($errors->has('nit'))
                        <small class="form-text text-danger">
                            {{ $errors->first('nit') }}
                        </small>
                    @endif

                </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputRazonSocial">Ingresar Razon Social o Nombre</label>
                    <input type="text" class="form-control" id="inputRazonSocial" name="razon_social" placeholder="RazonSocial"  value="{{ old('razon_social')}}" required>

                    @if ($errors->has('razon_social'))
                        <small class="form-text text-danger">
                            {{ $errors->first('razon_social') }}
                        </small>
                    @endif
                </div>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputNombreContacto">Nombre del contacto</label>
                    <input type="text" class="form-control" id="inputNombreContacto" name="nombre_contacto" placeholder="NombreContacto"  value="{{ old('nombre_contacto')}}" required>

                    @if ($errors->has('nombre_contacto'))
                        <small class="form-text text-danger">
                            {{ $errors->first('nombre_contacto') }}
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
                    <label for="inputDireccion">Ingresar Direccion</label>
                    <input type="text" class="form-control" id="inputDireccion" name="direccion" placeholder="tipoDireccion" value="{{ old('direccion')}}" required>

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
                    <label for="inputTelefonoContacto">Ingresar telefono de contacto</label>
                    <input type="text" class="form-control" id="inputTelefonoContacto" name="tel_contacto" placeholder="TelefonoContacto" value="{{ old('tel_contacto')}}" required>

                    @if ($errors->has('tel_contacto'))
                    <small class="form-text text-danger">
                        {{ $errors->first('tel_contacto') }}
                    </small>
                @endif


                </div>
                </div>
                <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-md-4">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputTelefonoEmp">Ingresar telefono de la empresa</label>
                    <input type="text" class="form-control" id="inputTelefonoEmp" name="tel_empres" placeholder="TelefonoEmp" value="{{ old('tel_empres')}}" required>

                    @if ($errors->has('tel_empres'))
                    <small class="form-text text-danger">
                        {{ $errors->first('tel_empres') }}
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
                <div class="col-md-6">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputEmail">Correo electronico</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Correo electronico" value="{{ old('email')}}" required>

                    @if ($errors->has('email'))
                    <small class="form-text text-danger">
                        {{ $errors->first('email') }}
                    </small>
                @endif

                </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-6">
                <!-- Material input -->
                <div class="md-form form-group">
                    <label for="inputCiudad">Ciudad o municipio</label>
                    <input type="text" class="form-control" id="inputCiudad" name="ciudad" placeholder="Ciudad o municipio" value="{{ old('ciudad')}}" required>

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
            <button type="submit" class="btn btn-primary btn-md">Crear cliente</button>
            </form>



<!-- Extended material form grid -->
            </div>
         </div>

      </div>
      <div class="col-md-2"></div>
  </div>
@stop
