<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              
              <?php if(Auth::user()->id!=1): ?>
                <li ><a href="<?php echo e(url('dash/')); ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>


                <?php $__currentLoopData = $users_rol_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if(Auth::user()->id==$user_rol->user_id): ?>           
                    <?php $__currentLoopData = $roles_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($rol->id==$user_rol->rol_id): ?>
                                                              
                        <?php $__currentLoopData = $rol_secciones_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol_seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($rol->id==$rol_seccion->rol_id): ?>
                            <?php $__currentLoopData = $secciones_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php if($rol_seccion->seccion_id==$seccion->id): ?>
                                <?php if($seccion->ruta!="/dash"): ?>
                                  <?php if($seccion->ruta=="/dash/user/new"): ?>
                                    <li role="presentation" class="user-new"><a id="h" href="<?php echo e(url('dash/user/new')); ?>">Crear Usuario</a></li>
                                  <?php elseif($seccion->ruta=="/dash/user/list"): ?>
                                    <li role="presentation" class="user-list"><a href="<?php echo e(url('dash/user/list')); ?>">Usuarios Registrados</a></li>
                                  <?php elseif($seccion->ruta=="/dash/rol/new"): ?>
                                    <li role="presentation" class="rol-new"><a href="<?php echo e(url('dash/rol/new')); ?>">Crear Rol</a></li>
                                  <?php elseif($seccion->ruta=="/dash/rol/list"): ?>
                                    <li role="presentation" class="rol-list"><a href="<?php echo e(url('dash/rol/list')); ?>">Roles Registrados</a></li>
                                  <?php elseif($seccion->ruta=="/dash/seccion/new"): ?>
                                    <li role="presentation" class="seccion-new"><a href="<?php echo e(url('dash/seccion/new')); ?>">Crear Sección de Acceso</a></li>
                                  <?php elseif($seccion->ruta=="/dash/seccion/list"): ?>
                                    <li role="presentation" class="seccion-list"><a href="<?php echo e(url('dash/seccion/list')); ?>">Lista de Secciones de Acceso</a></li>
                                  <?php else: ?>
                                                    
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php else: ?>
                                
                <li ><a href="<?php echo e(url('dash/')); ?>"><span class="glyphicon glyphicon-arrow-left"></span></a></li>
                <li role="presentation" class="user-new"><a id="h" href="<?php echo e(url('dash/user/new')); ?>">Crear Usuario</a></li>
                <li role="presentation" class="user-list"><a href="<?php echo e(url('dash/user/list')); ?>">Usuarios Registrados</a></li>
                <li role="presentation" class="rol-new"><a href="<?php echo e(url('dash/rol/new')); ?>">Crear Rol</a></li>
                <li role="presentation" class="rol-list"><a href="<?php echo e(url('dash/rol/list')); ?>">Roles Registrados</a></li>
                <li role="presentation" class="seccion-new"><a href="<?php echo e(url('dash/seccion/new')); ?>">Crear Sección de Acceso</a></li>
                <li role="presentation" class="seccion-list"><a href="<?php echo e(url('dash/seccion/list')); ?>">Lista de Secciones de Acceso</a></li>

              <?php endif; ?>

              
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
    $('.nav>.user-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/user/list')); ?>"){
    console.log('hola');
    $('.nav>.user-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/rol/new')); ?>"){
    $('.nav>.rol-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/rol/list')); ?>"){
    $('.nav>.rol-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/seccion/new')); ?>"){
    $('.nav>.seccion-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/seccion/list')); ?>"){
    $('.nav>.seccion-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
</script>

  <?php echo $__env->yieldContent('scripts-user'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>