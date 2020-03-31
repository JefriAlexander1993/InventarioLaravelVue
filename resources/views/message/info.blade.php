@if(Session::has('info'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
	&times;
	</button>
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('info')}}
</div>
@endif

@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" >
	<button type="button" class="close" data-dismiss="alert">
	&times;
	</button>
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('error')}}
</div>
@endif

