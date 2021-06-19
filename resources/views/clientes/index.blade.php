@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <div class="col-md-1"></div>

        <div class="col-md-10">

            <br>

           <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                <a role="button" href="{{route('clientes.create')}}" class="btn btn-primary btn-sm btn-block" aria-pressed="true"> crear cliente</a>
                </div>
            </div>
                <br>

            <div class="table-responsive">


                <table class="table" id="example" >
                    <thead>
                        <tr>
                            <th>Nit</th>
                            <th>Razon Social</th>
                            <th>Nombre de contacto</th>
                            <th>Dirección</th>
                            <th>Telefono de contacto</th>
                            <th>Telefono de empresa</th>
                            <th>Correo electronico</th>
                            <th>adicionar sede</th>
                            <th>mostrar sedes</th>
                            <th>editar cliente</th>
                            <th>eliminar cliente</th>
                            
                            

                            
                            


                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($clientes as $item)
                                <tr>
                                    <td>{{$item->nit}}</td>
                                    <td>{{$item->razon_social}}</td>
                                    <td>{{$item->nombre_contacto}}</td>
                                    <td>{{$item->direccion}}</td>
                                    <td>{{$item->tel_contacto}}</td>
                                    <td>{{$item->tel_empres}}</td>
                                    <td>{{$item->email}}</td>
                                    <td style="text-align: center;"> <a href="{{ route('sedecliente.create', $item->id) }}"  ><img aling="center" src="{{asset('imagen/plus-add.png')}}" alt="adicionar" /></a> </td>
                                    <td style="text-align: center;"> <a href="{{ route('sedecliente.sedes', $item->id) }}"  ><img aling="center" src="{{asset('imagen/plus-add.png')}}" alt="adicionar" /></a> </td>
                                    <td><a href="#">editar</a></td>
                                    <td><a href="#">eliminar</a></td>                                  
                                </tr>
                            @endforeach




                    </tbody>

                </table>


            
            </div>

        </div>  
    </div>
</div>

@endsection
