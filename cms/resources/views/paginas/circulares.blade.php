@extends('plantilla')
@section('content')

<div class="content-wrapper" style="min-height: 159px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Circulares</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio /</a><li>
              <li class="breadcrumb-item active">Circulares</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#crearCircular">Cargar Nueva Circular</button>


              </div>
              <div class="card-body">

                 {{-- @foreach ($circulares as $element)
                  {{ $element }}
                @endforeach --}}
               

                <table class="table table-bordered table-striped dt-responsive" id="tablaCirculares" width="100%">
                  <thead>
                    <tr>
                      
                      <th width="10px">#</th>
                      <th>Num</th>
                      <th>Acro</th>
                      <th>Año</th>
                      <th>Tema</th>
                      <th>Caracter</th>
                      <th>Extracto</th>
                      <th>Fecha</th>
                      <th>Accion</th>
                        
                    </tr>
                  </thead>

                  <tbody>
                  </tbody>

                </table>

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

<div class="modal" id="crearCircular">
  <div class="modal-dialog">
    <div class="modal-content">

      <form action="{{url('/')}}/circulares" method="post" enctype="multipart/form-data">
      @csrf

        <div class="modal-header bg-info">
          <h4 class="modal-title">Nueva Circular</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center">Toda la escritura la debe hacer en mayuscula por favor!!!</h5>
          
          {{-- DENOMINACION --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="denominacion_circulares" placeholder="Ingrese CIR" value="{{old("denominacion")}}" required maxlength="3">
          </div>

           {{-- AÑO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-calendar"></i>
            </div>
            <input type="text" class="form-control anio_circulares" name="anio_circulares" placeholder="Ingrese Año" value="{{old("anio")}}" required maxlength="4">
          </div>

          {{-- NUMERO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control numero_circulares" name="numero_circulares" placeholder="Ingrese el Numero (tres digitos obligatorios)" value="{{old("numero")}}" minlength="3"  maxlength="3" required >
          </div>
		  
		  
          {{-- ACRONIMO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="acronimo_circulares" placeholder="Ingrese ALG o AJYCLG" value="{{old("acronimo")}}" required>
          </div>


          {{-- TEMA GENERAL --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="temageneral_circulares" placeholder="Ingrese el Tema" value="{{old("temageneral")}}" required>
          </div>

          {{-- CARACTER --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="caracter_circulares" placeholder="Ingrese URGENTE o INFORMATIVA" value="{{old("caracter")}}" required maxlength="11">
          </div>

        
		{{-- EXTRACTO --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-pencil-alt"></i>
            </div>
            <input type="text" class="form-control" name="extracto_circulares" placeholder="Ingrese un Extracto" value="{{old("extracto")}}" required maxlength="300">
          </div>
		  
		  
		   {{-- FECHA DE EMISION --}} 
              
             <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-list-ul"></i>
                </div>
                  <input type="date" class="form-control" name="fechaemision_circulares" placeholder="Ingrese la fecha de Emision" value="{{old("fechaemision")}}" required maxlength="15">
              </div>
			  
			  
		   
          <hr class="pb-2">

           {{-- PDF --}}
          <div class="input-group mb-3">
            <div class="input-group-append input-group-text">
              <i class="fas fa-link"></i>
            </div>

          <input type="file" name="rutapdf_circulares" size="30" value="{{old("rutapdf")}}">
          
         
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



<!--=============================================-->

@if(Session::has("ok-crear"))
    <script>
      notie.alert({type: 1, text: "¡La circular ha sido creada correctamente!", time: 5})
    </script>

@endif

@if(Session::has("error"))
    <script>
      notie.alert({type: 3, text: "¡Error en el gestor de categorías!", time: 5})
    </script>

@endif

@if(Session::has("error-pdf"))
    <script>
      notie.alert({type: 3, text: "¡Error, no se pudo cargar el PDF!", time: 5})
    </script>

@endif


@endsection

