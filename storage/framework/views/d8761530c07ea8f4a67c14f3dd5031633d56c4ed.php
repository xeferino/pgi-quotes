<!-- Modal -->
<div class="modal fade" id="myModalDetallesQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de la Cita Registrada <img src="<?php echo e(asset('img/loading.GIF')); ?>" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_detalles"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataQuote.fullnames!=''">
          
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">{{ dataShowModalDataQuote.fullnames }}</h3>
                       <h5 class="text-center">{{ dataShowModalDataQuote.email }}</h5>
                       <h5 class="text-center">{{ dataShowModalDataQuote.phone }}</h5>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Título</b></td>
                    <td>{{ dataShowModalDataQuote.title }}</td>
                  </tr>
                  <tr>
                    <td><b>Descripción</b></td>
                    <td>{{ dataShowModalDataQuote.description }}</td>
                  </tr>
                  <tr>
                    <td><b>Fecha de Cita</b></td>
                    <td>{{ dataShowModalDataQuote.date }}</td>
                  </tr>
                  <tr>
                    <td><b>Observación</b></td>
                    <td>{{ dataShowModalDataQuote.observation }}</td>
                  </tr>

                  <tr>
                    <td><b>Estatus</b></td>
                    <td>
                      <button class="btn btn-success btn-xs" v-if="dataShowModalDataQuote.status!='Cerrada'">
                          {{ dataShowModalDataQuote.status }}
                      </button>
                      <button v-else class="btn btn-danger btn-xs">
                        {{ dataShowModalDataQuote.status }}
                    </button>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Registro Creada:</b></td>
                    <td>{{ dataShowModalDataQuote.created }}</td>
                  </tr>
                  <tr>
                    <td><b>Registro Actualizada</b></td>
                    <td>{{ dataShowModalDataQuote.updated }}</td>
                  </tr>
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>