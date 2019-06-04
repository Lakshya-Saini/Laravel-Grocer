@extends('layouts.app')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="css/new.css">

@endsection

@section('content')
	
	<h1 class="text-center mb-5">All Products</h1>
	<div class="row col-md-12 mx-auto">
		<div class="col-md-3 mb-4">
			<div class="card" style="width: 18rem;">
				<div class="card-header">Categories</div>
				<ul class="list-group list-group-flush">
					@foreach($categories as $category)
			    		<li class="list-group-item"><a class="category-item" href="/category/{{ $category->id }}/{{ str_replace(' ', '-', strtolower($category->name)) }}">{{ $category->name }}</a></li>
			    	@endforeach	
			    	<li class="list-group-item"><a class="btn btn-secondary" href="/category/show">Show all Categories...</a></li>
			  	</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				@foreach($products as $product)
					<div class="col-md-4 mb-4">
						<div class="card" style="width: 18rem;">
							<img src="/storage/img/{{$product->image}}" class="card-img-top w-100" height="200px" alt="...">
							<div class="card-body">
						    	<h5 class="card-title">{{ $product->name }}</h5>
						    	<p>Vendor: {{ $product->user->name }}</p>
						    	<div class="row">
						    		<div class="col-md-6">
						    			<h3>${{ $product->price }}</h3>
						    		</div>
						    		<div class="col-md-6">
						    			<a href="/buy/{{ $product->id }}" class="btn btn-primary btn-block">Buy Now</a>
						    		</div>
						    	</div>
						  	</div>
						</div>
					</div>
				@endforeach	
			</div>
		</div>
	</div>

@endsection