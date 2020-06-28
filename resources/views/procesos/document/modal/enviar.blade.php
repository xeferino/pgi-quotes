<!-- Modal -->
<div class="modal fade" id="myModalEnviar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" >
    <div class="modal-content">
      <div class="modal-header2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Correo: </h4>
      </div>
      <div class="modal-body">
        
        <p>Para enviar este documento se necesita un correo electrónico.</p>

        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><span class="icon-envelop"></span></span>
          <input type="text" class="form-control" placeholder="Correo Electrónico" aria-describedby="basic-addon1" id="email-destinatario">
        </div>
        <p id="message-email">
            
        </p>
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" onclick="guardarEnviarDoc()">OK</button>
        
      </div>
    </div>
  </div>
</div>