<!-- Modal -->
<div class="modal fade" id="myModalEditarPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar de Datos de Persona: <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_data_editar"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDataPerson.on==true">
          
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <table class="table table-hover tb">
                <thead>
                  <tr>
                    <th>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Nombres y Apellidos" v-model="dataShowModalDataPerson.fullnames">
                      </div>
                    </th>
                    <th>
                       <h4  style="margin: 0px">@{{ dataShowModalDataPerson.fullnames }}</h4>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="form-group fc">
                        <input type="email" class="form-control " placeholder="Correo Electrónico" v-model="dataShowModalDataPerson.email">
                      </div>
                    </td>
                    
                    <td>@{{ dataShowModalDataPerson.email }}</td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group fc">
                        <input type="text" class="form-control " placeholder="Telefono" v-model="dataShowModalDataPerson.phone">
                      </div>
                    </td>
                    
                    <td>@{{ dataShowModalDataPerson.phone }}</td>
                  </tr>
                  
                </tbody>
                
              </table>

              
            </div>

            <div>
                <div class="row">
                  <div class="col-md-6 text-right" style="color:#888">
                    <small><b>Persona Creada:</b> @{{ dataShowModalDataPerson.created }}</small>
                  </div>
                  <div class="col-md-6 text-left" style="color:#888">
                    <small><b>Persona Actualizada:</b> @{{ dataShowModalDataPerson.updated }}</small>
                  </div>
                  
                  
                </div>
              </div>
          </div>

         <input type="hidden" value="{!! csrf_token() !!}" id="token_edit_person">
          
        </div>
        <div v-else>
          <p class="text-center" style="color:#888">Cargando...</p>
        </div>
        
      </div>
      <div class="modal-footer">
       <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load_editar_person">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn_guardar_editar_persona" v-on:click="clickGuardarEditarPersona()">Guardar Cambios</button>
        
      </div>
    </div>
  </div>
</div>