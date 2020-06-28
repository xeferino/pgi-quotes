<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" id="user-list">

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

			<table class="table table-hover">
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
										<button class="btn btn-default btn-xs">Detalles</button>
										<button class="btn btn-default btn-xs">Editar</button>
									</td>
								</tr>
							<?php endif; ?>
							
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</tbody>
			</table>

			<hr>

			<table class="table table-hover">
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
				<tbody>
					
						<?php if(count($users)>1): ?>
							<?php $i=0; ?>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($user->id!=1): ?>
								<tr>
									<td>
										<?php echo e($i=$i+1); ?>

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
									<td>
										<?php $ban=0; ?>
										<?php if(count($users_rol)>0): ?>

											<?php $__currentLoopData = $users_rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($user->id==$user_rol->user_id): ?>
													<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($rol->id==$user_rol->rol_id): ?>
															<?php echo e($rol->nombre_rol); ?>

														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php $ban=$ban+1; ?>
												<?php else: ?>
													<?php $ban=$ban+0; ?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<?php if($ban==0): ?>
												<span style="color:red">No Asignado</span>
											<?php endif; ?>
										<?php else: ?>

										<span style="color:red">No Asignado</span>

										<?php endif; ?>
									</td>
									<td>

										<?php $band=0; ?>
										<?php if(count($users_rol)>0): ?>

											<?php $__currentLoopData = $users_rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($user->id==$user_rol->user_id): ?>
													<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if($rol->id==$user_rol->rol_id): ?>
															<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalModificarAsignarRol" v-on:click="clickModificarAsignarRol(<?php echo e($user->id); ?>)">Modificar Rol</button>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													<?php $band=$band+1; ?>
												<?php else: ?>
													<?php $band=$band+0; ?>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											<?php if($band==0): ?>
												<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" v-on:click="clickAsignarRol(<?php echo e($user->id); ?>)">Asigar Rol</button>
											<?php endif; ?>
										<?php else: ?>

										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal" v-on:click="clickAsignarRol(<?php echo e($user->id); ?>)">Asigar Rol</button>

										<?php endif; ?>

										<button class="btn btn-default btn-xs">Detalles</button>
										<button class="btn btn-default btn-xs">Editar</button>
										<button class="btn btn-default btn-xs">Eliminar</button>
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
		<?php echo $__env->make('admin.user.modal.modal-asignar-rol', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php echo $__env->make('admin.user.modal.modal-modificar-asignar-rol', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-user'); ?>
<script>
	new Vue({
		el: '#user-list',
		data: {
			idRol:'',
			idUser:'',
		},
		methods:{
			clickAsignarRol: function(id){
				this.idUser = id;
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
			}
		}
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>