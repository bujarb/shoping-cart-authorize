<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">My Orders</h3>
			  </div>
			  <div class="panel-body">
					<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="panel panel-default">
					  <div class="panel-body">
					    <ul class="list-group">
						  <?php $__currentLoopData = $order->cart->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  	<li class="list-group-item">
						  		<span class="badge">$<?php echo e($item['price']); ?></span>
						  		<?php echo e($item['item']['title']); ?> | <?php echo e($item['qty']); ?> Units
						  	</li>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					  </div>
					  <div class="panel-footer clearfix">
					  	<strong class="pull-right">Total Price: $<?php echo e($order->cart->totalPrice); ?></strong>
					  </div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </div>
			  <div class="panel-footer">

			  </div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>