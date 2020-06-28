<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Nuevo Rol</b>
    		</div>
    		<div class="col-md-4 text-right">
    			
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
            <form  method="POST" action="<?php echo e(route('save-rol')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de Rol</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre de Rol" name="nombre_rol">
                        </div>
                    </div>
                </div>
                <h5><b>Agregar Secciónes al Rol:</b></h5>
                <div class="row">
                    <?php if(count($secciones)>0): ?>
                        <?php $i=0; ?>
                        <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="seccion_<?php echo e($i=$i+1); ?>"> <?php echo e($seccion->nombre_seccion); ?>

                                </label>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <p>
                                No hay Secciones Registradas. Para crear una, <a href="<?php echo e(url('/dash/seccion/new')); ?>">¡haz click aquí!</a>.
                            </p>
                        </div>
                        
                    <?php endif; ?>
                </div>
                <br>

                
              
              
              
              
              <button type="submit" class="btn btn-default">Guardar Rol</button>
            </form>
        </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>