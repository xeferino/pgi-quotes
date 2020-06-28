<!-- Modal -->
<div class="modal fade" id="myModalEditarQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar de Datos de la Cita: <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_editar"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataQuote.on==true">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-hover tb">
                <thead>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Ingrese el titulo de la cita" v-model="dataShowModalDataQuote.title">
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataQuote.title }}</h4>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <select name="persona" id="pers" v-model="dataShowModalDataQuote.persons_id" class="form-control check-key" @change="persona($event)" required autofocus>
                          <?php $__currentLoopData = $persons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($person->id); ?>"><?php echo e($person->fullnames); ?></option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataQuote.fullnames }}</h4>
                    </th>
                  </tr>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <input type="datetime-local" class="form-control " v-model="dataShowModalDataQuote.date">
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataQuote.date }}</h4>
                    </th>
                  </tr>

                  <tr>
                    <th>
                      <div class="form-group fc">
                        <textarea class="form-control check-key" placeholder="Ingrese la descripción de la cita" name="description" value="<?php echo e(old('description')); ?>" required autofocus cols="15" rows="5" v-model="dataShowModalDataQuote.description"></textarea>
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataQuote.description }}</h4>
                    </th>
                  </tr>

                  <tr>
                    <th>
                      <div class="form-group fc">
                        <textarea class="form-control check-key" placeholder="Ingrese la observación de seguimiento" name="observation" value="<?php echo e(old('description')); ?>" required autofocus cols="15" rows="5" v-model="dataShowModalDataQuote.observation"></textarea>
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">{{ dataShowModalDataQuote.observation }}</h4>
                    </th>
                  </tr>

                  <tr>
                    <th>
                      <div class="form-group fc">
                        <select name="estatus" class="form-control check-key" v-model="dataShowModalDataQuote.status" required autofocus>
                            <option value="0">Asignada</option>
                            <option value="1">Cerrada</option>
                        </select>
                      </div>
                    </th>
                    <th>
                       <h4 style="margin: 0px">
                          <button class="btn btn-success btn-xs" v-if="dataShowModalDataQuote.status!='1'">
                            Asignada
                          </button>
                          <button v-else class="btn btn-danger btn-xs">
                            Cerrada
                          </button>
                      </h4>
                    </th>
                  </tr>
                  
                </tbody>
                
              </table>

              
            </div>

            <div>
                <div class="row">
                  <div class="col-md-6 text-right" style="color:#888">
                    <small><b>Cita Creada:</b> {{ dataShowModalDataQuote.created }}</small>
                  </div>
                  <div class="col-md-6 text-left" style="color:#888">
                    <small><b>Cita Actualizada:</b> {{ dataShowModalDataQuote.updated }}</small>
                  </div>
                  
                  
                </div>
              </div>
          </div>

         <input type="hidden" value="<?php echo csrf_token(); ?>" id="token_edit_quote">
          
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_editar_quote">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_editar_quote" v-on:click="clickGuardarEditarQuote()">Guardar Cambios</button>
        
      </div>
    </div>
  </div>
</div>