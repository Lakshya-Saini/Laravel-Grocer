@extends('layouts.app')

@section('title', '| Edit Category')

@section('content')

	<div class="col-md-6 mx-auto">
		<div class="card">
			<h5 class="card-header">Edit Category</h5>
			<div class="card-body">
		    	{!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'PUT']) !!}
					<div class="form-group">
				    	{{ Form::label('name', 'Category Name') }}
				    	{{ Form::text('name', $category->name, ['class' => 'form-control', 'placeholder' => 'Enter Category']) }}
				  	</div>
				  	{{ Form::submit('Update Category', ['class' => 'btn btn-primary']) }}
				  	<a href="/category" class="btn btn-danger">Cancel</a>

				{!! Form::close() !!}
		  	</div>
		</div>
	</div>	

@endsection