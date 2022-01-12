@if($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
	<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible" role="alert">
	<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
		<span>
			{{\Session::get('success')}}
		</span>
</div>
@elseif(\Session::has('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
	<span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
	<span>
		{{\Session::get('error')}}
	</span>
</div>
@endif