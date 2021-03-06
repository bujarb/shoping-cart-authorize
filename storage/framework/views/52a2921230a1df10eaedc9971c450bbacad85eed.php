<?php $__env->startSection('title'); ?>
	Laravel Shoping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="row">
			<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
				<h1>Checkout</h1>
				<h4>Your total is:<?php echo e($total); ?></h4>
				<div id="charge-error" class="alert alert-danger <?php echo e(!Session::has('error') ? 'hidden' : ''); ?>">
					<?php echo e(Session::get('error')); ?>

				</div>
				<form action="<?php echo e(route('checkout')); ?>" method="post" id="checkout-form">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="name" id="name" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" id="address" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-name">Card Holder Name</label>
								<input type="text" name="card-name" id="card-name" class="form-control" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-number">Card Number</label>
								<input type="text" name="card-number" id="card-number" class="form-control" maxlength="16" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-month">Expiration Month</label>
										<input type="text" name="card-expiry-month" id="card-expiry-month" class="form-control" required maxlength="2">
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-year">Expiration Year</label>
										<input type="text" name="card-expiry-year" id="card-expiry-year" class="form-control" required maxlength="4">
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="cvc">CVC</label>
								<input type="text" name="card-cvc" class="form-control" required maxlength="3">
							</div>
						</div>
					</div>
					<?php echo e(csrf_field()); ?>

					<button type="submit" class="btn btn-success">Buy Now</button>
				</form>
			</div>
		</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript" src="<?php echo e(URL::to('js/checkout.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>