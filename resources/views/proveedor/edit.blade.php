@extends('layouts.apphome')
@section('content')

	{!!Form::model( $proveedor,['route'=>['proveedor.update', $proveedor->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
	@include('proveedor.fragment.formedit') <!--Incluyo el formulario-->
	{!!Form::close()!!}

@endsection
