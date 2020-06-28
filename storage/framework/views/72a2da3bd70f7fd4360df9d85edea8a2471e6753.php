<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading2">
					<div class="row">
                		<div class="col-md-8">
                			Editar Documento : "<?php echo e($documento->nombre_documento); ?>"
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="<?php echo e(url('procesos/crear-documento')); ?>" class="btn btn-danger btn-xs">+ Nuevo Documento</a>
                			<a href="<?php echo e(url('procesos/documentos/list')); ?>" class="btn btn-danger btn-xs"><span class="icon-files-empty"></span> Lista de Documentos</a>
                		</div>
                	</div>
                </div>

                <div class="panel-body">
                	<div class="content-form" style="display: none">
                		
                			<div class="row">
                				<div class="col-md-9">
                					<div class="form-group">
			                			<label for="">Nombre del Documento</label>
			                			<input type="text" class="form-control check-key" id="nDoc" placeholder="Ingresar Nombre del Documento" value="<?php echo e($documento->nombre_documento); ?>">
			                		</div>
                				</div>
                				<div class="col-md-3">
                					<div class="form-group">
			                			<label for="">Tipo de Documento</label>
			                			<select name="" id="tDoc" class="form-control ">
			                				<?php $__currentLoopData = $tipos_doc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($tipo->id); ?>"><?php echo e($tipo->name); ?></option>
			                				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			 
			                			</select>
			                		</div>
                				</div>
                			</div>
	                		
	                		<div class="form-group">
	                			<label for="">Contenido</label>
	                			<textarea name="editor1"  id="editor1" ></textarea>
	                		</div>

							<input type="hidden" value="<?php echo csrf_token(); ?>" id="token_gDocEdit">

	                		<div class="form-group">
			                	<button class="btn btn-default cre" id="gDoc"  onclick="guardarDoc()">Guardar Cambios</button>
			                	<button class="btn btn-default cre" >Guardar Cambios y Enviar</button>
			                </div>
	                		
	                	
                	</div>
                	
                    <div class="text-center loading">
						Cargando...
						<div >
							<img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php
	$html = $documento->contenido_documento ;
?>

<?php $__env->startSection('scripts'); ?>
	
	<script>
		
        CKEDITOR.replace( 'editor1', {
        	height: '600px',
        	on : {
	            instanceReady : function( ev )
	            {
	                // Output paragraphs as <p>Text</p>.
	                this.dataProcessor.writer.setRules( 'p',
	                    {
	                        indent : false,
	                        breakBeforeOpen : false,
	                        breakAfterOpen : false,
	                        breakBeforeClose : false,
	                        breakAfterClose : false
	                    });
	                this.dataProcessor.writer.setRules( 'hr',
	                    {
	                        indent : false,
	                        breakBeforeOpen : false,
	                        breakAfterOpen : false,
	                        breakBeforeClose : false,
	                        breakAfterClose : false
	                    });
	            }
	        }
        } );

        var editor = CKEDITOR.instances['editor1'];  
        editor.setData('<?php echo $html; ?>');
        


        setTimeout(function(){
			$('.loading').hide();
			$('.content-form').show();
		},1000);

        function slugify(text)
		{
		  return text.toString().toLowerCase()
		    .replace(/\s+/g, '-')           // Replace spaces with -
		    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
		    .replace(/^-+/, '')             // Trim - from start of text
		    .replace(/-+$/, '');            // Trim - from end of text
		}



		function guardarDoc(){
			var url = slugify($('#nDoc').val()+' '+date.getFullYear()+" "+date.getMonth()+" "+date.getDate()+" "+date.getHours()+date.getMinutes()+date.getSeconds());
			$('#gDoc').attr('disabled','disabled');
	    	
	    	var doc = {
	    		userDoc : <?php echo e(Auth::user()->id); ?>,
	    		nameDoc : $('#nDoc').val(),
	    		tipoDoc : $('#tDoc').val(),
	    		slug: url,
	    		contenido : CKEDITOR.instances.editor1.getData()
	    	};

	    	var token = $('#token_gDocEdit').val();

	    	$.ajax({
	    		headers: {'X_CSRF_TOKEN':token},
	    		url: '<?php echo e(url('ajax/save/doc')); ?>/<?php echo e($documento->id); ?>',
	    		data: doc,
	    		type: 'post',
	    		dataType: 'json',
	    		success: function(data){
	    			if(data==1){
	    				location.href = "<?php echo e(url('procesos/documentos/list')); ?>";
	    			}
	    		}
	    	});
		}
	</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>