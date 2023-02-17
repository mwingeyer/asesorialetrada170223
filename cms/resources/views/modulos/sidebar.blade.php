<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url ('/') }}" class="brand-link">
      <img src="{{ url('/')}}/{{ $pagina[0]["icono"] }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Asesoria Letrada</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 215px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           @foreach ($administradores as $element)

              @if($_COOKIE["email_login"]== $element->email)
                
                @if($element->foto == "")
                  <img src="{{ url('/')}}/vistas/img/admin.png" class="img-circle elevation-2" alt="User Image">
                
                @else
                  <img src="{{url('/')}}/{{$element->foto}}" class="img-circle elevation-2" alt="User Image">

                @endif

              @endif

            @endforeach   

         
        </div>
        <div class="info">
          <a href="#" class="d-block">
             @foreach ($administradores as $element)

                @if($_COOKIE["email_login"]== $element->email)
                   {{$element->name }}
                @endif

              @endforeach   
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @foreach ($administradores as $element)

            @if($_COOKIE["email_login"]== $element->email)
               @if($element->rol == "administrador")

                 <!-- =============================================================
                        Boton Página
                  =================================================================-->
                  
                  <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                      <i class="nav-icon fas fa-home"></i>
                      <p>Página</p>
                    </a>
                  </li>

                  <!-- =============================================================
                        Boton Administradores
                  =================================================================-->

                   <li class="nav-item">
                    <a href="{{ url('/administradores') }}" class="nav-link">
                      <i class="nav-icon fas fa-users-cog"></i>
                      <p>Administradores</p>
                    </a>
                  </li>




              @endif
            
              @if($element->rol == "sub_admin" || $element->rol == "administrador" )

              <!-- =============================================================
                              Boton Circulares
                        =================================================================-->

                         <li class="nav-item">
                          <a href="{{ url('/circulares') }}" class="nav-link">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>Circulares</p>
                          </a>
                        </li>

                @endif         

            @endif
          @endforeach   


        
          <!-- =============================================================
                Boton Dictamenes
          =================================================================-->

           <li class="nav-item">
            <a href="{{ url('/dictamenes') }}" class="nav-link">
              <i class="nav-icon fas fa-sticky-note"></i>
              <p>Dictamenes</p>
            </a>
          </li>

          <!-- =============================================================
                Boton Organismos
          =================================================================-->

           <li class="nav-item">
            <a href="{{ url('/organismos') }}" class="nav-link">
              <i class="nav-icon fas fa-city"></i>
              <p>Organismos</p>
            </a>
          </li>

           <!-- =============================================================
                Boton Voces
          =================================================================-->

           <li class="nav-item">
            <a href="{{ url('/voces') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Voces</p>
            </a>
          </li>

           <!-- =============================================================
                Boton Front 
          =================================================================-->

           <li class="nav-item">
            <a href="{{ substr( url('/'),0,-11)}}" class="nav-link" target="_blank">
              <i class="nav-icon fas fa-globe"></i>
              <p>Mi sitio</p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 13.5084%; transform: translate(0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>