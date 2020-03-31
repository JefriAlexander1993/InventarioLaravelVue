@extends('layouts.apphome')
@section('content')
	{!!Form::open(['route'=>'abono.store'])!!}<!--Se le pasa, la variable del metodo-->
			@include('abono.fragment.form') <!--Incluyo el formulario-->
	{!!Form::close()!!}
@endsection