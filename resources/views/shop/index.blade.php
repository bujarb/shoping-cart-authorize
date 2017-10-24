@extends('layouts.master')

@section('title')
	Laravel Shoping Cart
@endsection

@section('content')
	@if(Session::has('success'))
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div id="charge-message" class="alert alert-success">
					{{Session::get('success')}}
				</div>
			</div>
		</div>
	@endif
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="row row1">
				<h1 class="text-center">Products</h1>
				<hr>
				@foreach($products as $product)
			    <div class="col-md-4">
			    	<div class="thumbnail">
			      <div class="caption">
			        <h3>{{$product->name}}</h3>
							<hr>
			        <p class="description"></p>
			        <div class="clearfix">
			        	<div class="pull-left price">${{$product->price}}</div>
			        	<a href="{{route('product.addToCart',$product->id)}}" class="btn btn-info pull-right" role="button">Add to Cart</a>
			        </div>
			      </div>
			  	</div>
			    </div>
			  @endforeach
			</div>
		</div>
	</div>
@endsection
