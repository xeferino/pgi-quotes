<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Tipo de Documento </b>
    		</div>
    		<div class="col-md-4 text-right">
    			
    		</div>
    	</div>
    	
    </div>

    <div class="panel-body">
		<form  method="POST" action="<?php echo e(route('save-doc-type')); ?>" onsubmit="document.getElementById('cre').disabled = true">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombreRol">Nombre del Tipo de Documento</label>
                            <input type="text" class="form-control check-key"  placeholder="Ingrese nombre del tipo de Documento" name="name" value="<?php echo e(old('nombre_rol')); ?>" required autofocus>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Rol</button>
        </form>
   	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-doc'); ?>

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
<?php echo $__env->make('admin.doc.base-doc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>