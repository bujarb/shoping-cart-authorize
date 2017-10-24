<?php $__env->startSection('title'); ?>
	Laravel Shoping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<?php if(Session::has('success')): ?>
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<div id="charge-message" class="alert alert-success">
					<?php echo e(Session::get('success')); ?>

				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="row row1">
				<h1 class="text-center">Products</h1>
				<hr>
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <div class="col-md-4">
			    	<div class="thumbnail">
			      <div class="caption">
			        <h3><?php echo e($product->name); ?></h3>
							<hr>
			        <p class="description"></p>
			        <div class="clearfix">
			        	<div class="pull-left price">$<?php echo e($product->price); ?></div>
			        	<a href="<?php echo e(route('product.addToCart',$product->id)); ?>" class="btn btn-info pull-right" role="button">Add to Cart</a>
			        </div>
			      </div>
			  	</div>
			    </div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>