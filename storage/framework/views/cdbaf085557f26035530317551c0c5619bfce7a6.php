<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Administración</div>

                <div class="panel-body">

                 
                    <div class="row">
                        <div class="col-md-4">

                            <div class="row">
                              <div class="col-md-12">
                               <h5 class=text-center><b>Gestión de Usuarios y Roles</b></h5>
                                <ul class="list-group">
                                  <?php if(Auth::user()->id!=1): ?>
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
                                                        <a href="<?php echo e(url('dash/user/new')); ?>" class="list-group-item" id="crear-usuario">Crear Usuario</a>
                                                      <?php elseif($seccion->ruta=="/dash/user/list"): ?>
                                                        <a href="<?php echo e(url('dash/user/list')); ?>" class="list-group-item">Usuarios Registrados</a>
                                                      <?php elseif($seccion->ruta=="/dash/rol/new"): ?>
                                                        <a href="<?php echo e(url('dash/rol/new')); ?>" class="list-group-item">Crear Rol</a>  
                                                      <?php elseif($seccion->ruta=="/dash/rol/list"): ?>
                                                        <a href="<?php echo e(url('dash/rol/list')); ?>" class="list-group-item">Roles Registrados</a>
                                                      <?php elseif($seccion->ruta=="/dash/seccion/new"): ?>
                                                        <a href="<?php echo e(url('dash/seccion/new')); ?>" class="list-group-item">Crear Sección de Acceso</a>
                                                      <?php elseif($seccion->ruta=="/dash/seccion/list"): ?>
                                                        <a href="<?php echo e(url('dash/seccion/list')); ?>" class="list-group-item">Lista de Secciones de Acceso</a>
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
                                    
                                    <a href="<?php echo e(url('dash/user/new')); ?>" class="list-group-item" id="crear-usuario">Crear Usuario</a>
                                    <a href="<?php echo e(url('dash/user/list')); ?>" class="list-group-item">Usuarios Registrados</a>
                                    <a href="<?php echo e(url('dash/rol/new')); ?>" class="list-group-item">Crear Rol</a>
                                    <a href="<?php echo e(url('dash/rol/list')); ?>" class="list-group-item">Roles Registrados</a>
                                    <a href="<?php echo e(url('dash/seccion/new')); ?>" class="list-group-item">Crear Sección de Acceso</a>
                                    <a href="<?php echo e(url('dash/seccion/list')); ?>" class="list-group-item">Lista de Secciones de Acceso</a>

                                  <?php endif; ?>
                                  
                                </ul>   


                              </div>
                            </div>
                            

                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Módulos y Submódulos públicos</b></h5>
                              <ul class="list-group">
                                <a href="<?php echo e(url('dash/user/new')); ?>" class="list-group-item" id="crear-usuario" disabled>Lista de Módulos</a>
                                <a href="<?php echo e(url('dash/user/new')); ?>" class="list-group-item" id="crear-usuario" disabled>Lista de Submódulos</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="row">
                            <div class="col-md-12">
                              <h5 class=text-center><b>Documentos</b></h5>
                              <ul class="list-group">
                                <a href="<?php echo e(url('dash/document/type/new')); ?>" class="list-group-item" id="doc-type">Crear Tipo de Documento</a>
                                <a href="<?php echo e(url('dash/document/type/list')); ?>" class="list-group-item" id="crear-usuario">Lista de Tipos de Documento</a>
                                <a href="<?php echo e(url('dash/document/type/list')); ?>" class="list-group-item" id="crear-usuario">Lista de Documentos</a>
                              </ul>
                            </div>
                          </div>
                        </div>

                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
  <script>
    
  var href = document.getElementById("crear-usuario").pathname;
  console.log(href);

  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>