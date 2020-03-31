@if(Session::has('danger'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">
	&times;
	</button>
<i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{Session::get('danger')}}
</div>
@endif