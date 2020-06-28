<!-- Modal -->
<div class="modal fade" id="myModalEliminarSeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Sección: <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_seccion_eliminar">
          {{ dataShowModalDataSeccion.name }}
        </h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataSeccion.on == true">
          <h5 class="text-center">
            ¿Estas seguro que quieres eliminar La Sección <u>{{ dataShowModalDataSeccion.name }}</u> ? 
          </h5>

          <template v-if="cantidadRoles!=''" >
            <div class="text-center">
              <small v-if="cantidadRoles==1" style="color:red">Ten en cuenta que hay <b>{{ cantidadRoles }} rol</b> que tiene esta Sección.</small>
              <small v-if="cantidadRoles!=1" style="color:red">Ten en cuenta que hay <b>{{ cantidadRoles }} roles</b> que tienen esta Sección.</small>
            </div>
            
          </template>
          
          
          <input type="hidden" value="<?php echo csrf_token(); ?>" id="token_eliminar_seccion">
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_eliminar_seccion">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_eliminar_seccion" v-on:click="clickGuardarEliminarSeccion()">Eliminar de Todas Maneras</button>
        
      </div>
    </div>
  </div>
</div>