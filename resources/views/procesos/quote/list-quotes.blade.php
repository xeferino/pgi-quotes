@extends('procesos.quote.base-quotes')

@section('panel-content')
<div class="panel panel-default" >
    <div class="panel-heading">
    	<div class="row">
    		<div class="col-md-8">
    			<b>Lista de Citas Registradas <span class="label label-default">{{ count($quotes) }} Cita(s)</span></b>
    		</div>
    		<div class="col-md-4 text-right">
    			<a class="btn btn-danger btn-xs" href="{{ url('/dash/quote/new') }}" role="button">+ Nueva Cita</a>
    		</div>
    	</div>
    </div>

        <div class="panel-body">
			@if(count($quotes)>0)
				<div id="content-citas" style="display: none">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-hover" id="lista-citas">
									<thead>
										<tr>
											<th>N°</th>
											<th>Título</th>
											<th>Descripción</th>
											<th>Tipo</th>
											<th>Fecha</th>
											<th>Estatus</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=0; ?>
										<?php $cerrada=0; ?>
										<?php $asigada=0; ?>
										@foreach($quotes as $quote)
											<tr id="user_{{ $i=$i+1 }}">
												<td>{{ $i }}</td>
												<td>{{ $quote->title }}</td>
												<td>{{ $quote->description }}</td>
												<td>{{ $quote->type }}</td>
												<td>{{ $quote->date }}</td>
												<td>
													@if ($quote->status==1)
														<?php $cerrada++; ?>
														<button class="btn btn-danger btn-xs">Cerrada</button>
													@else
														<?php $asigada++; ?>
														<button class="btn btn-success btn-xs">Asignada</button>
													@endif
												</td>
												<td>
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalDetallesQuote" onclick="clickVerDetallesQuote({{ $quote->id }})">Detalles</button>
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEditarQuote" onclick="clickEditarQuote({{ $quote->id }})">Editar</button>
													<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalEliminarQuote" onclick="clickEliminarQuote({{ $quote->id }})">Eliminar</button>
												</td>
											</tr>			
										@endforeach
									</tbody>
										<tr class="tfoo" style="color: #000; background-color: #f1c40f;	border-color: #f39c12; font-weight: bold;">
											<td colspan="3">Leyenda: </td>
											<td colspan="2">Asignadas <button class="btn btn-success btn-xs">({{ $asigada}})</button> </td>
											<td colspan="2">Cerradas <button class="btn btn-danger btn-xs">({{ $cerrada}})</button> </td>
										</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="text-center loading">
					Cargando...
					<div >
						<img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
					</div>
				</div>
			@else
				<div class="text-center">
					Aun no hay citas Registradas.
				</div>
			@endif
		</div>

		<div id="quote-modal">
			@include('procesos.quote.modal.modal-detalles-quote')
			@include('procesos.quote.modal.modal-editar-quote', ['persons' => $persons])
			@include('procesos.quote.modal.modal-eliminar-quote')
		</div>
</div>

@endsection

@section('scripts-quote')
<script>

	$('#lista-citas').DataTable({
	    "language": {
	        "sProcessing":    "Procesando...",
	        "sLengthMenu":    "Mostrar _MENU_ citas",
	        "sZeroRecords":   "No se encontraron resultados",
	        "sEmptyTable":    "Ningún dato disponible en esta tabla",
	        "sInfo":          "Mostrando citas del _START_ al _END_ de un total de _TOTAL_ citas",
	        "sInfoEmpty":     "Mostrando citas del 0 al 0 de un total de 0 citas",
	        "sInfoFiltered":  "(filtrado de un total de _MAX_ citas)",
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

	
	/* $("#persona_select").change(function() {
	  var texto = $(this).find('option:selected').text();
	  alert(texto);
	}); */

	setTimeout(function(){
		$('.loading').hide();
		$('#content-citas').show();
	},500);

	function clickVerDetallesQuote(id){
		appQuoteList.clickVerDetallesQuote(id);
	}

	function clickEditarQuote(id){
		appQuoteList.clickEditarQuote(id);
	}

	function clickEliminarQuote(id){
		appQuoteList.clickEliminarQuote(id);
	}

	var appQuoteList = new Vue({
		el: '#quote-modal',
		data: {
			idQuote:'',
			dataShowModalDataQuote:{
				on: "",
				persons_id:"",
				title:"",
				description:"",
				type:"",
				date:"",
				observation:"",
				status:"",
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
			putidQuote: function(id){
				this.idQuote = id;
			},

			persona: function(event){
				var mytext = $("#pers option:selected").text();
				appQuoteList.dataShowModalDataQuote.fullnames = mytext;
			},
			changeValuesOfPropDataQuote: function(on, persons_id, title, description, type, date, observation, status, fullnames, email, phone, created, updated){
				appQuoteList.dataShowModalDataQuote.on = on;
				appQuoteList.dataShowModalDataQuote.persons_id = persons_id;
				appQuoteList.dataShowModalDataQuote.title = title;
				appQuoteList.dataShowModalDataQuote.description = description;
				appQuoteList.dataShowModalDataQuote.type = type;
				appQuoteList.dataShowModalDataQuote.date = date;
				appQuoteList.dataShowModalDataQuote.observation = observation;
				appQuoteList.dataShowModalDataQuote.status = status;
				appQuoteList.dataShowModalDataQuote.fullnames = fullnames;
				appQuoteList.dataShowModalDataQuote.email = email;
				appQuoteList.dataShowModalDataQuote.phone = phone;
				appQuoteList.dataShowModalDataQuote.created = created;
				appQuoteList.dataShowModalDataQuote.updated = updated;
			},
			ajaxGetQuotes: function(btnElement){
				$.ajax({
					url: '{{ url('ajax/quote/get') }}/'+this.idQuote,
					type: 'get',
					dataType: 'json',
					beforeSend: function(){
						btnElement.show();
						$("#pers").val();
					},
					success: function(data){
						btnElement.hide();
						if(data!=0){
							$("#pers").val(data.quote[0].persons_id);
							appQuoteList.changeValuesOfPropDataQuote(true, data.quote[0].persons_id, data.quote[0].title, data.quote[0].description,  data.quote[0].type, data.quote[0].date, data.quote[0].observation, data.quote[0].status, data.quote[0].fullnames, data.quote[0].email, data.quote[0].phone, data.quote[0].created_at, data.quote[0].updated_at);
						}else{
							console.log('Servidor no Responde');
						}
					}
				});
			},

			clickVerDetallesQuote: function(id){
				this.putidQuote(id);
				this.changeValuesOfPropDataQuote("","","","","","","","","","","","","");
				this.ajaxGetQuotes($('#load_cargar_data_detalles'));
			},
			clickEditarQuote: function(id){
				this.putidQuote(id);
				this.changeValuesOfPropDataQuote("","","","","","","","","","","","","");
				this.ajaxGetQuotes($('#load_cargar_data_editar'));
			},

			clickGuardarEditarQuote: function(){
				$('#btn_guardar_editar_quote').attr('disabled','disabled');
				var id =  $("#pers").val();
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_edit_quote').val()},
					url: '{{ url('ajax/quote/edit') }}/'+this.idQuote,
					data: {
						title:this.dataShowModalDataQuote.title,
						description: this.dataShowModalDataQuote.description,
						type: this.dataShowModalDataQuote.type,
						date: this.dataShowModalDataQuote.date,
						observation: this.dataShowModalDataQuote.observation,
						status: this.dataShowModalDataQuote.status,
						persons_id: this.dataShowModalDataQuote.persons_id
					},
					type: 'post',
					dataType: 'json',
					beforeSend: function(){
						$('#load_editar_quote').show();
					},
					success: function(data){

						if(data==1){
							$('#load_editar_quote').hide();
							
							$("#myModalEditarQuote").modal('hide');
							location.href = '{{ url('dash/quote/list') }}';
						}
					}
				})
			},
			clickEliminarQuote: function(id){
				this.putidQuote(id);
				this.changeValuesOfPropDataQuote("","","","","","","","","","","","","");
				this.ajaxGetQuotes($('#load_cargar_data_eliminar'));
			},
			clickGuardarEliminarQuote: function(){
				$('#btn_guardar_eliminar_quote').attr('disabled','disabled');
				$.ajax({
					headers: {'X_CSRF_TOKEN':$('#token_eliminar_quote').val()},
					url: '{{ url('ajax/quote/delete') }}/'+this.idQuote,
					type: 'delete',
					dataType: 'json',
					beforeSend: function(){
						$('#load_eliminar_quote').show();
					},
					success: function(data){

						if(data==1){
							$('#load_eliminar_quote').hide();
							
							$("#myModalEliminarQuote").modal('hide');
							location.href = '{{ url('dash/quote/list') }}';
						}
					}
				})
			}
		}
	});
</script>
@endsection

