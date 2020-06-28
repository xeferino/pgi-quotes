<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Administración</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class=text-center><b>Gestión de Usuarios</b></h5>
                            <ul class="list-group">
                              <a href="<?php echo e(url('dash/user/new')); ?>" class="list-group-item">Crear Usuario</a>
                              <a href="<?php echo e(url('dash/user/list')); ?>" class="list-group-item">Usuarios Registrados</a>
                              <a href="<?php echo e(url('dash/rol/new')); ?>" class="list-group-item">Crear Rol</a>
                              <a href="<?php echo e(url('dash/rol/list')); ?>" class="list-group-item">Roles Registrados</a>
                              <a href="<?php echo e(url('dash/seccion/new')); ?>" class="list-group-item">Crear Sección de Acceso</a>
                              <a href="<?php echo e(url('dash/seccion/list')); ?>" class="list-group-item">Lista de Secciones de Acceso</a>
                            </ul>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>