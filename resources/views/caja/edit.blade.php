@extends('layouts.apphome')
@section('content')
<div class="col-md-3">
@include('caja.fragment.error')
</div>
{!!Form::model($caja,['route'=>['caja.update', $caja->id], 'method'=>'PUT']) !!}<!--Se le pasa, la variable del metodo-->
@include('caja.fragment.formCierre') <!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection


