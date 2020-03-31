
<div class="card  col-sm-12" style="margin-left:auto;">    
 	<div class="card-header bg-transparent "><strong>Información del articulo.</strong></div>
  		<div class="card-body t">
	    	<h5 class="card-title"><strong>Acciones:</strong>
		      	<a href="{{route('compra.index')}}" class="btn btn-secondary"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
	    	</h5>
	    	<input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">

			<div class="row">
				<div class="col-sm-12">
				<div class="form-group">
					{!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','min'=>'1'])!!}	
				</div>
				</div>
			</div>
			<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
				{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-compra'))!!}
				</div>
			</div>
			<div class="col-sm-2 ">
				<div class="form-group">
				<input  value="0" type="hidden" id="compra" name="cantidadarticulos" class="form-control" >
				</div>
			</div>
			<div class="col-sm-4" >
				<div class="form-group">
				{!!Form::label('totalCompra','Total de compra')!!}
				{!!Form::number('totalCompra',null,['class'=>'form-control','id'=>'totalCompra','required'=>'required', 'name'=>'totalCompra' ,'readonly'=>'readonly', 'value'=>'0','text-aling'=>'right'])!!}


				</div>
			</div>
			</div>

			<div class="row">
			<div class="col-md-12 table-responsive">
			<table class="table table-header" id="tbl-compra">
				<thead>
					<tr>
					<th class="text-center" >Codigo</th>
					<th class="text-center" >Nombre</th>
			        <th class="text-center" style="width:10px">Cantidad</th>
					<th class="text-center">Precio de Venta</th>
					<th class="text-center">Sub-Total</th>
					<th class="text-center">Iva</th>
					<th class="text-center">Total</th>
					<th class="text-center" colspan="3">Acción</th>	
			        </tr>
				</thead>
				<tbody>

				</tbody>
			</table>
			</div>
		</div>
		</div>
		<div class="card-footer bg-transparent ">
				{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarCompra', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
		</div>
</div>



