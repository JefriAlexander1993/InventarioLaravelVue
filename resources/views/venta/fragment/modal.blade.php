<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crear cliente.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     		{!!Form::open(['route'=>'venta.storeCliente', 'id'=>'formsaleclient'])!!}<!--Se le pasa, la variable del metodo-->
  			@include('venta.fragment.formClient')<!-- Incluyo el formulario-->
  			{!!Form::close()!!}
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success btn-block" id="enviarCliente">Guardar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>