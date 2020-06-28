<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li role="presentation" class="user-new"><a href="<?php echo e(url('dash/user/new')); ?>">Crear Usuario</a></li>
              <li role="presentation" class="user-list"><a href="<?php echo e(url('dash/user/list')); ?>">Usuarios Registrados</a></li>
              <li role="presentation" class="rol-new"><a href="<?php echo e(url('dash/rol/new')); ?>">Crear Rol</a></li>
              <li role="presentation" class="rol-list"><a href="<?php echo e(url('dash/rol/list')); ?>">Roles Registrados</a></li>
              <li role="presentation" class="seccion-new"><a href="<?php echo e(url('dash/seccion/new')); ?>">Crear Sección de Acceso</a></li>
              <li role="presentation" class="seccion-list"><a href="<?php echo e(url('dash/seccion/list')); ?>">Lista de Secciones de Acceso</a></li>
            </ul>
            <br>
            <?php echo $__env->yieldContent('panel-content'); ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  var locationRoute = location.href;
  console.log(locationRoute);

  if(locationRoute=="<?php echo e(url('/dash/user/new')); ?>"){
    $('.nav>.user-new>a').css({'background-color':'#f5f8fa'});
  }
  if(locationRoute=="<?php echo e(url('/dash/user/list')); ?>"){
    console.log('hola');
    $('.nav>.user-list>a').css({'background-color':'#f5f8fa'});
  }
  if(locationRoute=="<?php echo e(url('/dash/rol/new')); ?>"){
    $('.nav>.rol-new>a').css({'background-color':'#f5f8fa'});
  }
  if(locationRoute=="<?php echo e(url('/dash/rol/list')); ?>"){
    $('.nav>.rol-list>a').css({'background-color':'#f5f8fa'});
  }
  if(locationRoute=="<?php echo e(url('/dash/seccion/new')); ?>"){
    $('.nav>.seccion-new>a').css({'background-color':'#f5f8fa'});
  }
  if(locationRoute=="<?php echo e(url('/dash/seccion/list')); ?>"){
    $('.nav>.seccion-list>a').css({'background-color':'#f5f8fa'});
  }
</script>

  <?php echo $__env->yieldContent('scripts-user'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>