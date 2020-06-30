@extends('procesos.quote.base-quotes')

@section('panel-content')
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Nueva Cita </b>
    		</div>
    		<div class="col-md-4 text-right">
    			{{-- <a class="btn btn-danger btn-xs" href="{{ url('/dash/user/new') }}" role="button">+ Nuevo Usuario</a>
    			 --}}
    		</div>
    	</div>
    	
    </div>

    <div class="panel-body">
		<form  method="POST" action="{{ route('save-quote') }}" onsubmit="document.getElementById('cre').disabled = true">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control check-key"  placeholder="Ingrese el titulo de la cita" name="title" value="{{ old('title') }}" required autofocus>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control check-key" required autofocus>
                                <option value="">.::Seleccione::.</option>
                                <option value="Matrimonio">Matrimonio</option>
                                <option value="Familiar">Familiar</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="person">Persona</label>
                            <select name="persona" class="form-control check-key" required autofocus>
                                <option value="">.::Selecione::.</option>
                            @foreach($persons as $person)
                                <option value="{{ $person->id }}">{{ $person->fullnames }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="datetime-local" class="form-control check-key" name="date" value="{{ date('Y-m-d').'T'.date('H').':00' }}" min="{{ date('Y-m-d').'T00:00'}}" required autofocus>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control check-key" placeholder="Ingrese la descripción de la cita" name="description" value="{{ old('description') }}" required autofocus cols="15" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Observación</label>
                            <textarea class="form-control check-key" placeholder="Ingrese la Observación de la cita" name="observation" value="{{ old('observation') }}" required autofocus cols="15" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Cita</button>
        </form>
   	</div>
@endsection

@section('scripts-quote')

<script>
	$('.check-key').keyup(function(){
            var band=0;
            $('.check-key').each(function(){

                if($(this).val()!=''){
                    band=band+1;
                }else{
                    band=band+0;
                }
                console.log(band);

                if(band==$('.check-key').length){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });
        }); 
</script>

@endsection