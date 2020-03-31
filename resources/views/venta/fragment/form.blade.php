<div class="row">
	<div class="col-sm-12">
		<div class="card" style="margin-left:auto;">    
		 	<div class="card-header bg-transparent "><strong>Crear venta.</strong></div>
		  		<div class="card-body t">
		
			    	<h5 class="card-title"><strong>Acciones:</strong>
				      	<a href="{{route('venta.index')}}" class="btn btn-secondary"><i class="fa fa-list-alt" aria-hidden="true"></i></a>
				      	 <a  data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-link" style="color: red; font-size: 15px;" onclick=""><i class="fa fa-plus-circle"></i><b>Nuevo cliente</b></a>


			    	</h5>
			    	<input id="url_traerproducto" type="hidden" value="{{url('articulo/getArticulo/')}}">
						<input  value="0" type="hidden" id="venta" name="cantidadarticulos" class="form-control" >
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										{!!Form:: label('totalventa','Total de venta')!!}
										<input class="form-control" id="totalVenta" name="totalVenta" readonly="readonly" value="0" >
									</div>
								</div>
						
								<div class="col-sm-6">
									<div class="form-group">
										{!!Form:: label('id','Modo de pago.(*)')!!}
										<select class="form-control" name="modo_de_pago" id="id_modopago" required="">
											<option value="" selected="selected" >Seleccionar..</option>
											<option value="Credito">Credito</option>
											<option value="Contado">Contado</option>
											
										</select>
									</div>
								</div>	
								
							</div>

					<div class="card">
					  <div class="card-body">
					    	<div class="row">
						<div class="col-sm-5">
							<div class="form-group">
							{!!Form:: label('codigo','Codigo')!!}	
							{!!Form::select('codigo',$articulos, null,['class'=>'form-control',' required'=>'required','name'=>'codigo','id'=>'codigo','style'=>'width:100%','onKeyUp'=>'this.value = this.value.toUpperCase()','min'=>'1'])!!}	
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">				
							{!!Form:: label('cliente_id','Cliente')!!}	

	 						<select name="cliente_id" id="cliente_idc"
	                                class="form-control"
	                                required=""
	                                title="Elige el número de de cédula'"
	                                style="width:100%"
	                                >
	                            <option value>[Numero de cédula(*)]</option>
	                                 @foreach($clientes as $item)
	                            <option value="{{$item['id']}}">{{$item['nuip']}} - {{$item['primer_nombre']}} {{$item['primer_apellido']}}</option>
	                                @endforeach
	                         </select>

							</div>
						</div>
						<div class="col-sm-2">
						<div class="form-group">
							{!!Form:: label('acción','Acción')!!}<br>
							{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar', array('type' => 'button', 'class'=>'btn btn-primary btn-block', 'id'=>'btn-venta'))!!}
							</div>
						</div>
					</div>
	
					<div class="col-sm-12 table-responsive-sm">
						<table class="table table table-bordered table-sm" id="tbl-venta" >
							<thead>
								<tr>
								<th class="text-center" >#</th>
						        <th class="text-center" >Cantidad</th>
								<th class="text-center" >Producto</th>
								<th class="text-center" >Precio u</th>
								<th class="text-center" >Sub-Total</th>
								<th class="text-center" >Iva</th>
								<th class="text-center" >Total</th>
								<th class="text-center" >Acción</th>	
						        </tr>
							</thead>
							<tbody >

							</tbody>
						</table>
					</div>
					  </div>
					</div>					
					<!-- Vista de modalida credito--->
				<div   id="id_creditocontado" style="display:none">
					<hr>	
					<div class="card">
						<h5 class="card-header text-center" style="background-color:#fff"><b>Llenar campos para crear credito.</b></h5>
					  <div class="card-body">
					    <div class="row"> 
						<div class="col-sm-4">
									<div class="form-group">
										{!!Form:: label('cuotas_credito','# Cuotas')!!}
										<input class="form-control" type="number" name="cuotas_credito" id="cuotas" onkeyup="valorCuotas() ">
									</div>
						</div>	
						<div class="col-sm-4">
								<div class="form-group">
									<label>Valor de cuota</label>
									<input class="form-control" type="number" name="valor_de_cuota" id="valor_de_cuota" readonly="">
								</div>	
						</div>	
						<div class="col-sm-4">
								<div class="form-group">
										<label>Forma de pago</label>
										<select class="form-control" name="forma_de_pago" id="forma_de_pago" onchange="formapago()" >
											<option value="" selected="selected">Seleccionar..</option>
											<option value="Diario">Diario</option>
											<option value="Semanal">Semanal</option>
											<option value="Quincenal">Quincenal</option>
											<option value="Mensual">Mensual</option>
										</select>
								</div>	
							</div>	
							<div class="col-sm-12">
									<div class="form-group">
										{!! Form:: label('observacion','Observación')!!}
										{!!Form::textarea('observacion', null,['class'=>'form-control', 'title'=>'Observación respecto al proveedor.','placeholder' => 'Ej: El representante solo pasa los sabados a las 4pm.','cols'=>"40" ,'rows'=>"3",'id'=>'observacion','name'=>'observacion'])!!}
										
									</div>	
							</div>	
						</div>
					  </div>
					</div>	
					
				</div>		
					<div class="card-footer bg-transparent ">
							{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime',  'class'=>'btn btn-success btn-lg btn-block', 'id'=>'btn_create_sale' ))!!}
					</div>
						
					
			</div>
		</div>
	</div>	
</div>




