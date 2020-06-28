<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Roles Registrados <span class="label label-default"><?php echo e(count($roles)); ?> Roles(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="<?php echo e(url('/dash/rol/new')); ?>" role="button">+ Nuevo Rol</a>
    			
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombres Rol</th>
						<th>Secciones</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					
					<?php if(count($roles)>0): ?>
						<?php $i=0; ?>
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<?php echo e($i=$i+1); ?>

								</td>
								<td>
									<?php echo e($rol->nombre_rol); ?>

								</td>
								<td>
									<?php $k=0; ?>
									<?php $__currentLoopData = $secciones_rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($seccion_rol->rol_id==$rol->id): ?>
											<?php $k=$k+1; ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php $j=0; ?>
									[
									<?php $__currentLoopData = $secciones_rol; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($seccion_rol->rol_id==$rol->id): ?>
											<?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($seccion_rol->seccion_id==$seccion->id): ?>
													<?php echo e($seccion->nombre_seccion); ?>

												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											<?php $j=$j+1; ?>
										<?php endif; ?>

										<?php if($j<$k and $j>0): ?>
											,
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									]
								</td>
								<td>
									<button class="btn btn-default btn-xs">Detalles</button>
									<button class="btn btn-default btn-xs">Editar</button>
									<button class="btn btn-default btn-xs">Eliminar</button>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">
								Aun no hay Roles Registrados.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>