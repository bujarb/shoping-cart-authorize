@extends('layouts.master')

@section('title')

@endsection

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<ul class="list-group">
					@foreach($products as $product)
						<li class="list-group-item">
							<span class="badge">{{ $product['qty'] }}</span>
							<strong>{{ $product['item']['name'] }}</strong>
							<span class="label label-success">{{ $product['price'] }}</span>
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Remove 1</a></li>
									<li><a href="#">Remove all</a></li>
								</ul>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<strong class="pull-right">Total:{{$totalPrice}}</strong>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<a href="{{route('checkout')}}" type="button" class="btn btn-success pull-right">Checkout</a>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<h2>No items in cart</h2>
			</div>
		</div>
	@endif
@endsection