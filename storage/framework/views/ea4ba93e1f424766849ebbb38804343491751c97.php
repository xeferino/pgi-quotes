<?php $__env->startSection('panel-content'); ?>
<div class="panel panel-default" >
    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Personas Registradas <span class="label label-default"><?php echo e(count($persons)); ?> Persona(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="<?php echo e(url('/dash/people/new')); ?>" role="button">+ Nueva Persona</a>
    		</div>
    	</div>
    </div>

        <div class="panel-body">
			<?php if(count($persons)>0): ?>
				<div id="content-personas" style="display: none">
					<table class="table table-hover" id="lista-personas">
						<thead>
							<tr>
								<th>N°</th>
								<th>Nombres y Apellidos</th>
								<th>Correo Electrónico</th>
								<th>Telefono</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=0; ?>
							<?php $__currentLoopData = $persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr id="user_<?php echo e($i=$i+1); ?>">
									<td><?php echo e($i); ?></td>
									<td><?php echo e($person->fullnames); ?></td>
									<td><?php echo e($person->email); ?></td>
									<td><?php echo e($person->phone); ?></td>
									<td >
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesPersona" onclick="clickVerDetallesPersona(<?php echo e($person->id); ?>)">Detalles</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarPersona" onclick="clickEditarPersona(<?php echo e($person->id); ?>)">Editar</button>
										<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarPersona" onclick="clickEliminarPersona(<?php echo e($person->id); ?>)">Eliminar</button>
									</td>
								</tr>			
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
				<div class="text-center loading">
					Cargando...
					<div >
						<img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 54px">
					</div>
				</div>
			<?php else: ?>
				<div class="text-center">
					Aun no hay Personas Registradas.
				</div>
			<?php endif; ?>
		</div>

		<div id="person-modal">
			<?php echo $__env->make('admin.people.modal.modal-detalles-person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('admin.people.modal.modal-editar-person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('admin.people.modal.modal-eliminar-person', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts-people'); ?>
<script>

	$('#lista-personas').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ personas",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando personas del _START_ al _END_ de un total de _TOTAL_ personas",
	        "sInfoEmpty":     "Mostrando personas del 0 al 0 de un total de 0 personas",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ personas)",
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
		$('#content-personas').show();
	},500);

	function clickVerDetallesPersona(id){
		appPersonList.clickVerDetallesPersona(id);
	}

	function clickEditarPersona(id){
		appPersonList.clickEditarPersona(id);
	}

	function clickEliminarPersona(id){
		appPersonList.clickEliminarPersona(id);
	}

	var appPersonList = new Vue({
		el: '#person-modal',
		data: {
			idPerson:'',
			dataShowModalDataPerson:{
				on: "",
				fullnames:"",
				email:"",
				phone:"",
				created:"",
				updated:""
			}
		},
		created: function(){
			
		},
		methods:{

			//methods reutilizables
			putIdPerson: function(id){
				this.idPerson = id;
			},
			changeValuesOfPropDataPerson: function(on, fullnames, email, phone, created, updated){
				appPersonList.dataShowModalDataPerson.on = on;
				appPersonList.dataShowModalDataPerson.fullnames = fullnames;
				appPersonList.dataShowModalDataPerson.email = email;
				appPersonList.dataShowModalDataPerson.phone = phone;
				appPersonList.dataShowModalDataPerson.created = created;
				appPersonList.dataShowModalDataPerson.updated = updated;
			},
			ajaxGetPersons: function(btnElement){
				$.ajax({
					url: '<?php echo e(url('ajax/people/get')); ?>/'+this.idPerson,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							appPersonList.changeValuesOfPropDataPerson(true, data['fullnames'], data['email'], data['phone'], data['created_at'], data['updated_at']);
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},

			clickVerDetallesPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_detalles'));
			},
			clickEditarPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_editar'));
			},

			clickGuardarEditarPersona: function(){
				$('#btn_guardar_editar_persona').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_person').val()},
					url: '<?php echo e(url('ajax/people/edit')); ?>/'+this.idPerson,
					data: {
						fullnames:this.dataShowModalDataPerson.fullnames,
						email: this.dataShowModalDataPerson.email,
						phone: this.dataShowModalDataPerson.phone
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_person').show();
					},
					success: function(data){

						if(data==1){
							$('#load_editar_person').hide();
							
							$("#myModalEditarPersona").modal('hide');
							location.href = '<?php echo e(url('dash/people/list')); ?>';
						}
					}
				})
			},
			clickEliminarPersona: function(id){
				this.putIdPerson(id);
				this.changeValuesOfPropDataPerson("","","","","","");
				this.ajaxGetPersons($('#load_cargar_data_eliminar'));
			},
			clickGuardarEliminarUser: function(){
				$('#btn_guardar_eliminar_person').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_person').val()},
					url: '<?php echo e(url('ajax/people/delete')); ?>/'+this.idPerson,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_person').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_person').hide();
							
							$("#myModalEliminarPersona").modal('hide');
							location.href = '<?php echo e(url('dash/people/list')); ?>';
						}
					}
				})
			}
		}
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.people.base-people', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>