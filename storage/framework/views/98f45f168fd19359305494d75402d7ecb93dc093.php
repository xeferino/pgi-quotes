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
                                  <?php if($seccion->ruta=="/dash/document/type/new"): ?>
                                    <li role="presentation" class="doc-type-new"><a id="h" href="<?php echo e(url('dash/document/type/new')); ?>">Crear Tipo de Documento</a></li>
                                  <?php elseif($seccion->ruta=="/dash/document/type/list"): ?>
                                    <li role="presentation" class="doc-type-list"><a href="<?php echo e(url('dash/document/type/list')); ?>">Lista de Tipos de Documento</a></li>
                                  <?php elseif($seccion->ruta=="/dash/document/list"): ?>
                                    <li role="presentation" class="doc-list"><a href="<?php echo e(url('dash/document/type/list')); ?>">Lista de Documentos</a></li>
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
                <li role="presentation" class="doc-type-new"><a id="h" href="<?php echo e(url('dash/document/type/new')); ?>">Crear Tipo de Documento</a></li>
                <li role="presentation" class="doc-type-list"><a href="<?php echo e(url('dash/document/type/list')); ?>">Lista de Tipos de Documento</a></li>
                <li role="presentation" class="doc-list"><a href="<?php echo e(url('dash/document/list')); ?>">Lista de Documentos</a></li>
                

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

  if(locationRoute=="<?php echo e(url('/dash/document/type/new')); ?>"){
    $('.nav>.doc-type-new>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/document/type/list')); ?>"){
    console.log('hola');
    $('.nav>.doc-type-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  if(locationRoute=="<?php echo e(url('/dash/document/list')); ?>"){
    $('.nav>.doc-list>a').css({'background-color':'rgb(255, 255, 255)'});
  }
  
</script>

  <?php echo $__env->yieldContent('scripts-doc'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>