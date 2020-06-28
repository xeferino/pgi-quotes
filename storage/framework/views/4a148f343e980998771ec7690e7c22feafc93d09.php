<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Nueva Persona </b>
    		</div>
    		<div class="col-md-4 text-right">
    			
    		</div>
    	</div>
    	
    </div>

    <div class="panel-body">
		<form  method="POST" action="<?php echo e(route('save-person')); ?>" onsubmit="document.getElementById('cre').disabled = true">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="fullnames">Nombres y Apellidos</label>
                            <input type="text" class="form-control check-key"  placeholder="Ingrese nombres y apellidos de la persona" name="fullnames" value="<?php echo e(old('fullnames')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control check-key"  placeholder="Ingrese el email de la persona" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Telefono</label>
                            <input type="text" class="form-control check-key"  placeholder="Ingrese el telefono de la persona" name="phone" value="<?php echo e(old('phone')); ?>" required autofocus>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Persona</button>
        </form>
   	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-people'); ?>

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
<?php echo $__env->make('admin.people.base-people', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>