<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Asignar Rol</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          @if(count($roles)>0)
          <label for="">Escoger Rol</label>
          <select name="" id="" class="form-control" v-model="idRol">
            <option value="" disabled>Seleccionar Rol</option>
            @foreach($roles as $rol)
            
              <option value="{{ $rol->id }}">{{ $rol->nombre_rol }}</option>
            
            @endforeach
          </select>
          @else
          <p class="text-center">No hay roles registrados. <a href="{{ url('dash/rol/new') }}">Registrar aquí</a></p>
          @endif
        </div>
        <input type="hidden" value="{!! csrf_token() !!}" id="token_rol">
      </div>
      <div class="modal-footer">
        <img src="{{ asset('img/loading.GIF') }}" alt="" style="width: 32px;margin-right: 10px; display: none" id="load-asignar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-default" id="btn-guardar-rol" v-on:click="clickGuardarAsignarRol()">Guardar</button>
      </div>
    </div>
  </div>
</div>