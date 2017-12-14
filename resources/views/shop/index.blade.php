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
		<div class="col-md-12">
			<div class="row row1">

				<hr>
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h1 class="text-center">Products</h1>
				  </div>
				  <div class="panel-body">
						@foreach($products as $product)
					    <div class="col-md-4">
					    	<div class="thumbnail">
					      <div class="caption">
					        <h3>{{$product->name}}</h3>
									<hr>
					        <p class="description"></p>
					        <div class="clearfix">
					        	<div class="pull-left price">${{$product->price}}</div>
					        	<a href="{{route('product.addToCart',$product->id)}}" class="btn btn-info pull-right no-border" role="button">Add to Cart</a>
					        </div>
					      </div>
					  	</div>
					    </div>
					  @endforeach
				  </div>
				  <div class="panel-footer text-center">
						{{$products->links()}}
				  </div>
				</div>
			</div>
		</div>
	</div>
@endsection
