<!-- Modal -->
<div class="modal fade" id="myModalEliminarPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Persona: <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_eliminar">
          @{{ dataShowModalDataPerson.fullnames }}
        </h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataPerson.fullnames!=''">
          <h5 class="text-center">
            ¿Estas seguro que quieres eliminar a la persona  <u>@{{ dataShowModalDataPerson.fullnames }}</u> ? 
          </h5>
          
          <input type="hidden" value="{!! csrf_token() !!}" id="token_eliminar_person">
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_eliminar_person">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_eliminar_person" v-on:click="clickGuardarEliminarUser()">Eliminar de Todas Maneras</button>
        
      </div>
    </div>
  </div>
</div>