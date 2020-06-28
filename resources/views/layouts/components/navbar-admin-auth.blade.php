<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Sistema CONSULTORIO VIRTUAL
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="{{ asset('img/icon-user.png') }}" alt="" style="width:20px; margin-right: 5px">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->id==1)
                                        <li class="dropdown-header">Super Administrador</li>
                                        <li role="separator" class="divider"></li>
                                    @else
                                        @foreach($users_rol_provider as $user_rol)
                                            @if(Auth::user()->id==$user_rol->user_id)
                                                @foreach($roles_provider as $rol)
                                                    @if($rol->id==$user_rol->rol_id)
                                                        
                                                        <li class="dropdown-header">{{ $rol->nombre_rol }}</li>
                                                        <?php $rol_nombre = $rol->nombre_rol; ?>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <li role="separator" class="divider"></li>
                                    @endif
                                    <li>
                                        @if(Auth::user()->id==1)
                                            <a href="{{ url('dash') }}">Panel Administración</a>
                                        @else
                                            @foreach($users_rol_provider as $user_rol)
                                                @if(Auth::user()->id==$user_rol->user_id)
                                                    @foreach($roles_provider as $rol)
                                                        @if($rol->id==$user_rol->rol_id)
                                                            
                                                            @foreach($rol_secciones_provider as $rol_seccion)
                                                                @if($rol->id==$rol_seccion->rol_id)
                                                                    @foreach($secciones_provider as $seccion)
                                                                        @if($rol_seccion->seccion_id==$seccion->id)
                                                                            @if($seccion->ruta=="/dash")
                                                                                <a href="{{ url('dash') }}">Panel Administración</a>
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif

                                       
                                       <a href="{{ url('dash') }}">Mi Perfil</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>