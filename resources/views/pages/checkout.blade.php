@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="col-md-10 mx-auto">
		<div class="row">
			<div class="col-md-3">
				<a href="/buy/{{ $product->id }}" class="btn btn-primary btn-block">Back to Product</a>
			</div>
		</div>
		<div class="row pt-4">
			<div class="card">
				<div class="card-header">
					Fill Details
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img src="/storage/img/{{ $product->image }}" class="w-100" height="280px" style="border-radius: 10px;">
							<div class="row mx-1">
								<h3 class="mt-3">{{ $product->name }}</h3>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
										    	<button class="btn btn-outline-secondary" type="button" id="button-addon2">
										    		<i class="fa fa-minus"></i>
										    	</button>
										  	</div>
										  	<input type="text" name="qty" id="qty" class="form-control" value="1">
										  	<div class="input-group-append">
										    	<button class="btn btn-outline-secondary" type="button" id="button-addon1">
										    		<i class="fa fa-plus"></i>
										    	</button>
										  	</div>		
										</div>
									</div>
									<div class="col-md-12">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
										    	<span class="input-group-text">$</span>
										  	</div>
										  	<input type="text" class="form-control" id="amount" disabled="true" value="{{ $product->price }}">
										  	<div class="input-group-append">
										    	<span class="input-group-text">.00</span>
										  	</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							{!! Form::open(['action' => ['PagesController@order', $product->id], 'method' => 'POST']) !!}

								<div class="form-group">
									{{ Form::label('name', 'Name') }}
									{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
								</div>
								<div class="form-group">
									{{ Form::label('email', 'Email') }}
									{{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
								</div>
								<div class="form-group">
									{{ Form::label('address', 'Address') }}
									{{ Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Enter Address']) }}
								</div>
								<div class="form-group">
									{{ Form::label('number', 'Number') }}
									{{ Form::text('number', '', ['class' => 'form-control', 'placeholder' => 'Enter Mobile Number']) }}
								</div>
								<div class="form-group">
									{{ Form::submit('Place Order', ['class' => 'btn btn-success btn-block']) }}
								</div>

							{!! Form::close() !!}
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection

@section('script')

	<script type="text/javascript">
		
		$(document).ready(function(){

			var qty = 1;
			var amt = $("#amount").val();

			$("#button-addon1").click(function(){
				qty++;	
				$("#qty").val(qty);
				$("#amount").val(qty*amt);
			});

			$("#button-addon2").click(function(){
				qty--;	
				$("#qty").val(qty);
				$("#amount").val(qty*amt);
			});
		});

	</script>

@endsection