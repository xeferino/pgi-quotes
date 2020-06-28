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
            <form  method="POST" action="<?php echo e(route('save-rol')); ?>" onsubmit="document.getElementById('cre').disabled = true">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombreRol">Nombre de Rol</label>
                            <input type="text" class="form-control" id="nombreRol" placeholder="Nombre de Rol" name="nombre_rol" value="<?php echo e(old('nombre_rol')); ?>" required autofocus>
                        </div>
                    </div>
                </div>
                <h5><b>Agregar Secciónes al Rol:</b></h5>
                <p style="color:#888"><small>Debes elegir al menos una sección para el Nuevo Rol que estas creando.</small></p>
                <div class="row">
                    <?php if(count($secciones)>0): ?>
                        <?php $i=0; ?>
                        <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3">
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="seccion_<?php echo e($i=$i+1); ?>" class="checkup"> <?php echo e($seccion->nombre_seccion); ?>

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

                
              
              
              
              
              <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Rol</button>
            </form>
        </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-user'); ?>
    <script>
        bandKey=0;
        bandCheck=0;

        //evaluando por keyup
        $('#nombreRol').keyup(function(){
            if($(this).val()!=""){
                bandKey = 1;
            }else{
                bandKey = 0;
            }

            $('.checkup').click(function(){
                var onBand = 0; 
                var offBand = 0; //opcional

                $('.checkup').each(function(){
                    if($(this).is(':checked')){
                        onBand = onBand + 1; 
                    }else{
                        offBand = offBand + 1; //opcional
                    }
                });

                if(onBand!=0){
                    bandCheck=1;
                }else{
                    bandCheck=0;
                }

                if(bandKey==1&bandCheck==1){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });


        });

        //evaluando por check  
        $('.checkup').click(function(){
            var onBand = 0; 
            var offBand = 0; //opcional

            $('.checkup').each(function(){
                if($(this).is(':checked')){
                    onBand = onBand + 1; 
                }else{
                    offBand = offBand + 1; //opcional
                }
            });

            if(onBand!=0){
                bandCheck=1;
            }else{
                bandCheck=0;
            }

            $('#nombreRol').keyup(function(){
                if($(this).val()!=""){
                    bandKey = 1;
                }else{
                    bandKey = 0;
                }

                if(bandKey==1&bandCheck==1){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });

            
        });

        


    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>