@extends('plantilla')
@section('content')

<div class="content-wrapper" style="min-height: 159px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Organismos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio /</a><li>
              <li class="breadcrumb-item active">Organismos</li>
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
                
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#crearOrganismo">Cargar Nuevo Organismo</button>


              </div>
              <div class="card-body">
               
               {{--  @foreach ($organismos as $element)
                  {{ $element }}
                @endforeach --}}

                  <table class="table table-bordered table-striped dt-responsive" id="tablaOrganismos" width="100%">
                  <thead>
                    <tr>
                      
                      <th width="10px">#</th>
                      <th>Nombre</th>
                      <th>Acronimo</th>
                      <th>Acciones</th>
                        
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



<!--=============================================-->

@if(Session::has("ok-crear"))
    <script>
      notie.alert({type: 1, text: "¡La categoria ha sido creada correctamente!", time: 5})
    </script>

@endif

@if(Session::has("error"))
    <script>
      notie.alert({type: 3, text: "¡Error en el gestor de categorías!", time: 5})
    </script>

@endif


@endsection