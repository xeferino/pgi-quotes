<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Usuarios Registrados <span class="label label-default"><?php echo e(count($users)); ?> Usuario(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="<?php echo e(url('/dash/user/new')); ?>" role="button">+ Nuevo Usuario</a>
    			
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
					
					
						
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($user->id==1): ?>
								<tr>
									<td>
										<?php echo e($user->name); ?>

									</td>
									<td>
										<?php echo e($user->username); ?>

									</td>
									<td>
										<?php echo e($user->email); ?>

									</td>
									<td>
										Super Administrador
									</td>
									<td>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesUsuario" onclick="clickVerDetallesUsuario(<?php echo e($user->id); ?>)">Detalles</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarUsuario" onclick="clickEditarUsuario(<?php echo e($user->id); ?>)">Editar</button>
									</td>
								</tr>
							<?php endif; ?>
							
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
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
					
						<?php if(count($users)>1): ?>
							<?php $i=0; ?>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($user->id!=1): ?>
								<tr id="user_<?php echo e($i=$i+1); ?>" >
									<td>
										<?php echo e($i); ?>

									</td>
									<td>
										<?php echo e($user->name); ?>

									</td>
									<td>
										<?php echo e($user->username); ?>

									</td>
									<td>
										<?php echo e($user->email); ?>

									</td>
									<td >
										<?php $ban=0; ?>
										<?php if(count($users_rol)>0): ?>

											<?php $__currentLoopData = $users_rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($user->id==$user_rol->user_id): ?>
													<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($rol->id==$user_rol->rol_id): ?>
															<?php echo e($rol->nombre_rol); ?> &nbsp;&nbsp;<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalModificarAsignarRol" onclick="clickModificarAsignarRol(<?php echo e($user->id); ?>)">Modificar</button>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php $ban=$ban+1; ?>
												<?php else: ?>
													<?php $ban=$ban+0; ?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<?php if($ban==0): ?>
												<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" onclick="clickAsignarRol(<?php echo e($user->id); ?>)">Asigar Rol</button>
											<?php endif; ?>
										<?php else: ?>

										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" onclick="clickAsignarRol(<?php echo e($user->id); ?>)">Asigar Rol</button>

										<?php endif; ?>
									</td>
									<td >


										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesUsuario" onclick="clickVerDetallesUsuario(<?php echo e($user->id); ?>)">Detalles</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarUsuario" onclick="clickEditarUsuario(<?php echo e($user->id); ?>)">Editar</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarUsuario" onclick="clickEliminarUsuario(<?php echo e($user->id); ?>)">Eliminar</button>
									</td>
								</tr>
								
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
								<tr>
									<td colspan="6" class="text-center">
										Aun no hay Usuarios Registrados.
									</td>
								</tr>
						<?php endif; ?>

					
				</tbody>
			</table>
			

			</div>

			<div class="text-center loading">
				Cargando...
				<div >
					<img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
				</div>
			</div>
			
		
		</div>
		<div id="user-modal">
		<?php echo $__env->make('admin.user.modal.modal-asignar-rol', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.user.modal.modal-modificar-asignar-rol', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.user.modal.modal-detalles-usuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.user.modal.modal-editar-usuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.user.modal.modal-eliminar-usuario', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-user'); ?>
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
					url: '<?php echo e(url('ajax/user/get')); ?>/'+this.idUser,
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
					url: '<?php echo e(url('ajax/user/asignar/rol')); ?>/'+this.idUser,
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
							location.href = '<?php echo e(url('dash/user/list')); ?>';
						}
					}
				})
			},
			clickModificarAsignarRol: function(id){
				this.putIdUser(id);
				appUserList.dataShowModalModificar.name = "";
				appUserList.dataShowModalModificar.rol = "";

				$.ajax({
					url: '<?php echo e(url('ajax/user/get/rol')); ?>/'+this.idUser,
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
					url: '<?php echo e(url('ajax/user/modificar/rol')); ?>/'+this.idUser,
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
							location.href = '<?php echo e(url('dash/user/list')); ?>';
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
					url: '<?php echo e(url('ajax/user/edit')); ?>/'+this.idUser,
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
							location.href = '<?php echo e(url('dash/user/list')); ?>';
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
					url: '<?php echo e(url('ajax/user/delete')); ?>/'+this.idUser,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_user').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_user').hide();
							
							$("myModalEliminarUsuario").modal('hide');
							location.href = '<?php echo e(url('dash/user/list')); ?>';
						}
					}
				})
			}
		}
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>