@extends('layouts.master')

@section('title')

@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<h1 class="text-center">Add a product</h1>
			<form action="{{route('product.add')}}" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="price">Price:</label>
					<input type="text" id="price" name="price" class="form-control">
				</div>
				<div class="form-group">
					<label for="name">Category:</label>
					<select class="form-control" name="category">
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<button type="submit" class="btn btn-success btn-block btn-lg">Add Product</button>
			</form>
		</div>
	</div>
@endsection