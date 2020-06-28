@extends('admin.user.base-user-admin')

@section('panel-content')
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Usuarios Registrados <span class="label label-default">{{ count($users) }} Usuario(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="{{ url('/dash/user/new') }}" role="button">+ Nuevo Usuario</a>
    			
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
			
			<table class="table table-hover" >
				<thead>
					<tr>
						
						<th>Nombres y Apellidos</th>
						<th>Usuario</th>
						<th>Correo Electrónico</th>
						<th>Rol</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					
					
						
						@foreach($users as $user)
							@if($user->id==1)
								<tr>
									<td>
										{{ $user->name }}
									</td>
									<td>
										{{ $user->username }}
									</td>
									<td>
										{{ $user->email }}
									</td>
									<td>
										Super Administrador
									</td>
									<td>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesUsuario" onclick="clickVerDetallesUsuario({{ $user->id }})">Detalles</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarUsuario" onclick="clickEditarUsuario({{ $user->id }})">Editar</button>
									</td>
								</tr>
							@endif
							
						@endforeach
					
				</tbody>
			</table>

			<hr>

			<div id="content-usuarios" style="display: none">
			<table class="table table-hover" id="lista-usuarios" >
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombres y Apellidos</th>
						<th>Usuario</th>
						<th>Correo Electrónico</th>
						<th>Rol</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody >
					
						@if(count($users)>1)
							<?php $i=0; ?>
							@foreach($users as $user)
								@if($user->id!=1)
								<tr id="user_{{ $i=$i+1 }}" >
									<td>
										{{ $i }}
									</td>
									<td>
										{{ $user->name }}
									</td>
									<td>
										{{ $user->username }}
									</td>
									<td>
										{{ $user->email }}
									</td>
									<td >
										<?php $ban=0; ?>
										@if(count($users_rol)>0)

											@foreach($users_rol as $user_rol)
												@if($user->id==$user_rol->user_id)
													@foreach($roles as $rol)
														@if($rol->id==$user_rol->rol_id)
															{{ $rol->nombre_rol }} &nbsp;&nbsp;<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalModificarAsignarRol" onclick="clickModificarAsignarRol({{ $user->id }})">Modificar</button>
														@endif
													@endforeach
													<?php $ban=$ban+1; ?>
												@else
													<?php $ban=$ban+0; ?>
												@endif
											@endforeach

											@if($ban==0)
												<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" onclick="clickAsignarRol({{ $user->id }})">Asigar Rol</button>
											@endif
										@else

										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" onclick="clickAsignarRol({{ $user->id }})">Asigar Rol</button>

										@endif
									</td>
									<td >


										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesUsuario" onclick="clickVerDetallesUsuario({{ $user->id }})">Detalles</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarUsuario" onclick="clickEditarUsuario({{ $user->id }})">Editar</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarUsuario" onclick="clickEliminarUsuario({{ $user->id }})">Eliminar</button>
									</td>
								</tr>
								
								@endif
							@endforeach
						@else
								<tr>
									<td colspan="6" class="text-center">
										Aun no hay Usuarios Registrados.
									</td>
								</tr>
						@endif

					
				</tbody>
			</table>
			

			</div>

			<div class="text-center loading">
				Cargando...
				<div >
					<img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
				</div>
			</div>
			
		
		</div>
		<div id="user-modal">
		@include('admin.user.modal.modal-asignar-rol')
		@include('admin.user.modal.modal-modificar-asignar-rol')
		@include('admin.user.modal.modal-detalles-usuario')
		@include('admin.user.modal.modal-editar-usuario')
		@include('admin.user.modal.modal-eliminar-usuario')
		</div>
	</div>

@endsection

@section('scripts-user')
<script>

	$('#lista-usuarios').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ usuarios",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando usuarios del _START_ al _END_ de un total de _TOTAL_ usuarios",
	        "sInfoEmpty":     "Mostrando usuarios del 0 al 0 de un total de 0 usuarios",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ usuarios)",
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
		$('#content-usuarios').show();
	},500);



	function clickAsignarRol(id){
		appUserList.clickAsignarRol(id);
	}

	function clickModificarAsignarRol(id){
		appUserList.clickModificarAsignarRol(id);
	}

	function clickVerDetallesUsuario(id){
		appUserList.clickVerDetallesUsuario(id);
	}

	function clickEditarUsuario(id){
		appUserList.clickEditarUsuario(id);
	}

	function clickEliminarUsuario(id){
		appUserList.clickEliminarUsuario(id);
	}
	
	var appUserList = new Vue({
		el: '#user-modal',
		data: {
			idRol:'',
			idUser:'',
			dataShowModalModificar:{
				name:"",
				rol: "",
			},
			dataShowModalDataUser:{
				on: "",
				name:"",
				username:"",
				email:"",
				pass:"",
				created:"",
				updated:""
			},
			showMessageUserList:false
		},
		created: function(){
			
		},
		methods:{

			//methods reutilizables
			putIdUser: function(id){
				this.idUser = id;
			},
			changeValuesOfPropDataUser: function(on, name, username, email, pass, created, updated){
				appUserList.dataShowModalDataUser.on = on;
				appUserList.dataShowModalDataUser.name = name;
				appUserList.dataShowModalDataUser.username = username;
				appUserList.dataShowModalDataUser.email = email;
				appUserList.dataShowModalDataUser.pass = pass;
				appUserList.dataShowModalDataUser.created = created;
				appUserList.dataShowModalDataUser.updated = updated;
			},
			ajaxGetUsers: function(btnElement){
				$.ajax({
					url: '{{ url('ajax/user/get') }}/'+this.idUser,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							appUserList.changeValuesOfPropDataUser(true, data['name'], data['username'], data['email'], data['password'], data['created_at'], data['updated_at']);
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},

			//methods actions of app
			clickAsignarRol: function(id){
				this.putIdUser(id);
				console.log(this.idUser);
			},
			clickGuardarAsignarRol: function(){
				$('#btn-guardar-rol').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_rol').val()},
					url: '{{ url('ajax/user/asignar/rol') }}/'+this.idUser,
					data: {idRol:this.idRol},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load-asignar').show();
					},
					success: function(data){
						if(data==1){
							$('#load-asignar').hide();
							
							$("#myModal").modal('hide');
							location.href = '{{ url('dash/user/list') }}';
						}
					}
				})
			},
			clickModificarAsignarRol: function(id){
				this.putIdUser(id);
				appUserList.dataShowModalModificar.name = "";
				appUserList.dataShowModalModificar.rol = "";

				$.ajax({
					url: '{{ url('ajax/user/get/rol') }}/'+this.idUser,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						$('#load_cargar_data').show();

					},
					success: function(data){
						$('#load_cargar_data').hide();
						if(data!=0){
							appUserList.dataShowModalModificar.name = data[0]['name'];
							appUserList.dataShowModalModificar.rol = data[1]['nombre_rol'];
							
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},
			clickGuardarModificarRolUser: function(){
				$('#btn_guardar_rol_modificar').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_rol_mod').val()},
					url: '{{ url('ajax/user/modificar/rol') }}/'+this.idUser,
					data: {idRol:this.idRol},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_guardar_rol').show();
					},
					success: function(data){

						if(data==1){
							$('#load_guardar_rol').hide();
							
							$("myModalModificarAsignarRol").modal('hide');
							location.href = '{{ url('dash/user/list') }}';
						}
					}
				})
			},

			clickVerDetallesUsuario: function(id){
				this.putIdUser(id);
				this.changeValuesOfPropDataUser("","","","","","");
				this.ajaxGetUsers($('#load_cargar_data_detalles'));
			},
			clickEditarUsuario: function(id){
				this.putIdUser(id);
				this.changeValuesOfPropDataUser("","","","","","");
				this.ajaxGetUsers($('#load_cargar_data_editar'));
			},

			clickGuardarEditarUser: function(){
				$('#btn_guardar_editar_user').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_user').val()},
					url: '{{ url('ajax/user/edit') }}/'+this.idUser,
					data: {
						name:this.dataShowModalDataUser.name,
						username: this.dataShowModalDataUser.username,
						email: this.dataShowModalDataUser.email,
						pass: this.dataShowModalDataUser.pass
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_user').show();
					},
					success: function(data){

						if(data==1){
							$('#load_editar_user').hide();
							
							$("myModalEditarUsuario").modal('hide');
							location.href = '{{ url('dash/user/list') }}';
						}
					}
				})
			},
			clickEliminarUsuario: function(id){
				this.putIdUser(id);
				this.changeValuesOfPropDataUser("","","","","","");
				this.ajaxGetUsers($('#load_cargar_data_eliminar'));
			},
			clickGuardarEliminarUser: function(){
				$('#btn_guardar_eliminar_user').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_user').val()},
					url: '{{ url('ajax/user/delete') }}/'+this.idUser,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_user').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_user').hide();
							
							$("myModalEliminarUsuario").modal('hide');
							location.href = '{{ url('dash/user/list') }}';
						}
					}
				})
			}
		}
	});
</script>
@endsection

