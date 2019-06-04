@extends('layouts.app')

@section('title', '| Product Create')

@section('stylesheets')

   	{{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="col-md-10 mx-auto">
		<div class="card mb-4">
			<h5 class="card-header">Add Product</h5>
			<div class="card-body">
		    	{!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
					<div class="form-group">
				    	{{ Form::label('name', 'Product Name') }}
				    	{{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Product Name']) }}
				  	</div>
				  	<div class="form-group">
				    	{{ Form::label('description', 'Description') }}
				    	{{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description about product']) }}
				  	</div>
				  	<div class="form-group">
				    	{{ Form::label('price', 'Price') }}
				    	{{ Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Enter Price']) }}
				  	</div>	 
				  	<div class="form-group">
		                {{ Form::label('category_id', 'Category') }}
		                <select class="form-control" name="category_id">
		                    @foreach($categories as $category)
		                        <option value="{{ $category->id }}">{{ $category->name }}</option>
		                    @endforeach
		                </select>
		            </div>
				  	<div class="form-group">
				  		{{ Form::file('product-image') }}
				  	</div> 	
				  	{{ Form::submit('Add Product', ['class' => 'btn btn-primary']) }}
				  	<a href="/products" class="btn btn-danger">Cancel</a>
				{!! Form::close() !!}
		  	</div>
		</div>
	</div>

@endsection