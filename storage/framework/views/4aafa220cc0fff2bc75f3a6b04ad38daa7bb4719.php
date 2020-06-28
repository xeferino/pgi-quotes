<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default">

                <div class="panel-heading">Crear Nuevo Usuario</div>

                <div class="panel-body">
                    <form  method="POST" action="<?php echo e(route('save-user')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                    <label for="name" >Nombres y Apellidos</label>

                                    
                                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="Nombres y Apellidos">

                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                    <label for="username" >Nombre de Usuario</label>

                                    
                                        <input id="username" type="username" class="form-control" name="username" value="<?php echo e(old('username')); ?>" required placeholder="Nombre de Usuario">

                                        <?php if($errors->has('username')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('username')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                    <label for="email">Correo Electrónico</label>

                                    
                                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Correo Electrónico">

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                                    <label for="password" >Contraseña</label>

                                    
                                        <input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password-confirm" >Confirmar Contraseña</label>

                                    
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirmar Contraseña">
                                    
                                </div>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-default btn-block">Crear Usuario</button>
                            </div>
                        </div>
                        
                      
                      
                    </form>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>