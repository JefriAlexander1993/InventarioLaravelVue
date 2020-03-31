@extends('layouts.apphome')
@section('content')
{!!Form::model($cliente,['route'=>['cliente.update', $cliente->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('cliente.fragment.formEdit') <!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection
