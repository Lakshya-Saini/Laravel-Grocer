@if(Session::has('success'))
	
	<div class="col-md-11 mx-auto">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			{{ Session::get('success') }}
		</div>
	</div>	

@endif

@if(count($errors) > 0)

	@foreach($errors->all() as $error)

		<div class="col-md-10 mx-auto">
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ $error }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   		<span aria-hidden="true">&times;</span>
			  	</button>
			</div>
		</div>	

	@endforeach

@endif