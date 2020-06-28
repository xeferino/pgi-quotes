<!-- Modal -->
<div class="modal fade" id="myModalPreviewDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:60%">
    <div class="modal-content">
      <div class="modal-header2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Vista Previa del Documento: "@{{ documento.nombre_documento }}"{{-- <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-left: 10px;display: none;" id="load_cargar_rol_detalles"> --}}</h4>
      </div>
      <div class="modal-body" style="background-color: rgba(234, 232, 232, 0.63); height: 500px; overflow: auto;">
        
        <div v-html="documento.contenido_documento" style="background-color: white; box-shadow: 0px 0px 6px #0000002e; padding: 30px 40px; height: 1123px; width: 794px; margin: 0 auto">

        </div>
        
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>