@extends('layouts.app')

@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading2">
                	<div class="row">
                		<div class="col-md-8">
                			Crear Nuevo Documento : 
                		</div>
                		<div class="col-md-4 text-right">
                			<a href="{{ url('procesos/documentos/list') }}" class="btn btn-danger btn-xs"><span class="icon-files-empty"></span> Lista de Documentos</a>
                		</div>
                	</div>
                </div>

                <div class="panel-body">
                	<div id="app-crear">
                		<div class="row sup-content-steps">
                			<div class="col-md-4 col-md-offset-4 text-center content-steps">
                				<span class="steps step-activate">1</span><span style="font-weight: bold;color: #bbb;">-</span><span class="steps">2</span>
                			</div>
                		</div>
	                	<div class="row">
	                		<div class="col-md-4">
	                			<div class="form-group">
				                	<label for="">N° Documento:</label>
				                	<input type="text" class="form-control " v-model="datosDoc.nroDoc" disabled>
				                </div>
	                		</div>
	                		<div class="col-md-5">
	                			
	                		</div>
	                		<div class="col-md-3">
	                					<div class="form-group">
				                			<label for="">Tipo de Documento:</label>
				                			<select name="" v-model="datosDoc.tDoc" class="form-control " >
												
				                				@foreach($tipos_doc as $tipo)
													<option value="{{ $tipo->id }}">{{ $tipo->name }}</option>
				                				@endforeach
				 
				                			</select>
				                		</div>
	                				</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-12">
	                			<div class="form-group">
				                	<label for="">Destinatario:</label>
				                	<input type="text" class="form-control " v-model="datosDoc.destinatario" placeholder="Ingresar Nombres del Destinatario" >
				                </div>
	                		</div>
	                	</div>
	                	<div class="row">
	                		<div class="col-md-6">
	                			<div class="form-group">
				                	<label for="">Asunto:</label>
				                	<input type="text" class="form-control " v-model="datosDoc.asunto" placeholder="Ingresar Asunto" >
				                </div>
	                		</div>
	                		<div class="col-md-6">
	                			<div class="form-group">
				                	<label for="">Referencia:</label>
				                	<input type="text" class="form-control " v-model="datosDoc.referencia" placeholder="Ingresar Referencia" >
				                </div>
	                		</div>
						</div>
						<div class="row">
	                		<div class="col-md-12">
                				<div class="form-group">
			                		<label for="">Nombre del Documento</label>
			                		<input type="text" class="form-control" v-model="datosDoc.nameDoc" placeholder="Ingresar Nombre del Documento" >
			                	</div>
                			</div>
	                	</div>
	                	<input type="hidden" value="{!! csrf_token() !!}" id="token_gDoc">
	                	<div class="row">
	                		<div class="col-md-2">
	                			<button class="btn btn-default" v-on:click="onClickGuardarDatos" id="gDatos">Siguiente</button>
	                		</div>
	                		<div class="col-md-10">
	                			<span style="display:none; margin-top: .5em; color:red; font-weight: bold" v-bind:style="showMessageGDatos" id="dmessage"><span class="icon-warning"></span>&nbsp;&nbsp; @{{ messageDatos }}</span>
	                		</div>
	                	</div>
                	</div>
                	
                	<div class="content-form" style="display: none;">
                		<div class="row sup-content-steps">
                			<div class="col-md-4 col-md-offset-4 text-center content-steps">
                				<span class="steps ">1</span><span style="font-weight: bold;color: #bbb;">-</span><span class="steps step-activate">2</span>
                			</div>
                		</div>

                		

                		<input type="hidden" value="{!! csrf_token() !!}" id="token_gDoc2">

                		<input type="hidden" id="id_documento">
                			
	                		
	                		<div class="form-group" style="display: none" id="ck">
	                			<label for="">Contenido</label>
	                			<textarea name="editor1"  id="editor1" ></textarea>
	                		</div>

							<div class="text-center loading">
								Cargando...
								<div >
									<img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 54px">
								</div>
							</div>

	                		<div class="form-group">
			                	<button class="btn btn-default cre" id="gDoc" onclick="guardarDoc()">Guardar</button>
			                	<button class="btn btn-default cre" data-toggle="modal" data-target="#myModalEnviar" id="geDoc" >Guardar y Enviar</button>
			                </div>
	                		
	                	
                	</div>
                	
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('procesos.document.modal.enviar')

