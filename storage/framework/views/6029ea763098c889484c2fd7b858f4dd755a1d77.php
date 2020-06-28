<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default">

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Nueva Sección</b>
    		</div>
    		<div class="col-md-4 text-right">
    			
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
            <form  method="POST" action="<?php echo e(route('save-seccion')); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de Sección</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre de Sección" name="nombre_seccion">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipo</label>
                            <select name="tipo" id="" class="form-control">
                                <option value="seccion">Sección</option>
                                <option value="sub-seccion">Sub-sección</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ruta</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ruta" name="ruta">
                        </div>
                    </div>
                </div>
              
              
              
              
              <button type="submit" class="btn btn-default">Guardar Sección</button>
            </form>
        </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>