@extends('admin.people.base-people')

@section('panel-content')
<div class="panel panel-default" >
    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Personas Registradas <span class="label label-default">{{ count($persons) }} Persona(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="{{ url('/dash/people/new') }}" role="button">+ Nueva Persona</a>
    		</div>
    	</div>
    </div>

        <div class="panel-body">
			@if(count($persons)>0)
				<div id="content-personas" style="display: none">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-hover" id="lista-personas">
									<thead>
										<tr>
											<th>N°</th>
											<th>Nombres y Apellidos</th>
											<th>Correo Electrónico</th>
											<th>Telefono</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										@foreach($persons as $person)
											<tr id="user_{{ $i=$i+1 }}">
												<td>{{ $i }}</td>
												<td>{{ $person->fullnames }}</td>
												<td>{{ $person->email }}</td>
												<td>{{ $person->phone }}</td>
												<td >
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesPersona" onclick="clickVerDetallesPersona({{ $person->id }})">Detalles</button>
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarPersona" onclick="clickEditarPersona({{ $person->id }})">Editar</button>
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarPersona" onclick="clickEliminarPersona({{ $person->id }})">Eliminar</button>
												</td>
											</tr>			
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center loading">
					Cargando...
					<div >
						<img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
					</div>
				</div>
			@else
				<div class="text-center">
					Aun no hay Personas Registradas.
				</div>
			@endif
		</div>

		<div id="person-modal">
			@include('admin.people.modal.modal-detalles-person')
			@include('admin.people.modal.modal-editar-person')
			@include('admin.people.modal.modal-eliminar-person')
		</div>
</div>

@endsection

@section('scripts-people')
<script>

	$('#lista-personas').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ personas",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando personas del _START_ al _END_ de un total de _TOTAL_ personas",
	        "sInfoEmpty":     "Mostrando personas del 0 al 0 de un total de 0 personas",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ personas)",
	        "sInfoPostFix":   "",
	        "sSearch":        "Buscar:",
	        "sUrl":           "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "Cargando...",
	        "oPaginate": {
	            "sFirst":    "Primero",
	            "sLast":    "Último",
	            "sNext":    "Siguiente",
	            "sPrevious": "Anterior"
	        },
	        "oAria": {
	            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	        }
	    }
	});


	setTimeout(function(){
		$('.loading').hide();
		$('#content-personas').show();
	},500);

	function clickVerDetallesPersona(id){
		appPersonList.clickVerDetallesPersona(id);
	}

	function clickEditarPersona(id){
		appPersonList.clickEditarPersona(id);
	}

	function clickEliminarPersona(id){
		appPersonList.clickEliminarPersona(id);
	}

	var appPersonList = new Vue({
		el: '#person-modal',
		data: {
			idPerson:'',
			dataShowModalDataPerson:{
				on: "",
				fullnames:"",
				email:"",
				phone:"",
				created:"",
				updated:""
			}
		},
		created: function(){
			
		},
		methods:{

			//methods reutilizables
			putIdPerson: function(id){
				this.idPerson = id;
			},
			changeValuesOfPropDataPerson: function(on, fullnames, email, phone, created, updated){
				appPersonList.dataShowModalDataPerson.on = on;
				appPersonList.dataShowModalDataPerson.fullnames = fullnames;
				appPersonList.dataShowModalDataPerson.email = email;
				appPersonList.dataShowModalDataPerson.phone = phone;
				appPersonList.dataShowModalDataPerson.created = created;
				appPersonList.dataShowModalDataPerson.updated = updated;
			},
			ajaxGetPersons: function(btnElement){
				$.ajax({
					url: '{{ url('ajax/people/get') }}/'+this.idPerson,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							appPersonList.changeValuesOfPropDataPerson(true, data['fullnames'], data['email'], data['phone'], data['created_at'], data['updated_at']);
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},

			clickVerDetallesPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_detalles'));
			},
			clickEditarPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_editar'));
			},

			clickGuardarEditarPersona: function(){
				$('#btn_guardar_editar_persona').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_person').val()},
					url: '{{ url('ajax/people/edit') }}/'+this.idPerson,
					data: {
						fullnames:this.dataShowModalDataPerson.fullnames,
						email: this.dataShowModalDataPerson.email,
						phone: this.dataShowModalDataPerson.phone
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_person').show();
					},
					success: function(data){

						if(data==1){
							$('#load_editar_person').hide();
							
							$("#myModalEditarPersona").modal('hide');
							location.href = '{{ url('dash/people/list') }}';
						}
					}
				})
			},
			clickEliminarPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_eliminar'));
			},
			clickGuardarEliminarUser: function(){
				$('#btn_guardar_eliminar_person').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_person').val()},
					url: '{{ url('ajax/people/delete') }}/'+this.idPerson,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_person').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_person').hide();
							
							$("#myModalEliminarPersona").modal('hide');
							location.href = '{{ url('dash/people/list') }}';
						}
					}
				})
			}
		}
	});
</script>
@endsection

