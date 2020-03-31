@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
      @include('message.info')
      @include('message.error')
</div> 
<div class="row">
	<div class="col-sm-12">	
		{!!Form::open(['route'=>'venta.store','id'=>'formsale','method'=>'POST'])!!}<!--Se le pasa, la variable del metodo-->
		{{csrf_field()}}
		@include('venta.fragment.form') <!--Incluyo el formulario-->
		{!!Form::close()!!}
	</div>	
</div>
@include('venta.fragment.modal') 
@endsection
