<!-- Modal -->
<div class="modal fade" id="myModalEliminarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Usuario: <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_eliminar">
          @{{ dataShowModalDataUser.name }}
        </h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataUser.name!=''">
          <h5 class="text-center">
            ¿Estas seguro que quieres eliminar la cuenta de Usuario de <u>@{{ dataShowModalDataUser.name }}</u> ? 
          </h5>
          
          <input type="hidden" value="{!! csrf_token() !!}" id="token_eliminar_user">
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_eliminar_user">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_eliminar_user" v-on:click="clickGuardarEliminarUser()">Eliminar de Todas Maneras</button>
        
      </div>
    </div>
  </div>
</div>