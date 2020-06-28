<!-- Modal -->
<div class="modal fade" id="myModalEditarSeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Sección: <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_seccion_editar"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataSeccion.on==true">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-hover tb">
                <thead>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Nombre Sección" v-model="dataShowModalDataSeccion.name">
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataSeccion.name }}</h4>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="form-group fc">
                        <select name="" id="" class="form-control" v-model="dataShowModalDataSeccion.type">
                          <option value="Sección">Sección</option>
                          <option value="Sub-Sección">Sub-Sección</option>
                        </select>
                      </div>
                    </td>
                    
                    <td>
                      {{ dataShowModalDataSeccion.type }}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Ruta (Por ejemplo: '/dash/ruta1')" v-model="dataShowModalDataSeccion.route">
                      </div>
                    </td>
                    
                    <td>{{ dataShowModalDataSeccion.route }}</td>
                  </tr>
                  
                  
                </tbody>
                
              </table>

              
            </div>

            <div>
                <div class="row">
                  <div class="col-md-6 text-right" style="color:#888">
                    <small><b>Sección Creada:</b> {{ dataShowModalDataSeccion.created }}</small>
                  </div>
                  <div class="col-md-6 text-left" style="color:#888">
                    <small><b>Sección Actualizada:</b> {{ dataShowModalDataSeccion.updated }}</small>
                  </div>
                  
                  
                </div>
              </div>
          </div>

         <input type="hidden" value="<?php echo csrf_token(); ?>" id="token_edit_seccion">
          
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_editar_seccion">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_editar_seccion" v-on:click="clickGuardarEditarSeccion()">Guardar Cambios</button>
        
      </div>
    </div>
  </div>
</div>