@extends('plantilla')
@section('content')

<div class="content-wrapper" style="min-height: 159px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dictamenes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio /</a><li>
              <li class="breadcrumb-item active">Dictamenes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#crearDictamen">Cargar Nuevo Dictamen</button>


              </div>
              <div class="card-body">

                  <table class="table table-bordered table-striped dt-responsive" id="tablaDictamenes" width="100%">
                  <thead>
                    <tr>
                      
                      <th width="10px">#</th>
                      <th>Num</th>
                      <th>Acro</th>
                      <th>Año</th>
                      <th>Tema</th>
                      <th>Organismo</th>
                      <th>Voces</th>
                      <th>Referencia</th>
                      <th>Normativo</th>
                      <th>Extracto</th>
                      <th>Fecha Carga</th>
                      <th>Fecha Sanción</th>
                      <th>Usuario</th>
                      <th>Accion</th>
                        
                    </tr>
                  </thead>

                  <tbody>
                  </tbody>

                </table>


                </ul>
             
              </div>
              
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
</div>


<!-- ===============================================
  Nueva Circular
 =================================================-->

<div class="modal" id="crearDictamen">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="{{url('/')}}/dictamenes" method="post" enctype="multipart/form-data">
      @csrf

        <div class="modal-header bg-info">
          <h4 class="modal-title">Nuevo Dictamen</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center">Toda la escritura la debe hacer en mayuscula por favor!!!</h5>
          
          {{-- DENOMINACION --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="denominacion_dictamen" placeholder="Ingrese DIC" value="{{old("denominacion")}}" required maxlength="3">
          </div>

          {{-- AÑO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-calendar"></i>
            </div>
            <input type="text" class="form-control anio_dictamen" name="anio_dictamen" placeholder="Ingrese Año" value="{{old("anio")}}" required maxlength="4">
          </div>

          {{-- NUMERO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control numero_dictamen" name="numero_dictamen" placeholder="Ingrese el Numero, tres digitos (si es 1 debe ser 001)" value="{{old("numero")}}"  required maxlength="3">
          </div>

          {{-- ACRONIMO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="acronimo_dictamen" placeholder="Ingrese ALG o AJYCLG" value="{{old("acronimo")}}" required>
          </div>   

          {{-- TEMA GENERAL --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="temageneral_dictamen" placeholder="Ingrese el Tema" value="{{old("temageneral")}}" required>
          </div>

           {{-- ORGANISMO --}}
          <div class="input-group mb-lg-3 text-center">
            <select class="browser-default" id="organismo" name="orgproviene_dictamen" style="width: 100%">
              @foreach ($organismos as $element)
               <option name="organismo" value="{{ $element['nombre'] }}">
                {{ $element['nombre'] }}</option>
              @endforeach 
            </select>
            <div>
              <p>En el caso de no enconcontrar el organismo agregalo!</p>
              <button class="btn btn-dark" data-toggle="modal" data-target="#crearOrganismo">Crear Organismo</button>
            </div>              
          </div>

          {{-- VOCES --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="voces_dictamen" placeholder="Voces" value="{{old("voces")}}" required >
          </div>

           {{-- REFEXPEDIENTE --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="refexpediente_dictamen" placeholder="Expediente de Referencia" value="{{old("refexpediente")}}" required maxlength="30">
          </div>

           {{-- LEYES --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="leyes_dictamen" placeholder="Normativos" value="{{old("leyes")}}" required>
          </div>


         {{-- EXTRACTO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <textarea type="text" class="form-control" name="extracto_dictamen" placeholder="Ingrese resumen del dictamen" value="{{old("extracto")}}" required maxlength="300"></textarea>
          </div>

          {{-- FECHA DE SANCION --}} 
              
             <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-list-ul"></i>
                </div>
                  <input type="date" class="form-control" name="fechasancion_dictamen" placeholder="Ingrese la fecha de Sanción" value="{{old("fechasancion")}}" required maxlength="15">
              </div>



          <hr class="pb-2">

           {{-- PDF --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-link"></i>
            </div>
          <input type="file" name="rutapdf_dictamen" size="30" value="{{old("rutapdf")}}">     
        </div>

        </div>


        <div class="modal-footer d-felx justify-content-between">
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          <div>
            <button type="submit" class="btn btn-dark">Guardar</button>
          </div>  
            
        </div>
      </form>
    </div>
  </div>
  
</div>

<!-- ===============================================
  Nuevo Organismo
 =================================================-->

<div class="modal" id="crearOrganismo">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="{{url('/')}}/organismos" method="post" enctype="multipart/form-data">
      @csrf

        <div class="modal-header bg-info">
          <h4 class="modal-title">Nuevo Organismo</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center">Toda la escritura la debe hacer en mayuscula por favor!!!</h5>
          
          {{-- Nombre --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="nombre_organismo" placeholder="Ingrese el Organismo" value="{{old("nombre")}}" required maxlength="50">
          </div>


          {{-- ACRONIMO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="acronimo_organismo" placeholder="Ingrese las Siglas" value="{{old("acronimo")}}" required>
          </div>

          <hr class="pb-2">

        </div>

        <div class="modal-footer d-felx justify-content-between">
          <div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
          <div>
            <button type="submit" class="btn btn-dark">Guardar</button>
          </div>  
            
        </div>
      </form>

    </div>
  </div>
  
</div>

<script>
/*=============================================
   Evitar repetir dictamenes
 =============================================*/
$(document).on("change", ".numero_dictamen", function(){

	$(".alert").remove();

	 var valorNumero = $(this).val();
	 var validarNumero = $(".validarNumero");
	 var valorAnio= $(".anio_dictamen").val();
	 //console.log("valorAnio", valorAnio);
	 var validarAnio = $(".validarAnio");
	
	 
	for(var i = 0; i < validarAnio.length; ++i ){
	
	//console.log($(validarAnio[i]).html());

	 	if($(validarAnio[i]).html() == valorAnio){
				
				for(var i = 0; i < validarNumero.length; ++i ){
					
					//console.log($(validarNumero[i]).html());
					
						if($(validarNumero[i]).html() == valorNumero && $(validarAnio[i]).html() == valorAnio){

							$(".numero_dictamen").val("");
							$(".numero_dictamen").parent().after(`

									<div class="alert alert-danger">¡Error! Este Nuemero de Dictamen ya existe para el Año especificado.</div>

							     `)
						}
					}
			
	 		}

		 }

})

</script>

@if(Session::has("ok-crear"))
    <script>
      notie.alert({type: 1, text: "¡El Dictamen se ha cargado correctamente!", time: 5})
    </script>

@endif

@if(Session::has("error"))
    <script>
      notie.alert({type: 3, text: "¡Error en el gestor de Dictamenes!", time: 5})
    </script>

@endif


@endsection

