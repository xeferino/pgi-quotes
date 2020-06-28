<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Secciones de Acceso <span class="label label-default"><?php echo e(count($secciones)); ?> Sección(es)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="<?php echo e(url('/dash/seccion/new')); ?>" role="button">+ Nueva Sección</a>
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombre de Sección</th>
						<th>Tipo</th>
						<th>Ruta</th>
						
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($secciones)>0): ?>
						<?php $i=0; ?>
						<?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<?php echo e($i=$i+1); ?>

								</td>
								<td>
									<?php echo e($seccion->nombre_seccion); ?>

								</td>
								<td>
									<?php echo e($seccion->tipo); ?>

								</td>
								<td>
									<?php echo e($seccion->ruta); ?>

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
								Aun no hay Secciones Registradas.
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