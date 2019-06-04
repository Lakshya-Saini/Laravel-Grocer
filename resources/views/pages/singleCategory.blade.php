@extends('layouts.app')

@section('title', '| Category Product')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<h1 class="text-center mb-5">All Products in {{ $category->name }}</h1>
	<div class="row">
		<div class="col-md-10 mx-auto">
			@foreach($category->products as $product)
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

@endsection