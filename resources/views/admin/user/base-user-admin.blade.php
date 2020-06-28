@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              
              @if(Auth::user()->id!=1)
                <li ><a href="{{ url('dash/') }}"><span class="glyphicon glyphicon-arrow-left"></span></a></li>


                @foreach($users_rol_provider as $user_rol)
                  @if(Auth::user()->id==$user_rol->user_id)           
                    @foreach($roles_provider as $rol)
                      @if($rol->id==$user_rol->rol_id)
                                                              
                        @foreach($rol_secciones_provider as $rol_seccion)
                          @if($rol->id==$rol_seccion->rol_id)
                            @foreach($secciones_provider as $seccion)
                              @if($rol_seccion->seccion_id==$seccion->id)
                                @if($seccion->ruta!="/dash")
                                  @if($seccion->ruta=="/dash/user/new")
                                    <li role="presentation" class="user-new"><a id="h" href="{{ url('dash/user/new') }}">Crear Usuario</a></li>
                                  @elseif($seccion->ruta=="/dash/user/list")
                                    <li role="presentation" class="user-list"><a href="{{ url('dash/user/list') }}">Usuarios Registrados</a></li>
                                  @elseif($seccion->ruta=="/dash/rol/new")
                                    <li role="presentation" class="rol-new"><a href="{{ url('dash/rol/new') }}">Crear Rol</a></li>
                                  @elseif($seccion->ruta=="/dash/rol/list")
                                    <li role="presentation" class="rol-list"><a href="{{ url('dash/rol/list') }}">Roles Registrados</a></li>
                                  @elseif($seccion->ruta=="/dash/seccion/new")
                                    <li role="presentation" class="seccion-new"><a href="{{ url('dash/seccion/new') }}">Crear Sección de Acceso</a></li>
                                  @elseif($seccion->ruta=="/dash/seccion/list")
                                    <li role="presentation" class="seccion-list"><a href="{{ url('dash/seccion/list') }}">Lista de Secciones de Acceso</a></li>
                                  @else
                                                    
                                  @endif
                                @endif
                              @endif
                            @endforeach
                          @endif
                        @endforeach

                      @endif
                    @endforeach 

                  @endif
                @endforeach
              @else
                                
                <li ><a href="{{ url('dash/') }}"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
                <li role="presentation" class="user-new"><a id="h" href="{{ url('dash/user/new') }}">Crear Usuario</a></li>
                <li role="presentation" class="user-list"><a href="{{ url('dash/user/list') }}">Usuarios Registrados</a></li>
                <li role="presentation" class="rol-new"><a href="{{ url('dash/rol/new') }}">Crear Rol</a></li>
                <li role="presentation" class="rol-list"><a href="{{ url('dash/rol/list') }}">Roles Registrados</a></li>
                <li role="presentation" class="seccion-new"><a href="{{ url('dash/seccion/new') }}">Crear Sección de Acceso</a></li>
                <li role="presentation" class="seccion-list"><a href="{{ url('dash/seccion/list') }}">Lista de Secciones de Acceso</a></li>

              @endif

              
            </ul>
            <br>
            @yield('panel-content')
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
  

  var locationRoute = location.href;
  console.log(locationRoute);

  if(locationRoute=="{{ url('/dash/user/new') }}"){
    $('.nav>.user-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/user/list') }}"){
    console.log('hola');
    $('.nav>.user-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/rol/new') }}"){
    $('.nav>.rol-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/rol/list') }}"){
    $('.nav>.rol-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/seccion/new') }}"){
    $('.nav>.seccion-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/seccion/list') }}"){
    $('.nav>.seccion-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
</script>

  @yield('scripts-user')
@endsection