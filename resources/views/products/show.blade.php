@extends('layouts.app')

@section('title', '| View Products')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="col-md-10 mx-auto">
		<div class="row">
			<div class="col-md-3">
				<a href="/products" class="btn btn-primary btn-block">Back to all Products</a>
			</div>
		</div>
		<div class="row pt-4">
			<div class="card">
				<div class="card-header">
					View Product
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<img src="/storage/img/{{ $product->image }}" class="w-100" height="280px" style="border-radius: 10px;">
							<div class="row">
								<div class="col-md-6">
									<h3 class="mt-3 pt-1">Price: ${{ $product->price }}</h3>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<h2>{{ $product->name }}</h2>
							<p>{{ $product->description }}</p>
							<p>Category: {{ $product->category->name }}</p>
							<p>Vendor: {{ $product->user->name }}</p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>

@endsection