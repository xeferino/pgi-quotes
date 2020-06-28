<nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        Sistema PGI
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="<?php echo e(asset('img/icon-user.png')); ?>" alt="" style="width:20px; margin-right: 5px">
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <?php if(Auth::user()->id==1): ?>
                                        <li class="dropdown-header">Super Administrador</li>
                                        <li role="separator" class="divider"></li>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $users_rol_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(Auth::user()->id==$user_rol->user_id): ?>
                                                <?php $__currentLoopData = $roles_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($rol->id==$user_rol->rol_id): ?>
                                                        
                                                        <li class="dropdown-header"><?php echo e($rol->nombre_rol); ?></li>
                                                        <?php $rol_nombre = $rol->nombre_rol; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <li role="separator" class="divider"></li>
                                    <?php endif; ?>
                                    <li>
                                        <?php if(Auth::user()->id==1): ?>
                                            <a href="<?php echo e(url('dash')); ?>">Panel Administración</a>
                                        <?php else: ?>
                                            <?php $__currentLoopData = $users_rol_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(Auth::user()->id==$user_rol->user_id): ?>
                                                    <?php $__currentLoopData = $roles_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($rol->id==$user_rol->rol_id): ?>
                                                            
                                                            <?php $__currentLoopData = $rol_secciones_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol_seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($rol->id==$rol_seccion->rol_id): ?>
                                                                    <?php $__currentLoopData = $secciones_provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php if($rol_seccion->seccion_id==$seccion->id): ?>
                                                                            <?php if($seccion->ruta=="/dash"): ?>
                                                                                <a href="<?php echo e(url('dash')); ?>">Panel Administración</a>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                       
                                       <a href="<?php echo e(url('dash')); ?>">Mi Perfil</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Salir
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                        
                    </ul>
                </div>
            </div>
        </nav>