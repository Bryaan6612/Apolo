<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark" id="sidenav-main" style="background-color: #036969;" >
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/hermes.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/favicon.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mi Perfil') }}</span>
                    </a>
                
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Cerrar Sesión') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/hermes-consul.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
           <!-- <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form> -->
            <!-- EDITAR SIDEBAR NOMBRES --> 
            <ul class="navbar-nav">
              <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-collection text-blue"></i>
                        <span class="nav-link-text">Inicio</span>
                    </a>
                </li>
               

                  
                           

                <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>-->
               
               <!--@can('clientes', Auth::User())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_clientes') }}">
                      <i class="ni ni-badge text-red"></i>
                      <span class="nav-link-text">Clientes</span>
                    </a>
                </li> 
                @endcan-->

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_reportes') }}">
                      <i class="ni ni-collection text-orange"></i>
                      <span class="nav-link-text" >Reportes</span>
                    </a>
                </li>
               <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_venta') }}">
                      <i class="ni ni-shop text-cyan"></i>
                      <span class="nav-link-text"> Ventas</span>
                    </a>
                </li>-->
                
                <!--<li class="nav-item">
                    <a class="nav-link" href="{{ route('m_detalleventa') }}">
                    <i class="ni ni-money-coins text-green"></i>
                      <span class="nav-link-text">Detalle de venta</span>
                    </a>
                </li>
                < <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_areas') }}">
                    <i class="ni ni-pin-3 text-cyan"></i>
                      <span class="nav-link-text">Areas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_ejes') }}">
                    <i class="ni ni-single-copy-04 text-cyan"></i>
                      <span class="nav-link-text">Ejes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_edificios') }}">
                    <i class="ni ni-istanbul text-cyan"></i>
                      <span class="nav-link-text">Edificios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('m_usuarios') }}">
                    <i class="ni ni-bullet-list-67 text-cyan"></i>
                      <span class="nav-link-text">Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
              <a class="nav-link" href="{{ route('cliente.index') }}">
                  <i class="ni ni-single-02 text-indigo"></i> {{ __('Alta Cliente') }}
              </a>
          </li>-->
          <!--
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">Acceder a Admin</a>
                </li>-->
              
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
           
        </div>
    </div>
</nav>
