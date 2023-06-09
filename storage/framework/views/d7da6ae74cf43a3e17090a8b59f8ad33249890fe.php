<title><?php echo e(trans('messages.driver_dashboard.edit')); ?> <?php echo e(trans('messages.driver_dashboard.vehicle_details')); ?></title>

<?php $__env->startSection('main'); ?>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 flexbox__item four-fifths page-content" style="padding:0px;" ng-controller="vehicle_details">

	<?php echo Form::open(['url' => 'update_vehicle', 'class' => '','id'=>'vehicle_form','files' => true]); ?>

	<div class="parter-info separated--bottom col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0 0px 15px;">
		 <div class="text--left col-lg-12">
          <h1 class="cls_profiletitle"> <?php echo e(trans('messages.driver_dashboard.edit')); ?> <?php echo e(trans('messages.driver_dashboard.vehicle_details')); ?> </h1>
        </div>
		<div class="col-lg-12 form-group">

			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_make')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo Form::select('vehicle_make_id',$make, $result->vehicle_make_id, ['class' => 'form-control', 'id' => 'vehicle_make', 'placeholder' => trans('messages.driver_dashboard.select') ]); ?>

				<span class="text-danger"><?php echo e($errors->first('vehicle_make_id')); ?></span>
			</div>
		</div>
		<div class="col-lg-12 form-group vehicle_model">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_model')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo Form::select('vehicle_model_id',$model, $result->vehicle_model_id, ['class' => 'form-control', 'id' => 'vehicle_model', 'placeholder' => trans('messages.driver_dashboard.select') ]); ?>

				<span class="text-danger"><?php echo e($errors->first('vehicle_model_id')); ?></span>
			</div>
		</div>
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_number')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo Form::text('vehicle_number',$result->vehicle_number, ['class' => 'form-control', 'id' => 'vehicle_number', 'placeholder' => trans('messages.driver_dashboard.vehicle_number') ]); ?>

				<span class="text-danger"><?php echo e($errors->first('vehicle_number')); ?></span>
			</div>
		</div>
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_color')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo Form::text('color',$result->color, ['class' => 'form-control', 'id' => 'color', 'placeholder' => trans('messages.driver_dashboard.vehicle_color') ]); ?>

				<span class="text-danger"><?php echo e($errors->first('color')); ?></span>
			</div>
		</div>
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_year')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo Form::text('year',$result->year, ['class' => 'form-control', 'id' => 'year', 'placeholder' => trans('messages.driver_dashboard.vehicle_year'),'autocomplete'=>'off']); ?>

				<span class="text-danger"><?php echo e($errors->first('year')); ?></span>
			</div>
		</div>
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.vehicle_type')); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<div class="cls_vehicle">
					<?php $vehicle_types = explode(',', $result->vehicle_id); ?>
					<?php $__currentLoopData = $vehicle_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li class="col-lg-6 col-md-12 col-12">
						<input type="checkbox"  name="vehicle_type[]" class="form-check-input vehicle_type" value="<?php echo e($type->id); ?>" 
						<?php echo e(in_array($type->id,$vehicle_types) ? "checked" : ""); ?> /> <?php echo e($type->car_name); ?>

					</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<span class="text-danger"><?php echo e($errors->first('vehicle_type')); ?></span>
				</div>
			</div>
		</div>

		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.handicap')); ?> <?php echo e(trans('messages.ride.accessibility')); ?> <?php echo e(trans('messages.driver_dashboard.available')); ?></label>

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo e(Form::radio('handicap', '1', in_array('2',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.driver_dashboard.yes')); ?>

				<?php echo e(Form::radio('handicap', '0', !in_array('2',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.driver_dashboard.no')); ?>

			</div>
			<div class="text-danger"><?php echo e($errors->first('handicap')); ?></div>
		</div>

		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.child_seat')); ?> <?php echo e(trans('messages.ride.accessibility')); ?> <?php echo e(trans('messages.driver_dashboard.available')); ?></label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo e(Form::radio('child_seat', '1', in_array('3',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.driver_dashboard.yes')); ?>

				<?php echo e(Form::radio('child_seat', '0', !in_array('3',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.driver_dashboard.no')); ?>

			</div>
			<div class="text-danger"><?php echo e($errors->first('child_seat')); ?></div>
		</div>

		<?php if($result->user->gender=='2'): ?>
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e(trans('messages.driver_dashboard.request_from')); ?></label>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<?php echo e(Form::radio('request_from', '1', in_array('1',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.profile.female')); ?>

				<?php echo e(Form::radio('request_from', '0', !in_array('1',$options) ? true:false, ['class'=>'form-check-input'])); ?> 
				<?php echo e(trans('messages.driver_dashboard.both')); ?>

			</div>
			<div class="text-danger"><?php echo e($errors->first('request_from')); ?></div>
		</div>
		<?php else: ?>
		<?php echo e(Form::hidden('request_from', '0')); ?>

		<?php endif; ?>


		<?php $__currentLoopData = $vehicle_documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	  	
		<div class="col-lg-12 form-group">
			 <label class="col-lg-4 col-md-4 col-sm-4 col-xs-6" style="padding:6px 0px;"><?php echo e($document->document_name); ?></label>
			 <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding:6px 0px;">
				<input type="file" name="<?php echo e($document->doc_name); ?>" class="form-control">
				<span class="text-danger">
					<?php echo e($errors->first($document->doc_name)); ?> 
				</span>
				<?php $image = ($document->document !='') ? $document->document : url('images/driver_doc.png'); ?>
				<div class="license-img">
					<a href="<?php echo e($image); ?>" target="_blank">
						<img style="width: 200px;height: 100px;object-fit: cover;" src="<?php echo e($image); ?>">
					</a>
				</div>	
			<?php if($document->expiry_required == '1'): ?>
			<div class="" style="margin-top: 10px;">
				<input type="date" min="<?php echo e(date('Y-m-d')); ?>" name="expired_date_<?php echo e($document->id); ?>" class="form-control" value="<?php echo e($document->expired_date); ?>">
				<span class="text-danger"> 
					<?php echo e($errors->first('expired_date_'.$document->id)); ?>

				</span>		  		
			</div>
			<?php endif; ?>
			</div>	  		
		</div>		  	
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<input type="hidden" name="vehicle_id" value="<?php echo e($result->id ?? ''); ?>">
	 <div class="separated--bottom col-lg-12 col-md-12 col-sm-12 col-xs-12 text--center" style="border-bottom:0px !important; margin-top: 20px;">
        <button style="padding: 0px 60px !important;font-size: 19px !important;" type="submit" class="btn btn--primary btn-blue" id="update_btn"><?php echo e(trans('messages.user.update')); ?></button>
    </div>
	<?php echo e(Form::close()); ?>

</div>
</div>
</div>
</div>
</main>
<style type="text/css">
	.form-check-input[type="radio"]
	{
		margin:4px 0 0 !important;
		vertical-align: bottom;
		margin-left: 10px !important;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="<?php echo e(url('admin_assets/plugins/datepicker/bootstrap-datepicker3.css')); ?>">
<script>
	$("#year").datepicker({
		format: "yyyy",
		viewMode: "years", 
		minViewMode: "years",
		autoclose : true,
		startDate: '1950',
		endDate: '<?php echo date('Y'); ?>'
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template_driver_dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampps\htdocs\newtaxi\resources\views/driver_dashboard/edit_vehicle.blade.php ENDPATH**/ ?>