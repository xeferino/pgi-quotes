<!-- Modal -->
<div class="modal fade" id="myModalDetallesPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de la Persona <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_detalles"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataPerson.fullnames!=''">
          
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">@{{ dataShowModalDataPerson.fullnames }}</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Correo Electrónico</b></td>
                    <td>@{{ dataShowModalDataPerson.email }}</td>
                  </tr>
                  <tr>
                    <td><b>Telefono</b></td>
                    <td>@{{ dataShowModalDataPerson.phone }}</td>
                  </tr>
                  <tr>
                    <td><b>Registro Creada:</b></td>
                    <td>@{{ dataShowModalDataPerson.created }}</td>
                  </tr>
                  <tr>
                    <td><b>Registro Actualizada</b></td>
                    <td>@{{ dataShowModalDataPerson.updated }}</td>
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