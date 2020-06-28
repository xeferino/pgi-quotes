@extends('admin.user.base-user-admin')

@section('panel-content')
<div class="panel panel-default">

                <div class="panel-heading">Crear Nuevo Usuario</div>

                <div class="panel-body">
                    <form  method="POST" action="{{ route('save-user') }}" onsubmit="document.getElementById('cre').disabled = true">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" >Nombres y Apellidos</label>

                                    
                                        <input id="name" type="text" class="form-control check-key" name="name" value="{{ old('name') }}" required autofocus placeholder="Nombres y Apellidos">

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" >Nombre de Usuario</label>

                                    
                                        <input id="username" type="username" class="form-control check-key" name="username" value="{{ old('username') }}" required placeholder="Nombre de Usuario">

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Correo Electrónico</label>

                                    
                                        <input id="email" type="email" class="form-control check-key" name="email" value="{{ old('email') }}" required placeholder="Correo Electrónico">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" >Contraseña</label>

                                    
                                        <input id="password" type="password" class="form-control check-key" name="password" required placeholder="Contraseña">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" >Confirmar Contraseña</label>

                                    
                                        <input id="password-confirm" type="password" class="form-control check-key" name="password_confirmation" required placeholder="Confirmar Contraseña">
                                    
                                </div>
                            </div>
                        </div>
                      
                   

                                <button type="submit" class="btn btn-tema" id="cre" disabled>Crear Usuario</button>
                        
                        
                      
                      
                    </form>
                </div>
            </div>
@endsection

@section('scripts-user')
    <script>
        $('.check-key').keyup(function(){
            var band=0;
            $('.check-key').each(function(){

                if($(this).val()!=''){
                    band=band+1;
                }else{
                    band=band+0;
                }
                //console.log($('.check-key').length);

                if(band==$('.check-key').length){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });
        }); 
    </script>
@endsection