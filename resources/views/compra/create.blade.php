@extends('layouts.apphome')
@section('content')
<div class="col-sm-12">
@include('compra.fragment.error')
</div>
{!!Form::open(['route'=>'compra.store'])!!}<!--Se le pasa, la variable del metodo-->
@include('compra.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}
@endsection