@section('scripts')


    
    <script>
 
	    //--> Función que permite convertir una cadena en slug
	    function slugify(text)
		{
		  return text.toString().toLowerCase()
		    .replace(/\s+/g, '-')           // Replace spaces with -
		    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
		    .replace(/^-+/, '')             // Trim - from start of text
		    .replace(/-+$/, '');            // Trim - from end of text
		}

		//--> App vue.js - appCrearDoc
	    var appCrearDoc = new Vue({
	    	el: '#app-crear',
	    	data:{
	    		datosDoc:{
	    			userDoc: {{ Auth::user()->id }},
	    			nroDoc:"",
	    			tDoc:"",
	    			asunto:"",
	    			referencia:"",
	    			destinatario:"",
	    			nameDoc : "",
	    			slug: "",
	    			contenido : ""
	    		},
	    		showMessageGDatos: "",
	    		messageDatos:"",
	    		showContentForm:false,
	    	},
	    	created: function(){

	    		// ajax para obtener el número de encabezado del documento
	    		$.ajax({
	    			url: "{{ url('ajax/get/docs/all') }}",
	    			type: 'get',
	    			dataType: 'json',
	    			success: function(data){
	    				console.log(data);
	    				var date = new Date();
	    				appCrearDoc.datosDoc.nroDoc = "PGI-"+date.getFullYear();
	    				if(data!=""){
	    					var last = data.length-1;
	    					appCrearDoc.datosDoc.nroDoc = appCrearDoc.datosDoc.nroDoc+"-"+(data[last]['id']+1);
	    				}else{
	    					appCrearDoc.datosDoc.nroDoc = appCrearDoc.datosDoc.nroDoc+"-1";	
	    				}
	    			}
	    		})
	    		
	    	},
	    	methods: {
	    		onClickGuardarDatos: function(){
	    			
	    			date = new Date();
	    			this.datosDoc.slug = slugify(this.datosDoc.nameDoc+' '+date.getFullYear()+" "+date.getMonth()+" "+date.getDate()+" "+date.getHours()+date.getMinutes()+date.getSeconds());

	    			if(this.datosDoc.nroDoc!=""&&this.datosDoc.tDoc!=""&&this.datosDoc.asunto!=""&&this.datosDoc.referencia!=""&&this.datosDoc.destinatario!=""&&this.datosDoc.nameDoc!=""){
	    				$.ajax({
	    					headers: {'X_CSRF_TOKEN':$('#token_gDoc').val()},
	    					url: "{{ url('ajax/save/data/doc') }}",
	    					data: this.datosDoc,
	    					type: 'post',
	    					dataType: 'json',
	    					success: function(data){
	    						$('#id_documento').val(data['id']);
	    						date = new Date();
	    						var nameUser ='{{ Auth::user()->name }}';

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
							                this.dataProcessor.writer.setRules( 'address',
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

						        editor = CKEDITOR.instances['editor1'];

			    				

			    				editor.setData('<p style="text-align:right"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Codigo_QR.svg/250px-Codigo_QR.svg.png"/></p><p style="text-align:right"><strong>'+data['nro_doc']+'</strong></p><p style="text-align:right">Eloy Alfaro (Duran).</p><p style="text-align:right">Asunto: '+data['asunto']+'</p><p style="text-align:right">Referencia: '+data['referencia']+'</p><hr /><address style="text-align: justify; font-size: 12pt;">TITULO </address><address style="text-align: justify; font-size: 12pt;">'+data['destinatario']+'</address><address style="text-align: justify; font-size: 12pt;"><strong>CARGO </strong></address><address style="text-align: justify; font-size: 12pt;"><strong>INSTITUCIÓN </strong></address><address style="text-align: justify; font-size: 12pt;">Eloy Alfaro (Duran).-</address><br /><address style="text-align: justify; font-size: 12pt;">	<span style="font-size: 12pt;">De mi consideraci&oacute;n:</span></address><br /><br /><address style="text-align: justify; font-size: 12pt;">	<span style="font-size: 12pt;">Particular que comunico a ustedes, para fines de ley pertinentes.</span></address><address style="text-align: center; font-size: 12pt;">	<strong>Atentamente</strong></address><address style="text-align: center; font-size: 12pt;">	<strong>DIOS, PATRIA Y LIBERTAD</strong></address><br /><br /><br /><address style="text-align: center; font-size: 12pt;"><strong>ABG. NOMBRE </strong></address><address style="text-align: center; font-size: 12pt;"><strong>CARGO&nbsp;</strong></address><br /><br /><br />');
	    					}
	    				})
	    				console.log(this.datosDoc);
	    				$('#gDatos').attr('disabled','disabled');
	    				band=1;
	    				$('#app-crear').hide();
	    				$('.content-form').fadeIn();

	    				setTimeout(function(){
	    					$('#ck').show();
	    					$('.loading').hide();
	    				}, 1000);

	    				

	    			}else{
	    				this.showMessageGDatos = "display:block";
	    				this.messageDatos = "Todos los Campos son Obligatorios. ¡Por Favor, ingrese datos correctamente!";
	    				setTimeout(function(){
	    					this.messageDatos = "";
	    					this.showMessageGDatos = "display:none";
	    				}, 1200);
	    			}

	    			

	    			
	    		}
	    	}
	    });

		//Función reusable que envía el documento en ckeditor por medio de ajax al server
		function ajaxEnvioDoc(data){
			$.ajax({
	    		headers: {'X_CSRF_TOKEN':$('#token_gDoc2').val()},
	    		url: '{{ url('ajax/savedoc/after') }}/'+$('#id_documento').val(),
	    		data: data,
	    		type: 'post',
	    		dataType: 'json',
	    		success: function(data){
	    			if(data==1){
	    				location.href = "{{ url('procesos/documentos/list') }}";
	    			}
	    		}
	    	});
		}

		//Función que guarda el documento, boton "Guardar"
	    function guardarDoc(){

	    	$('#gDoc').attr('disabled','disabled');
	    	
	    	var doc = {
	    		userDoc : {{ Auth::user()->id }},
	    		contenido : CKEDITOR.instances.editor1.getData()
	    	}

	    	ajaxEnvioDoc(doc);
	    	
	    }

	    //Función que guarda el documento y envía por correo, boton "OK" del modal
	    function guardarEnviarDoc(){

	    	var email = $('#email-destinatario').val();

	    	if(email==""){
	    		$('#message-email').html('<span style="color:red;font-weight:bold">¡Por Favor, agrega un correo!</span>');
	    	}else{
	    		var doc = {
		    		userDoc : {{ Auth::user()->id }},
		    		contenido : CKEDITOR.instances.editor1.getData(),
		    		correo: $('#email-destinatario').val()
		    	}

		    	ajaxEnvioDoc(doc);

		    	$('#myModalEnviar').modal('hide');
	    	}
	    	
	    	
	    	
	    	
	    }



    </script>

    
@endsection