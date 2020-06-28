@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12" id="app-doc">
            <div class="panel panel-default">
                <div class="panel-heading2">
                	<div class="row">
                		<div class="col-md-8">
                			Documentos :
                		</div>
                		<div class="col-md-4 text-right">
                            
                            <div class="btn-group">
                              <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-drawer"></span> Bandeja de Documentos <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="#Todos">Documentos No Enviados</a></li>
                                <li><a href="#Todos">Documentos Enviados</a></li>
                                
                              </ul>
                            </div>
                			<a href="{{ url('procesos/crear-documento') }}" class="btn btn-danger btn-xs">+ Nuevo Documento</a>
                		</div>
                	</div>
                	
            	</div>

                <div class="panel-body">
                    

                	<div class="row">
                		<div class="col-md-6" style="padding-top: 1em">
                			<p>Lista de Documentos Creados:   <span class="label label-success">{{ count($documentos) }} documento(s)</span></p>
                		</div>
                        <div class="col-md-2 text-right" style="padding-right: 5px">
                            <!-- Single button -->
                            <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon-filter2"></span> Tipo Documento <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="#Todos" v-on:click="onClickTypeFilter(0)">Todos</a></li>
                                @foreach($doctypes as $doctype)
                                    <li><a href="#{{ $doctype->name }}" v-on:click="onClickTypeFilter({{ $doctype->id }})">{{ $doctype->name }}</a></li>
                                @endforeach
                                
                              </ul>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-left: 5px">
                            <div class="input-group" style="padding-bottom: 2em">
                              <span class="input-group-addon" id="basic-addon1"><span class="icon-search2"></span></span>
                              <input type="text" class="form-control" placeholder="Buscar Documentos" aria-describedby="basic-addon1" v-on:keyup="onKeyWord" v-model="keyWordSearch">
                            </div>
                        </div>
                	</div>
                	
                	<div class="row">
                        <template v-if="showDocInit==true"> 
                        
    	                	@foreach($documentos as $documento)
    	                	<div class="col-md-2" >

                                <a href="{{ url('procesos/documento') }}/{{ Auth::user()->id }}/edit/{{ $documento->slug }}">
        	                		<div class="item-doc">
        	                			<b>{{ $documento->nombre_documento }}</b>
                                        <p style="padding-top: .5em; color: #888"><small>{{ $documento->created_at }}</small></p>

                                        @if($documento->state==1)
                                            <div style="color: blue">
                                                <span class="icon-check-circle"></span>&nbsp;<small>Enviado</small>
                                            </div>
                                        @endif
                                        
        	                			<div class="labell">
        	                				@foreach($doctypes as $doctype)
        	                					@if($doctype->id==$documento->tipo_id)
        											{{ $doctype->name }}
        	                					@endif
        	                					
        	                				@endforeach
        	                			</div>
        	                		</div>

    	                		</a>
                                <p class="preview-doc text-center" data-toggle="modal" data-target="#myModalPreviewDoc" v-on:click="onClickPreview({{ $documento->id }})">
                                    <span class="icon-eye2"></span> Vista Previa
                                </p>

    	                	</div>
    	                	@endforeach
                        </template>
                        <template v-if="showDocInit==false"  >
                            <div class="col-md-2" v-for="documento in dataDocFind">

                                <a v-bind:href="documento.url">
                                    <div class="item-doc">
                                        <b>@{{ documento.nombre }}</b>
                                        <p style="padding-top: .5em; color: #888"><small>@{{ documento.created }}</small></p>
                                        <div class="labell">
                                            @{{ documento.tipo }}
                                        </div>
                                        
                                    </div>
                                </a>
                                <p class="preview-doc text-center">
                                    <span class="icon-eye2"></span> Vista Previa
                                </p>

                            </div>


                        </template>
                        <template v-if="showDocFilterInit==true"  >
                            <div class="col-md-2" v-for="documento in dataDocumentosFilterTipoDoc">

                                <a v-bind:href="documento.url">
                                    <div class="item-doc">
                                        <b>@{{ documento.nombre }}</b>
                                        <p style="padding-top: .5em; color: #888"><small>@{{ documento.created }}</small></p>
                                        <div class="labell">
                                            @{{ documento.tipo }}
                                        </div>
                                        
                                    </div>
                                </a>
                                <p class="preview-doc text-center">
                                    <span class="icon-eye2"></span> Vista Previa
                                </p>

                            </div>


                        </template>
                            
                        @include('procesos.document.modal.preview')
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var appDocList = new Vue({
            el: '#app-doc',
            data:{
                showDocInit : true,
                showDocFilterInit : false,
                keyWordSearch:"",
                dataDocumentos: [],
                dataDocFind:[],
                dataTipoDoc: JSON.parse('{!! $doctypes !!}'),
                dataDocumentosFilterTipoDoc :[],
                documento:""
            },
            created: function(){
                $.ajax({
                    url: "{{ url('ajax/get/documentos') }}/{{ Auth::user()->id }}",
                    type: 'get',
                    dataType:'json',
                    success: function(data){
                        appDocList.dataDocumentos = data;
                    }
                });

                console.log(this.dataTipoDoc);
            },
            methods:{
                getTipoDoc: function(id){
                    for (var i = 0; i < this.dataTipoDoc.length; i++) {
                        if(this.dataTipoDoc[i]['id']==id){
                            return this.dataTipoDoc[i]['name'];
                        }
                    }
                    
                },
                onKeyWord: function(){
                    if(this.keyWordSearch!=""){
                        this.showDocInit = false;
                        this.showDocFilterInit = false;
                        this.dataDocumentosFilterTipoDoc = [];
                        this.dataDocFind = [];
                        for (var i = 0; i < this.dataDocumentos.length; i++) {
                            var cadena = this.dataDocumentos[i]['nombre_documento'].toLowerCase();
                            var word = this.keyWordSearch.toLowerCase();
                            if(cadena.indexOf(word)==0){

                                // this.getTipoDoc(this.dataDocumentos[i]['tipo_id']);
                                // console.log(this.tipoDoc);

                                this.dataDocFind.push({
                                    nombre: this.dataDocumentos[i]['nombre_documento'],
                                    created : this.dataDocumentos[i]['created_at'],
                                    tipo: this.getTipoDoc(this.dataDocumentos[i]['tipo_id']), 
                                    url:"{{ url('procesos/documento') }}/{{ Auth::user()->id }}/edit/"+this.dataDocumentos[i]['slug']
                                });
                            }
                        }
                    }else{
                        this.showDocInit = true;
                    }


                    
                },
                onClickTypeFilter: function(typeId){
                    if(typeId!=0){
                        this.dataDocumentosFilterTipoDoc = [];
                        this.dataDocFind = [];
                        this.showDocFilterInit = true;
                        this.showDocInit = false;

                        for (var i = 0; i < this.dataDocumentos.length; i++) {
                            if(this.dataDocumentos[i]['tipo_id']==typeId){
                                this.dataDocumentosFilterTipoDoc.push({
                                        nombre: this.dataDocumentos[i]['nombre_documento'],
                                        created : this.dataDocumentos[i]['created_at'],
                                        tipo: this.getTipoDoc(this.dataDocumentos[i]['tipo_id']), 
                                        url:"{{ url('procesos/documento') }}/{{ Auth::user()->id }}/edit/"+this.dataDocumentos[i]['slug']
                                    });
                            }
                        }
                    }else{
                        this.dataDocumentosFilterTipoDoc = [];
                        this.dataDocFind = [];
                        this.showDocFilterInit = false;
                        this.showDocInit = true;
                    }
                    

                    
                },
                onClickPreview: function(id){
                    appDocList.documento = "";
                    
                    $.ajax({
                        url: "{{ url('ajax/get/doc') }}/"+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data){
                            appDocList.documento = data;
                        }
                    })
                }
            }
        });
    </script>
    
    
@endsection