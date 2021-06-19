@extends('layouts.app')

@section('content')

      @php
         //  dd($equipo);
      @endphp



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
        <span>Instalar equipo</span>
          <br>
          <br>
         

          <form >
            {{ csrf_field() }}
            <div class="form-group row">
              <label for="staticActivo" class="col-sm-2 col-form-label">Activo:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticActivo" value="numActivo">
              </div>
            </div>

             <div class="form-group row">
              <label for="staticSerial" class="col-sm-2 col-form-label">Serial:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticSerial" value="numSerial">
              </div>
            </div>
           
             <div class="form-group row">
              <label for="staticEquipo" class="col-sm-2 col-form-label">Equipo:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticActivo" value="numEquipo">
              </div>
            </div>
           
             <div class="form-group row">
              <label for="staticReferencia" class="col-sm-2 col-form-label">Referencia:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="staticActivo" value="numReferencia">
              </div>
            </div>
                     
           <div class="form-group row">
              <label for="staticEmpresa" class="col-sm-2 col-form-label">Empresa:</label>

              <div class="col-sm-10">
                <div class="input-group ">
                <input type="text" class="form-control" id="nombreEmp" placeholder="nombre de la empresa" aria-label="nombreemp" aria-describedby="basic-addon1">
                <span class="input-group-text" id="buscarSedes">sedes</span>
                </div>                
                <div id="emp_list" class="listaEmp"></div> 
                 
              </div>
           </div>

           <div class="form-group row">
            <label id="encabezado"></label>
             <div id="sedes_list" class="listasedes">
               
            </div>
             
           </div>



           <button  type="submit" class="btn btn-outline-info btn-md">Instalar equipo</button>
          </form>


          

    </div>

      <div class="col-md-2"></div>
  </div>
 <script src="{{asset('jquery-ui-1.12.1/jquery-ui.js')}}"></script>
  <script>
  $(document).ready(function () {
             
             $('#nombreEmp').on('keyup',function() {
              var query = $(this).val(); 

              
                 
                        // alert( query );
                        $.ajax({
                                  
                                  url:"{{ route('instalarEquipo.search') }}",
                            
                                  type:"GET",
                                  
                                  data:{'cliente':query},
                                  
                                  success:function (data) {
                                    
                                      $('#emp_list').html(data);

                                      
                                  }
                              })
                          // end of ajax call
                          
                  

              
              //$('#emp_list').html(query);

             });


             $(document).on('click', '.nameEmp', function(){
                  
                  var value = $(this).text();
                  $('#nombreEmp').val(value);
                  $('.listEmp').html("");
              });


              $(document).on( 'click','#buscarSedes', function(){

                

                var query = $('#nombreEmp').val(); 
                //alert(query);
                 $.ajax({
                                  
                                  url:"{{ route('instalarEquipo.indexSedes') }}",
                            
                                  type:"GET",
                                  data:{'cliente':query},

                                  success:function (data) {
                                      // alert(data);

                                      $('#encabezado').text("Sedes:");
                                      $('#sedes_list').html(data);

                                      
                                  }
                              })
                          // end of ajax call

              });

  });       
  </script>

@endsection
