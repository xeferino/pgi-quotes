<!-- Modal -->
<div class="modal fade" id="myModalDetallesRol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de Rol <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_rol_detalles"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataRol.name!=''">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-hover tb">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">@{{ dataShowModalDataRol.name }}</h3>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <b>Secciones de este Rol</b>
                    </td>
                    <td>
                      <div v-if="dataShowModalDataRolSeccion!=''">
                        <ol style="margin:0; padding:0">
                          <li v-for="seccion of dataShowModalDataRolSeccion">[ @{{ seccion.nombreSeccion }} ]</li>
                        </ol>
                      </div>
                      <div v-else>
                        <small style="color:red">No tiene Secciones.</small>
                      </div>
                      
                      
                    </td>
                  </tr>
                  <tr>
                    <td><b>Rol Creado</b></td>
                    <td>@{{ dataShowModalDataRol.created }}</td>
                  </tr>
                  <tr>
                    <td><b>Rol Actualizado</b></td>
                    <td>@{{ dataShowModalDataRol.updated }}</td>
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