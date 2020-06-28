<!-- Modal -->
<div class="modal fade" id="myModalEliminarRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Rol: <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_rol_eliminar">
          @{{ dataShowModalDataRol.name }}
        </h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataRol.name !=''">
          <h5 class="text-center">
            ¿Estas seguro que quieres eliminar El Rol <u>@{{ dataShowModalDataRol.name }}</u> ? 
          </h5>

          <template v-if="cantidadUsers!=''" >
            <div class="text-center">
              <small v-if="cantidadUsers==1" style="color:red">Ten en cuenta que hay <b>@{{ cantidadUsers }} usuario</b> que tiene este Rol.</small>
              <small v-if="cantidadUsers!=1" style="color:red">Ten en cuenta que hay <b>@{{ cantidadUsers }} usuarios</b> que tienen este Rol.</small>
            </div>
            
          </template>
          
          
          <input type="hidden" value="{!! csrf_token() !!}" id="token_eliminar_rol">
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_eliminar_rol">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_eliminar_rol" v-on:click="clickGuardarEliminarRol()">Eliminar de Todas Maneras</button>
        
      </div>
    </div>
  </div>
</div>