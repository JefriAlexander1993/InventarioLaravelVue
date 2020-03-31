@extends('layouts.apphome')
@section('content')
{!!Form::model($articulo,['route'=>['articulo.update', $articulo->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('articulo.fragment.formEdit') <!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection
