<!-- Modal -->
<div class="modal fade" id="myModalEliminarQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Cita: <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_eliminar">
          @{{ dataShowModalDataQuote.title }}
        </h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataQuote.title!=''">
          <h5 class="text-center">
            ¿Estas seguro que quieres eliminar la cita  para la Persona: <u>@{{ dataShowModalDataQuote.fullnames }}</u> ? 
          </h5>
          
          <input type="hidden" value="{!! csrf_token() !!}" id="token_eliminar_quote">
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_eliminar_quote">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_eliminar_quote" v-on:click="clickGuardarEliminarQuote()">Eliminar de Todas Maneras</button>
        
      </div>
    </div>
  </div>
</div>