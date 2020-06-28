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
            <form  method="POST" action="<?php echo e(route('save-seccion')); ?>" onsubmit="document.getElementById('cre').disabled = true">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre de Sección</label>
                            <input type="text" class="form-control check-key" id="exampleInputEmail1" placeholder="Nombre de Sección" name="nombre_seccion">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tipo</label>
                            <select name="tipo" id="" class="form-control check-key">
                                
                                <option value="Sección">Sección</option>
                                <option value="Sub-Sección">Sub-Sección</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ruta</label>
                            <input type="text" class="form-control check-key" id="exampleInputEmail1" placeholder="Ruta (Por ejemplo: '/dash/ruta1')" name="ruta">
                        </div>
                    </div>
                </div>
                

                
                
            
                
              
              
              <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Sección</button>
            </form>
        </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-user'); ?>
    <script>
        $('.check-key').keyup(function(){
            var band=0;
            $('.check-key').each(function(){

                if($(this).val()!=''){
                    band=band+1;
                }else{
                    band=band+0;
                }
                console.log(band);

                if(band==$('.check-key').length){
                    $('#cre').removeAttr('disabled');
                }else{
                    $('#cre').attr('disabled','disabled');
                }
            });
        }); 
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>