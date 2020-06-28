<!-- Modal -->
<div class="modal fade" id="myModalModificarAsignarRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar Rol a Usuario: <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data"> <b>{{ dataShowModalModificar.name }}</b></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalModificar.rol!=''">
            <p >
            <u>{{ dataShowModalModificar.name }}</u> tiene el Rol de : <span class="label label-success">{{ dataShowModalModificar.rol }}</span>
          </p>
          <div class="form-group">
           
            <label for="">Escoger Rol</label>
            <select name="" id="" class="form-control" v-model="idRol">
              <option value="" disabled>Seleccionar Rol</option>
              <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              
                <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->nombre_rol); ?></option>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
          </div>
          <input type="hidden" value="<?php echo csrf_token(); ?>" id="token_rol_mod">
        </div>

        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
        <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_guardar_rol">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_rol_modificar" v-on:click="clickGuardarModificarRolUser()">Guardar</button>
      </div>
    </div>
  </div>
</div>