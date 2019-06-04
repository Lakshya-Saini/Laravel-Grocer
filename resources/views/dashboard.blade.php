@extends('layouts.app')

@section('title', '| dashboard')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

    <div class="col-md-11 mx-auto">
        <div class="row">
            <div class="col-md-3">
                <a href="/products/create" class="btn btn-primary">Create New Product</a>
            </div>
            <div class="col-md-9 text-right px-4 pt-2">
                <h5 class="d-inline total-cats mt-3">Total Products: <span class="badge badge-secondary">{{ $products->count() }}</span></h5>
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-hovered mt-4 mx-3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Added on</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
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
                            <td>{{ $product->category->name }}</td>
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
        </div>
    </div>

@endsection
