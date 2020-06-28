<!-- Modal -->
<div class="modal fade" id="myModalDetallesSeccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de Sección <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_seccion_detalles"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataSeccion.on==true">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-hover tb">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">@{{ dataShowModalDataSeccion.name }}</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Tipo Sección</b></td>
                    <td>@{{ dataShowModalDataSeccion.type }}</td>
                  </tr>
                  <tr>
                    <td><b>Ruta</b></td>
                    <td>@{{ dataShowModalDataSeccion.route }}</td>
                  </tr>
                  <tr>
                    <td><b>Sección Creada</b></td>
                    <td>@{{ dataShowModalDataSeccion.created }}</td>
                  </tr>
                  <tr>
                    <td><b>Sección Actualizada</b></td>
                    <td>@{{ dataShowModalDataSeccion.updated }}</td>
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