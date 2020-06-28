<!-- Modal -->
<div class="modal fade" id="myModalEditarRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Rol <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_rol_editar"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataRol.on==true">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table tb">
                <thead>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Nombre Rol" v-model="dataShowModalDataRol.name">
                      </div>
                    </th>
                    <th>
                       <h3 class="text-center" style="margin: 0">{{ dataShowModalDataRol.name }}</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center">
                      <b >Elegir Secciones</b>
                    </td>
                    <td class="text-center" v-bind:style="colordos">
                      <template v-if="dataSecciones==''">
                        <b >Secciones de este Rol</b>
                      </template>
                      <template v-else>
                        <b >Secciones Nuevas para este Rol</b>
                      </template>
                      
                      
                    </td>
                  </tr>

                  <tr>
                    <td >
                      <div>
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                            <?php if(count($secciones)>0): ?>
                              <?php $__currentLoopData = $secciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" id="seccion_<?php echo e($seccion->id); ?>" v-on:click="onClickCheckSeccion(<?php echo e($seccion->id); ?>)"> <small id="sec_<?php echo e($seccion->id); ?>"><?php echo e($seccion->nombre_seccion); ?></small>
                                  </label>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                              <small style="color:red">No tiene Secciones.</small> <a href="<?php echo e(url('dash/seccion/new')); ?>"><small>Ir a Crear Sección</small></a>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td v-bind:style="colordos">
                      <template v-if="dataSecciones==''">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                            <ol style="margin:0; padding:0">
                              <li v-for="seccion of dataShowModalDataRolSeccion"><small>[ {{ seccion.nombreSeccion }} ]</small></li>
                            </ol>
                          </div>
                        </div>
                        
                      </template>
                      <template v-else>
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                            <ol style="margin:0; padding:0">
                              <li v-for="seccion of dataSecciones"><small>[ {{ seccion.nombreSeccion }} ]</small></li>
                            </ol>
                          </div>
                        </div>
                        
                      </template>
                      
                      
                    </td>
                  </tr>
                  
                  
                </tbody>
                
              </table>

              <div>
                <div class="row">
                  <div class="col-md-6 text-right" style="color:#888">
                    <small><b>Rol Creado:</b> {{ dataShowModalDataRol.created }}</small>
                  </div>
                  <div class="col-md-6 text-left" style="color:#888">
                    <small><b>Rol Actualizado:</b> {{ dataShowModalDataRol.updated }}</small>
                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" value="<?php echo csrf_token(); ?>" id="token_edit_rol">
          
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_editar_rol">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" v-on:click="clickGuardarEditarRol" id="btn_guardar_rol_editar">Guardar Cambios</button>
        
      </div>
    </div>
  </div>
</div>