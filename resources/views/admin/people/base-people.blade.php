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
                                  @if($seccion->ruta=="/dash/people/new")
                                    <li role="presentation" class="people-new"><a id="h" href="{{ url('dash/people/new') }}">Crear Nueva Persona</a></li>
                                  @elseif($seccion->ruta=="/dash/people/list")
                                    <li role="presentation" class="people-list"><a href="{{ url('dash/people/list') }}">Lista de Personas</a></li>
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
                <li role="presentation" class="people-new"><a id="h" href="{{ url('dash/people/new') }}">Crear Nueva Persona</a></li>
                <li role="presentation" class="people-list"><a href="{{ url('dash/people/list') }}">Lista de Persosnas</a></li>
                

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

  if(locationRoute=="{{ url('/dash/people/new') }}"){
    $('.nav>.people-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="{{ url('/dash/people/list') }}"){
    console.log('hola');
    $('.nav>.people-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
</script>

  @yield('scripts-people')
@endsection