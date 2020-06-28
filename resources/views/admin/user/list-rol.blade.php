@extends('admin.user.base-user-admin')

@section('panel-content')
<div class="panel panel-default" >

    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Roles Registrados <span class="label label-default">{{ count($roles) }} Roles(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="{{ url('/dash/rol/new') }}" role="button">+ Nuevo Rol</a>
    			
    		</div>
    	</div>
    	
    </div>
		


        <div class="panel-body">
        	<div id="content-secciones" style="display: none">
			<table class="table table-hover" id="lista-roles">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombre Rol</th>
						<th>Secciones de Rol</th>
						<th style="width: 180px">Opciones</th>
					</tr>
				</thead>
				<tbody>
					
					@if(count($roles)>0)
						<?php $i=0; ?>
						@foreach($roles as $rol)
							<tr>
								<td>
									{{ $i=$i+1 }}
								</td>
								<td>
									{{ $rol->nombre_rol }}
								</td>
								<td> 
									@if(count($secciones_rol)>0)
										
										<?php $k=0; ?>
										@foreach($secciones_rol as $seccion_rol)
											@if($seccion_rol->rol_id==$rol->id)
												<?php $k=$k+1; ?>
											@endif
										@endforeach

										<?php $j=0; ?>
										[
										@foreach($secciones_rol as $seccion_rol)
											@if($seccion_rol->rol_id==$rol->id)
												@foreach($secciones as $seccion)
													@if($seccion_rol->seccion_id==$seccion->id)
														
														<span class="hover-a" data-placement="top" title="Ruta: {{ $seccion->ruta }}" id="ruta_{{ $seccion->id }}{{ $rol->id }}" onmouseover="onSeccion({{ $seccion->id }}{{ $rol->id }})">{{ $seccion->nombre_seccion }}</span>
													@endif
												@endforeach
												
												<?php $j=$j+1; ?>
											@endif

											@if($j<$k and $j>0)
												,
											@endif
										@endforeach
										]

									@else
										<small style="color:red">No tiene Secciones.</small>
									@endif
									
								</td>
								<td>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesRol" onclick="clickVerDetallesRol({{ $rol->id }})">Detalles</button>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarRol" onclick="clickEditarRol({{ $rol->id }})">Editar</button>
									<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarRol" onclick="clickEliminarRol({{ $rol->id }})">Eliminar</button>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="5" class="text-center">
								Aun no hay Roles Registrados.
							</td>
						</tr>
					@endif
				</tbody>
			</table>
			</div>
			<div class="text-center loading">
				Cargando...
				<div >
					<img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
				</div>
			</div>
		</div>

		<div id="rol-list">
			@include('admin.user.modal.modal-rol-detalles')
			@include('admin.user.modal.modal-rol-editar')
			@include('admin.user.modal.modal-rol-eliminar')
		</div>
		

	</div>

@endsection

@section('scripts-user')
<script>
	$('#lista-roles').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ roles",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando roles del _START_ al _END_ de un total de _TOTAL_ roles",
	        "sInfoEmpty":     "Mostrando roles del 0 al 0 de un total de 0 roles",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ roles)",
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

	function clickVerDetallesRol(id){
		appRolList.clickVerDetallesRol(id);
	}

	function clickEditarRol(id){
		appRolList.clickEditarRol(id);
	}

	function clickEliminarRol(id){
		appRolList.clickEliminarRol(id);
	}
	function onSeccion(id){
		$("#ruta_"+id).tooltip('show');
	}

	var appRolList = new Vue({
		el: '#rol-list',
		data: {
			idRol: "",
			dataShowModalDataRol:{
				on:"",
				name:"",
				created:"",
				updated:""
			},
			dataShowModalDataRolSeccion:[],
			dataSecciones:[],
			color:"",
			colordos:"",
			cantidadUsers:""
		},
		methods:{
			//methods reutilizables
			putIdRol: function(id){
				this.idRol = id;
			},
			changeValuesOfPropDataRol: function(on, name, created, updated){
				appRolList.dataShowModalDataRol.on = on;
				appRolList.dataShowModalDataRol.name = name;
				appRolList.dataShowModalDataRol.created = created;
				appRolList.dataShowModalDataRol.updated = updated;
			},
			ajaxGetRoles: function(btnElement){
				$.ajax({
					url: '{{ url('ajax/rol/get') }}/'+this.idRol,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							appRolList.changeValuesOfPropDataRol(true, data['nombre_rol'], data['created_at'], data['updated_at']);
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},
			ajaxGetSeccionesRol: function(){
				$.ajax({
					url: '{{ url('ajax/rol/secciones/get') }}/'+this.idRol,
					type: 'get',
					dataType: 'json',
					success: function(data){
						for (var i = 0; i < data.length; i++) {
							appRolList.dataShowModalDataRolSeccion.push({nombreSeccion : data[i]['nombre_seccion']});
						}
					}
				})
			},

			//methods
			

			clickVerDetallesRol: function(id){
				this.putIdRol(id);
				this.changeValuesOfPropDataRol("","","","");
				this.ajaxGetRoles($('#load_cargar_rol_detalles'));
				appRolList.dataShowModalDataRolSeccion = [];
				this.ajaxGetSeccionesRol();
				
			},

			clickEditarRol: function(id){
				this.putIdRol(id);
				this.dataSecciones = [];
				this.color = "background-color:white";
				this.colordos = "background-color:white";
				this.changeValuesOfPropDataRol("", "","","");
				this.ajaxGetRoles($('#load_cargar_rol_editar'));
				appRolList.dataShowModalDataRolSeccion = [];
				this.ajaxGetSeccionesRol();



			},
			onClickCheckSeccion: function(id){

				if($('#seccion_'+id).is(':checked')){
					this.dataSecciones.push({id:id, nombreSeccion: $('#sec_'+id).text()});
				}else{ 
					
					for (var i = 0; i < this.dataSecciones.length; i++) {
						if(this.dataSecciones[i]['id']==id){
							this.dataSecciones.splice(i,1);
						}
					}

				}

				if(this.dataSecciones.length==0){
					this.dataSecciones = [];
					this.color = "background-color:white";
					this.colordos = "background-color:white"
				}else{
					this.color = "background-color:#f1c40f61";
					this.colordos = "background-color:#eee";
				}
			},
			clickGuardarEditarRol: function(){
				$('#btn_guardar_rol_editar').attr('disabled','disabled');

				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_rol').val()},
					url: '{{ url('ajax/edit/rol') }}/'+this.idRol,
					data:{
						nombreRol: this.dataShowModalDataRol.name,
						dataSecciones : this.dataSecciones
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_rol').show();
					},
					success: function(data){
						if(data==1){
							$('#load_editar_rol').hide();
							$('#myModalEditarRol').modal('hide');
							location.href = '{{ url('dash/rol/list') }}';
						}
					}
				})
			},
			clickEliminarRol: function(id){
				appRolList.cantidadUsers = "";
				this.putIdRol(id);
				this.dataSecciones = [];
				this.changeValuesOfPropDataRol("","","","");
				this.ajaxGetRoles($('#load_cargar_rol_eliminar'));

				$.ajax({
					url: '{{ url('ajax/get/count/rol/user') }}/'+this.idRol,
					type: 'get',
					dataType: 'json',
					success: function(data){
						if(data!=0){
							appRolList.cantidadUsers = data;
						}else{
							appRolList.cantidadUsers = "";
						}
					}
				})
				
			},
			clickGuardarEliminarRol: function(){
				$('#btn_guardar_eliminar_rol').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_rol').val()},
					url: '{{ url('ajax/rol/delete') }}/'+this.idRol,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_rol').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_rol').hide();
							
							$("myModalEliminarRol").modal('hide');
							location.href = '{{ url('dash/rol/list') }}';
						}
					}
				})
			}
			
		}
	});
</script>
@endsection

