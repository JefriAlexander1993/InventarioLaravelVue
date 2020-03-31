@extends('layouts.apphome')
@section('content')

{!!Form::open(['route'=>'credito.store','method'=>'POST'])!!}<!--Se le pasa, la variable del metodo-->
@include('credito.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection