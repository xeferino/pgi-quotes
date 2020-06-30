<!-- Modal -->
<div class="modal fade" id="myModalDetailsQuote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Detalles de la Cita <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_data_details_quote"></h4>
      </div>
      <div class="modal-body">
        <div v-if="dataShowModalDetailsQuote.fullnames_quote!=''">
          
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                       <h3 class="text-center">@{{ dataShowModalDetailsQuote.fullnames_quote }}</h3>
                       <h5 class="text-center">@{{ dataShowModalDetailsQuote.email_quote }}</h5>
                       <h5 class="text-center">@{{ dataShowModalDetailsQuote.phone_quote }}</h5>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Título</b></td>
                    <td>@{{ dataShowModalDetailsQuote.title_quote }}</td>
                  </tr>
                  <tr>
                    <td><b>Descripción</b></td>
                    <td>@{{ dataShowModalDetailsQuote.description_quote }}</td>
                  </tr>
                  <tr>
                    <td><b>Tipo</b></td>
                    <td>@{{ dataShowModalDetailsQuote.type_quote }}</td>
                  </tr>
                  <tr>
                    <td><b>Fecha de Cita</b></td>
                    <td>@{{ dataShowModalDetailsQuote.date_quote }}</td>
                  </tr>
                  <tr>
                    <td><b>Observación</b></td>
                    <td>@{{ dataShowModalDetailsQuote.observation_quote }}</td>
                  </tr>

                  <tr>
                    <td><b>Estatus</b></td>
                    <td>
                      <button class="btn btn-success btn-xs" v-if="dataShowModalDetailsQuote.status_quote!='1'">
                        Asignada
                      </button>
                      <button v-else class="btn btn-danger btn-xs">
                        Cerrada
                    </button>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Registro Creada:</b></td>
                    <td>@{{ dataShowModalDetailsQuote.created_quote }}</td>
                  </tr>
                  <tr> 
                    <td><b>Registro Actualizada</b></td>
                    <td>@{{ dataShowModalDetailsQuote.updated_quote }}</td>
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