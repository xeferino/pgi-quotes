<!-- Modal -->
<div class="modal fade" id="myModalDetallesUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de Cuenta de Usuario <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_detalles"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataUser.name!=''">
          
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">@{{ dataShowModalDataUser.name }}</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Usuario</b></td>
                    <td>@{{ dataShowModalDataUser.username }}</td>
                  </tr>
                  <tr>
                    <td><b>Correo Electrónico</b></td>
                    <td>@{{ dataShowModalDataUser.email }}</td>
                  </tr>
                  <tr>
                    <td><b>Contraseña</b></td>
                    <td><small>Contraseña encriptada</small></td>
                  </tr>
                  <tr>
                    <td><b>Cuenta Creada:</b></td>
                    <td>@{{ dataShowModalDataUser.created }}</td>
                  </tr>
                  <tr>
                    <td><b>Cuenta Actualizada</b></td>
                    <td>@{{ dataShowModalDataUser.updated }}</td>
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