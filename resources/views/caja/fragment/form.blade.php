	
<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Crear un caja.</strong><a href="{{route('caja.index')}}" class="btn btn-default "><i class="fa fa-list-alt" aria-hidden="true"></i></a></div>
  		<div class="card-body t">
  	
	    	<h5 class="card-title"><strong>Acción:</strong>
	      	<a href="{{route('caja.index')}}" class="btn btn-sm btn-light"><i class="fa fa-list-alt" aria-hidden="true"></i></a> 
	    	</h5>
	    	<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
					{!!Form::label('nombreusuario','Nombre del usuario de la caja')!!}
					{!!Form::text('nombreusuario',$name,['class'=>'form-control','required'=>'required' ])!!} 
					</div>
				</div>
			<div class="col-sm-6">
				<div class="form-group">
				{!! Form:: label('valorinicial','Valor inicial')!!}
				{!!Form::number('valorinicial',null,['class'=>'form-control' ,'min'=>'1', 'required'=>'required','placeholder'=>'100000', 'id'=>'valorinicial','min'=>'1','required'=>'required', 'onkeypress'=>'return soloNumeros(event)'])!!} 
				</div>
			</div>
			</div>

	</div>
	<div class="card-footer bg-transparent ">
			{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
	</div>
</div>



