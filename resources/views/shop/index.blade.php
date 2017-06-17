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
		<div class="col-md-3">
			<ul class="list-group">
				<h1 class="text-center">Categories</h1>
				@foreach($categories as $category)
			  		<a type="button" href="{{route('category',$category->id)}}" class="list-group-item butt">{{$category->name}}</a>
			  	@endforeach
			</ul>
		</div>

		<div class="col-md-8 col-md-offset-1">
			<div class="row">
				<div class="slider abc">
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					    <li data-target="#myCarousel" data-slide-to="1"></li>
					    <li data-target="#myCarousel" data-slide-to="2"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner">
					    <div class="item active">
					      <img src="img/new.jpg" alt="Los Angeles">
					    </div>

					    <div class="item">
					      <img src="chicago.jpg" alt="Chicago">
					    </div>

					    <div class="item">
					      <img src="ny.jpg" alt="New York">
					    </div>
					  </div>

					  <!-- Left and right controls -->
					  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
			<div class="row row1">
				<h1 class="text-center">Latest Products</h1>
				@foreach($products as $product)
			    <div class="col-md-4">
			    	<div class="thumbnail">
			      <img src="{{$product->image_path}}" alt="..." class="img-responsive">
			      <div class="caption">
			        <h3>{{$product->name}}</h3>
			        <p class="description">{{($product->description) >100 ? $product->description : '...'}}</p>
			        <div class="clearfix">
			        	<div class="pull-left price">${{$product->price}}</div>
			        	<a href="{{route('product.addToCart',$product->id)}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
			        </div>
			      </div>
			  	</div>
			    </div>
			  @endforeach
			</div>
		</div>
	</div>
@endsection