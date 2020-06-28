<?php $__env->startSection('content'); ?>
<div class="container">
    <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Ingresar al Sistema</div>
                <div class="panel-body">

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                      <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email">Correo Electrónico</label>
                        
                        
                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">
                            <span class="icon-user2"></span>
                          </span>
                          <input type="email" class="form-control" name="email" placeholder="Correo Electrónico" aria-describedby="basic-addon1" value="<?php echo e(old('email')); ?>" required autofocus>
                        </div>

                        <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                      </div>
                      <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="exampleInputPassword1">Contraseña</label>
                        

                        

                        <div class="input-group">
                          <span class="input-group-addon" id="basic-addon1">
                            <span class="icon-key"></span>
                          </span>
                          <input id="password" type="password" class="form-control " name="password" required placeholder="Contraseña">
                        </div>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                      </div>

                      <div class="form-group text-center">
                          <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    Olvidaste tu Contraseña?
                                </a>
                      </div>
                      
                      <div class="form-group">
                            <button type="submit" class="btn btn-default" style="width: 100%">
                                Ingresar
                            </button>
                      </div>
                      
                      
                      
                      

                                
                    </form>


      
                    
                </div>
            </div>

            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>