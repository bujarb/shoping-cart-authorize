<?php $__env->startSection('title'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(Session::has('cart')): ?>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<ul class="list-group">
					<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li class="list-group-item">
							<span class="badge"><?php echo e($product['qty']); ?></span>
							<strong><?php echo e($product['item']['name']); ?></strong>
							<span class="label label-success"><?php echo e($product['price']); ?></span>
							<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
								Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Remove 1</a></li>
									<li><a href="#">Remove all</a></li>
								</ul>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<strong class="pull-right">Total:<?php echo e($totalPrice); ?></strong>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<a href="<?php echo e(route('checkout')); ?>" type="button" class="btn btn-success pull-right">Checkout</a>
			</div>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<h2>No items in cart</h2>
			</div>
		</div>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>