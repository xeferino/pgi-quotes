<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Crear Nueva Cita </b>
    		</div>
    		<div class="col-md-4 text-right">
    			
    		</div>
    	</div>
    	
    </div>

    <div class="panel-body">
		<form  method="POST" action="<?php echo e(route('save-quote')); ?>" onsubmit="document.getElementById('cre').disabled = true">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" class="form-control check-key"  placeholder="Ingrese el titulo de la cita" name="title" value="<?php echo e(old('title')); ?>" required autofocus>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="person">Persona</label>
                            <select name="persona" class="form-control check-key" required autofocus>
                                <option value="">.::Selecione::.</option>
                            <?php $__currentLoopData = $persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($person->id); ?>"><?php echo e($person->fullnames); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="datetime-local" min="<?php echo e(date('Y-m-d').'T00:00'); ?>" class="form-control check-key" name="date" value="<?php echo e(old('date')); ?>" required autofocus>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea class="form-control check-key" placeholder="Ingrese la descripción de la cita" name="description" value="<?php echo e(old('description')); ?>" required autofocus cols="15" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Observación</label>
                            <textarea class="form-control check-key" placeholder="Ingrese la Observación de la cita" name="observation" value="<?php echo e(old('observation')); ?>" required autofocus cols="15" rows="5"></textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-tema" id="cre" disabled>Guardar Cita</button>
        </form>
   	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-quote'); ?>

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
<?php echo $__env->make('procesos.quote.base-quotes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>