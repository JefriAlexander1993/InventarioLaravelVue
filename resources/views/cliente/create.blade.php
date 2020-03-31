@extends('layouts.apphome')
@section('content')
{!!Form::open(['route'=>'cliente.store','method'=>'POST'])!!}<!--Se le pasa, la variable del metodo-->
@include('cliente.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection