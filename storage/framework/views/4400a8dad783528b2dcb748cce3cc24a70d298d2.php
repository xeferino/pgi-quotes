<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Secciones de Acceso <span class="label label-default"><?php echo e(count($secciones)); ?> Sección(es)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="<?php echo e(url('/dash/seccion/new')); ?>" role="button">+ Nueva Sección</a>
    		</div>
    	</div>
    	
    </div>

        <div class="panel-body">
        	<div id="content-secciones" style="display: none">
			<table class="table table-hover" id="lista-secciones">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombre de Sección</th>
						<th>Tipo</th>
						<th>Ruta</th>
						
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($secciones)>0): ?>
						<?php $i=0; ?>
						<?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td>
									<?php echo e($i=$i+1); ?>

								</td>
								<td>
									<?php echo e($seccion->nombre_seccion); ?>

								</td>
								<td>
									<?php echo e($seccion->tipo); ?>

								</td>
								<td>
									<?php echo e($seccion->ruta); ?>

								</td>
								
								<td>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesSeccion" onclick="clickVerDetallesSeccion(<?php echo e($seccion->id); ?>)">Detalles</button>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarSeccion" onclick="clickEditarSeccion(<?php echo e($seccion->id); ?>)">Editar</button>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarSeccion" onclick="clickEliminarSeccion(<?php echo e($seccion->id); ?>)">Eliminar</button>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">
								Aun no hay Secciones Registradas.
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
			</div>

			<div class="text-center loading">
				Cargando...
				<div >
					<img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
				</div>
			</div>
		</div>

		<div id="seccion-list">
			<?php echo $__env->make('admin.user.modal.modal-seccion-detalles', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('admin.user.modal.modal-seccion-editar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('admin.user.modal.modal-seccion-eliminar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-user'); ?>
<script>

	$('#lista-secciones').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ secciones",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando secciones del _START_ al _END_ de un total de _TOTAL_ secciones",
	        "sInfoEmpty":     "Mostrando secciones del 0 al 0 de un total de 0 secciones",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ secciones)",
	        "sInfoPostFix":   "",
	        "sSearch":        "Buscar:",
	        "sUrl":           "",
	        "sInfoThousands":  ",",
	        "sLoadingRecords": "Cargando...",
	        "oPaginate": {
	            "sFirst":    "Primero",
	            "sLast":    "Último",
	            "sNext":    "Siguiente",
	            "sPrevious": "Anterior"
	        },
	        "oAria": {
	            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
	            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
	        }
	    }
	});


	setTimeout(function(){
		$('.loading').hide();
		$('#content-secciones').show();
	},500);

	function clickVerDetallesSeccion(id){
		appSeccionList.clickVerDetallesSeccion(id);
	}

	function clickEditarSeccion(id){
		appSeccionList.clickEditarSeccion(id);
	}

	function clickEliminarSeccion(id){
		appSeccionList.clickEliminarSeccion(id);
	}

	var appSeccionList = new Vue({
		el: '#seccion-list',
		data: {
			idSeccion: "",
			dataShowModalDataSeccion:{
				on:"",
				name:"",
				type:"",
				route:"",
				created:"",
				updated:""
			},
			// dataShowModalDataRolSeccion:[],
			// dataSecciones:[],
			// color:"",
			// colordos:"",
			cantidadRoles:""
		},
		methods:{
			//methods reutilizables
			putIdSeccion: function(id){
				this.idSeccion = id;
			},
			changeValuesOfPropDataSeccion: function(on, name, type, route, created, updated){
				appSeccionList.dataShowModalDataSeccion.on = on;
				appSeccionList.dataShowModalDataSeccion.name = name;
				appSeccionList.dataShowModalDataSeccion.type = type;
				appSeccionList.dataShowModalDataSeccion.route = route;
				appSeccionList.dataShowModalDataSeccion.created = created;
				appSeccionList.dataShowModalDataSeccion.updated = updated;
			},
			ajaxGetSecciones: function(btnElement){
				$.ajax({
					url: '<?php echo e(url('ajax/seccion/get')); ?>/'+this.idSeccion,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							appSeccionList.changeValuesOfPropDataSeccion(true, data['nombre_seccion'], data['tipo'], data['ruta'], data['created_at'], data['updated_at']);

						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},
			clickVerDetallesSeccion: function(id){
				this.putIdSeccion(id);
				this.changeValuesOfPropDataSeccion("","","","","","");
				this.ajaxGetSecciones($('#load_cargar_seccion_detalles'));
				
			},

			clickEditarSeccion: function(id){
				this.putIdSeccion(id);
				this.changeValuesOfPropDataSeccion("","","","","","");
				this.ajaxGetSecciones($('#load_cargar_seccion_editar'));

			},
			clickGuardarEditarSeccion: function(){
				$('#btn_guardar_seccion_editar').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_seccion').val()},
					url: '<?php echo e(url('ajax/edit/seccion')); ?>/'+this.idSeccion,
					data:{
						nombreSeccion: this.dataShowModalDataSeccion.name,
						tipo: this.dataShowModalDataSeccion.type,
						ruta: this.dataShowModalDataSeccion.route
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_seccion').show();
					},
					success: function(data){
						if(data==1){
							$('#load_editar_seccion').hide();
							$('#myModalEditarSeccion').modal('hide');
							location.href = '<?php echo e(url('dash/seccion/list')); ?>';
						}
					}
				})
			},
			clickEliminarSeccion: function(id){
				this.putIdSeccion(id);
				this.changeValuesOfPropDataSeccion("","","","","","");
				this.ajaxGetSecciones($('#load_cargar_seccion_eliminar'));
				appSeccionList.cantidadRoles = "";

				$.ajax({
					url: '<?php echo e(url('ajax/get/count/seccion/rol')); ?>/'+this.idSeccion,
					type: 'get',
					dataType: 'json',
					success: function(data){
						if(data!=0){
							appSeccionList.cantidadRoles = data;
						}else{
							appSeccionList.cantidadRoles = "";
						}

						
					}
				})
				
			},
			clickGuardarEliminarSeccion: function(){
				$('#btn_guardar_eliminar_seccion').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_seccion').val()},
					url: '<?php echo e(url('ajax/seccion/delete')); ?>/'+this.idSeccion,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_seccion').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_seccion').hide();
							
							$("myModalEliminarSeccion").modal('hide');
							location.href = '<?php echo e(url('dash/seccion/list')); ?>';
						}
					}
				})
			}
			
		}
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.user.base-user-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>