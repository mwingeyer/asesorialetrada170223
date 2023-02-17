@foreach ($administradores as $element)
@if($_COOKIE["email_login"]== $element->email)
@if($element->rol == "administrador")


@extends('plantilla')
@section('content')

<div class="content-wrapper" style="min-height: 159px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administradores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio /</a><li>
              <li class="breadcrumb-item active">Administradores</li>
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
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#crearAdministrador">Crear un  nuevo Administrador</button>
              </div>
              
              <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive" width="100%" id="tablaAdministradores">
                    <thead>
                     <tr>
                       <th>#</th>
                       <th>Nombre</th>
                       <th>Correo</th>
                       <th width="75px">Foto</th>
                       <th>Rol</th>
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
      Crear Administrador
 =================================================-->
      <div class="modal" id="crearAdministrador">
        <div class="modal-dialog">
          <div class="modal-content">

          <form method="POST" action="{{ route('register') }}">
       
            @csrf
            
            <div class="modal-header bg-light">
              <h4 class="modal-title">Crear Administrador</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

              {{-- Nombre --}}
              
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-user"></i>
                </div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              {{-- Email --}}
              
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-envelope"></i>
                </div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}" required autocomplete="email" placeholder="Correo Electronico">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror 
              </div>

              {{-- Password --}}
              
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-key"></i>
                </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>

              {{-- Confirmar Password --}}
              
              <div class="input-group mb-3">
                <div class="input-group-append input-group-text">
                  <i class="fas fa-key"></i>
                </div>
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
              </div>

            </div>

            <div class="modal-footer d-flex justify-content-between">
              <div><button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button></div>
              <div><button type="submit" class="btn btn-dark">Guardar</button></div>       
            </div>
          
          </form>
          
          </div>
        </div>
      </div>

<!-- =======================================
  Editar Administrador
============================================-->
  @if(isset($status))
    @if($status == 200)
      @foreach($administrador as $key => $value)

            <div class="modal" id="editarAdministrador">
              <div class="modal-dialog">
                <div class="modal-content">

                <form method="POST" action="{{url('/')}}/administradores/{{$value["id"]}}" enctype="multipart/form-data">
                  
                  @method ('PUT')
                  @csrf
                  
                  <div class="modal-header bg-dark">
                    <h4 class="modal-title">Editar Administrador</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <div class="modal-body">

                    {{-- Nombre --}}
                    
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$value['name'] }}" required autocomplete="name" autofocus placeholder="Nombre">

                        @error('name')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{$message }}</strong>
                          </span>
                        @enderror
                    </div>

                    {{-- Email --}}
                    
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-envelope"></i>
                      </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$value['email'] }}" required autocomplete="email" placeholder="Correo Electronico">

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{$message }}</strong>
                          </span>
                        @enderror 
                    </div>

                    {{-- Password --}}
                    
                    <div class="input-group mb-3">
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-key"></i>
                      </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">

                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <input type="hidden" name="password_actual" value="{{$value["password"]}}">

                     {{--  Rol --}}
                    
                    <div class="input-group mb-3">
                      
                      <div class="input-group-append input-group-text">
                        <i class="fas fa-list-ul"></i>
                      </div>
                      
                      <select class="form-control" name="rol" required>
                        
                        @if($value["rol"] == "administrador"|| $value["rol"] == "sub_admin" || $value["rol"] == "")

                          <option value="administrador">administrador</option>
                          <option value="sub_admin">sub_admin</option>
                          <option value="editor">editor</option>
                          

                        @else
                          <option value="editor">editor</option>
                          <option value="sub_admin">sub_admin</option>
                          <option value="administrador">administrador</option>


                        @endif

                      </select>

                    </div>

              
                    {{--  Foto --}}

                    <hr class="pb-2">

                    <div class="form-group my-2 text-center">
                      
                      <div class="btn btn-default btn-file">
                        
                        <i class="fas fa-paperclip">Adjuntar Foto</i>

                        <input type="file" name="foto">


                      </div>

                      <br>

                      @if($value["foto"] == "")
                        
                        <img src="{{url("/")}}/img/administradores/admin.png" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">
                      
                      @else

                         <img src="{{url("/")}}/{{$value["foto"]}}" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">

                      @endif

                      <input type="hidden" name="imagen_actual" value="{{$value["foto"]}}">

                      <p class="help-block">Dimensiones: 200px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>

                    </div>

                  </div>

                  <div class="modal-footer d-flex justify-content-between">
                    <div><button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button></div>
                    <div><button type="submit" class="btn btn-warning">Guardar</button></div>       
                  </div>
                
                </form>
                
                </div>
              </div>
            </div>

          @endforeach

            <script>
              $("#editarAdministrador").modal();
            </script>

          @else 

          {{$status}}

        @endif

      @endif

         @if(Session::has("no-validacion"))

              <script>
                notie.alert({type: 2, text:'¡Hay campos no válidos en el formulario', time: 5})
              </script>

            @endif

            @if(Session::has("error"))

              <script>
                notie.alert({type: 3, text:'¡Error en el gestor de administradores!', time: 5})
              </script>


            @endif

            @if(Session::has("ok-editar"))

              <script>
                notie.alert({type: 1, text:'¡El administrador ha sido actualizado correctamente!', time: 5})
              </script>

            @endif

             @if(Session::has("ok-eliminar"))

              <script>
                notie.alert({type: 1, text:'¡El administrador ha sido eliminado correctamente!', time: 5})
              </script>

            @endif

             @if(Session::has("no-borrar"))

              <script>
                notie.alert({type: 2, text:'¡Este Administrador no se puede borrar!', time: 5})
              </script>

            @endif


@endsection

@else
  <script>window.location="{{url('/circulares')}}"</script>

@endif
@endif
@endforeach   

