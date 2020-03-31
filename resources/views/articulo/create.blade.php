@extends('layouts.apphome')
@section('content')
	<section class="col-sm-12">
					@include('articulo.fragment.error')
  	</section>
	{!!Form::open(['route'=>'articulo.store'])!!}<!--Se le pasa, la variable del metodo-->
			@include('articulo.fragment.form') <!--Incluyo el formulario-->
	{!!Form::close()!!}
@endsection