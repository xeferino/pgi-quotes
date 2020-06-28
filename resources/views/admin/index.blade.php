@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Administración</div>

                <div class="panel-body">

                 
                    <div class="row">
                        <div class="col-md-4">

                            <div class="row">
                              <div class="col-md-12">
                               <h5 class=text-center><b>Gestión de Usuarios y Roles</b></h5>
                                <ul class="list-group">
                                  @if(Auth::user()->id!=1)
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
                                                        <a href="{{ url('dash/user/new') }}" class="list-group-item" id="crear-usuario">Crear Usuario</a>
                                                      @elseif($seccion->ruta=="/dash/user/list")
                                                        <a href="{{ url('dash/user/list') }}" class="list-group-item">Usuarios Registrados</a>
                                                      @elseif($seccion->ruta=="/dash/rol/new")
                                                        <a href="{{ url('dash/rol/new') }}" class="list-group-item">Crear Rol</a>  
                                                      @elseif($seccion->ruta=="/dash/rol/list")
                                                        <a href="{{ url('dash/rol/list') }}" class="list-group-item">Roles Registrados</a>
                                                      @elseif($seccion->ruta=="/dash/seccion/new")
                                                        <a href="{{ url('dash/seccion/new') }}" class="list-group-item">Crear Sección de Acceso</a>
                                                      @elseif($seccion->ruta=="/dash/seccion/list")
                                                        <a href="{{ url('dash/seccion/list') }}" class="list-group-item">Lista de Secciones de Acceso</a>
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
                                    
                                    <a href="{{ url('dash/user/new') }}" class="list-group-item" id="crear-usuario">Crear Usuario</a>
                                    <a href="{{ url('dash/user/list') }}" class="list-group-item">Usuarios Registrados</a>
                                    <a href="{{ url('dash/rol/new') }}" class="list-group-item">Crear Rol</a>
                                    <a href="{{ url('dash/rol/list') }}" class="list-group-item">Roles Registrados</a>
                                    <a href="{{ url('dash/seccion/new') }}" class="list-group-item">Crear Sección de Acceso</a>
                                    <a href="{{ url('dash/seccion/list') }}" class="list-group-item">Lista de Secciones de Acceso</a>

                                  @endif
                                  
                                </ul>   


                              </div>
                            </div>
                            

                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Módulos y Submódulos públicos</b></h5>
                              <ul class="list-group">
                                <a href="{{ url('dash/user/new') }}" class="list-group-item" id="crear-usuario" disabled>Lista de Módulos</a>
                                <a href="{{ url('dash/user/new') }}" class="list-group-item" id="crear-usuario" disabled>Lista de Submódulos</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Documentos</b></h5>
                              <ul class="list-group">
                                <a href="{{ url('dash/document/type/new') }}" class="list-group-item" id="doc-type">Crear Tipo de Documento</a>
                                <a href="{{ url('dash/document/type/list') }}" class="list-group-item" id="crear-usuario">Lista de Tipos de Documento</a>
                                <a href="{{ url('dash/document/type/list') }}" class="list-group-item" id="crear-usuario">Lista de Documentos</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Personas</b></h5>
                              <ul class="list-group">
                                <a href="{{ url('dash/people/new') }}" class="list-group-item" id="people-new">Crear Nueva Persona</a>
                                <a href="{{ url('dash/people/list') }}" class="list-group-item" id="people-list">Lista de Personas</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Citas</b></h5>
                              <ul class="list-group">
                                <a href="{{ url('dash/quote/new') }}" class="list-group-item" id="quote-new">Crear Nueva Cita</a>
                                <a href="{{ url('dash/quote/list') }}" class="list-group-item" id="quote-list">Lista de Citas</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <script>
    
  var href = document.getElementById("crear-usuario").pathname;
  console.log(href);

  </script>
@endsection
