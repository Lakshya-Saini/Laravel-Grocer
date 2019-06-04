@extends('layouts.app')

@section('title', '| Checkout')

@section('stylesheets')

    {{ Html::style('css/new.css') }}

@endsection

@section('content')

	<div class="col-md-10 mx-auto">
		<div class="card">
			<div class="card-header">
				<p>Order Summary</p>
			</div>
			<div class="card-body">
				<div class="row">
					<table class="table table-bordered mx-4 my-3">
						<thead>
							<tr>
								<th>Id</th>
								<th>Product Name</th>
								<th>Amount</th>
								<th>Order Id</th>
								<th>Ordered on</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $order->id }}</td>
								<td>{{ $order->product_name }}</td>
								<td>{{ $order->amount }}</td>
								<td>{{ $order->token }}</td>
								<td>{{ $order->created_at }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 mx-auto mt-4">
				<a href="/" class="btn btn-primary btn-lg btn-block">Continue Shopping</a>
			</div>
		</div>
	</div>	

@endsection