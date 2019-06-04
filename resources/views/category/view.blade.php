@extends('layouts.app')

@section('title', '| View')

@section('stylesheets')

	{{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="col-md-10 mx-auto">
		<div class="row">
			<div class="col-md-3">
				<a href="/category" class="btn btn-primary btn-block mb-4">Back to Categories</a>
			</div>
		</div>
		<div class="row">
			@if($category->products->count() > 0)
				<h2 class="mx-3">All Products in {{ $category->name }}</h2>
		    	<table class="table table-bordered table-hovered mx-3 mt-3">
		            <thead>
		                <tr>
		                    <th>Id</th>
		                    <th>Image</th>
		                    <th>Name</th>
		                    <th>Price</th>
		                    <th>Vendor</th>
		                    <th>Added on</th>
		                    <th>Action</th>
		                </tr>
		            </thead>
		            <tbody>
		                @foreach($category->products as $product)
		                    <tr>
		                        <td>{{ $product->id }}</td>
		                        <td style="width: 15%;">
		                            @if($product->image)
		                                <img src="/storage/img/{{$product->image}}" width="150px" height="100px" style="border-radius: 10px;">
		                            @else
		                                <img src="/storage/img/preview.jpg" width="150px" height="100px" style="border-radius: 10px;">
		                            @endif
		                        </td>
		                        <td>{{ $product->name }}</td>
		                        <td><h3>${{ $product->price }}</h3></td>
		                        <td>{{ $product->user->name }}</td>
		                        <td>{{ date('M d, Y', strtotime($product->created_at)) }}</td>
		                        <td>
		                            <div class="row">
		                                <div class="col-md-4">
		                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary btn-block">View</a>
		                                </div>
		                                <div class="col-md-4">
		                                    <a href="/products/{{$product->id}}/edit" class="btn btn-success btn-block">Edit</a> 
		                                </div>
		                                <div class="col-md-4">
		                                   {!! Form::open(['action' => ['ProductsController@destroy', $product->id], 'method' => 'POST']) !!}
		                                        {{ Form::hidden('_method', 'DELETE') }}
		                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) }}
		                                    {!! Form::close() !!}
		                                </div>
		                            </div>
		                        </td>
		                    </tr>
		                @endforeach
		            </tbody>
		        </table>
		    @else
		    	<h3 class="pl-3">No Products in this Category.</h3>
		    @endif    
		</div>
	</div>	

@endsection