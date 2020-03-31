@extends('layouts.apphome')
@section('content')

{!!Form::open(['route'=>'proveedor.store'])!!}
@include('proveedor.fragment.form') <!--Incluyo el formulario-->
{!!Form::close()!!}

@endsection
