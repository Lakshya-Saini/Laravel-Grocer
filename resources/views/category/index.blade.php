@extends('layouts.app')

@section('title', '| categories')

@section('stylesheets')

	<link rel="stylesheet" type="text/css" href="css/new.css">

@endsection

@section('content')

	<div class="col-md-11 mx-auto">
		<div class="row">
			<div class="col-md-9">
				<a href="/category/create" class="btn btn-primary">Create New</a>
			</div>
			<div class="col-md-3 text-right px-4 pt-2">
				<h5 class="d-inline total-cats">Total Categories: <span class="badge badge-secondary">{{ $categories->count() }}</span></h5>
			</div>
		</div>
		<div class="row">
			<table class="table table-bordered table-hovered mt-4 mx-3">
				<thead>
					<tr>
						<th>Id</th>
						<th>Name</th>
						<th>Products</th>
						<th>Created at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
							<td><span class="badge badge-secondary">
								{{$category->products->count()}}
							</span></td>
							<td>{{ date('M d, Y', strtotime($category->created_at)) }}</td>
							<td>
								<div class="row">
									<div class="col-md-4">
										<a href="/category/{{ $category->id }}/view" class="btn btn-secondary btn-block">View</a>
									</div>
									<div class="col-md-4">
										<a href="/category/{{ $category->id }}/edit" class="btn btn-success btn-block">Edit</a>	
									</div>
									<div class="col-md-4">
										{!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'POST']) !!}
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
		</div>
	</div>

@endsection