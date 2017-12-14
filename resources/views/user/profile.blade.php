@extends('layouts.master')

@section('title')

@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">My Orders</h3>
			  </div>
			  <div class="panel-body">
					<div class="panel-body">
						@foreach ($orders as $order)
							<ul class="list-group">
								@foreach($order->cart->items as $item)
									<li class="list-group-item">
										<span class="badge">${{$item['price']}}</span>
										{{ $item['item']['title'] }} | {{$item['qty']}} Units
									</li>
								@endforeach
							</ul>
						@endforeach
					</div>
			  </div>
			</div>
		</div>
	</div>
@endsection
