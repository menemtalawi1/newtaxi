<?php $__env->startSection('main'); ?>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 30px;
  height: 17px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 13px;
  width: 13px;
  left: 2px;
  bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #a1ca3f;
}

input:focus + .slider {
  box-shadow: 0 0 1px #a1ca3f;
}

input:checked + .slider:before {
  -webkit-transform: translateX(13px);
  -ms-transform: translateX(13px);
  transform: translateX(13px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="content-wrapper">
	<section class="content-header">
		<h1> Site Settings </h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo e(url(LOGIN_USER_TYPE.'/dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Site Settings</a></li>
			<li class="active">Edit</li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Site Settings Form</h3>
					</div>
					<?php echo Form::open(['url' => 'admin/site_setting', 'class' => 'form-horizontal', 'files' => true]); ?>

					<div class="box-body">
						<span class="text-danger">(*)Fields are Mandatory</span>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Site Name<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('site_name', site_settings('site_name'), ['class' => 'form-control', 'id' => 'input_site_name', 'placeholder' => 'Site Name']); ?>

								<span class="text-danger"><?php echo e($errors->first('site_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Version</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('version', site_settings('version'), ['class' => 'form-control', 'id' => 'input_version', 'placeholder' => 'Version']); ?>

								<span class="text-danger"><?php echo e($errors->first('version')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_logo" class="col-sm-3 control-label">Header Logo</label>
							<div class="col-md-7 col-sm-offset-1">
							<em>Size: 140x80</em>
								<?php echo Form::file('logo', ['class' => 'form-control', 'id' => 'input_logo', 'accept' => 'image/*']); ?>

								<span class="text-danger"><?php echo e($errors->first('logo')); ?></span>
								<img src="<?php echo e($logo_url); ?>" class="image-cls">
							</div>
						</div>
						<div class="form-group">
							<label for="input_logo" class="col-sm-3 control-label">Header white logo</label>
							<div class="col-md-7 col-sm-offset-1">
							<em>Size: 140x80</em>
								<?php echo Form::file('page_logo', ['class' => 'form-control', 'id' => 'input_page_logo', 'accept' => 'image/*']); ?>

								<span class="text-danger"><?php echo e($errors->first('page_logo')); ?></span>
								<img src="<?php echo e(url(PAGE_LOGO_URL).'?v='.rand()); ?>" class="image-cls">
							</div>
						</div>
						<div class="form-group">
							<label for="input_favicon" class="col-sm-3 control-label">Favicon</label>
							<div class="col-md-7 col-sm-offset-1">
							<em>Size: 16x16</em>
								<?php echo Form::file('favicon', ['class' => 'form-control', 'id' => 'input_favicon', 'accept' => 'image/*']); ?>

								<span class="text-danger"><?php echo e($errors->first('favicon')); ?></span>
								<img src="<?php echo e($favicon.'?v='.rand()); ?>" class="fav_class">
							</div>
						</div>

						<div class="form-group">
							<label for="input_default_currency" class="col-sm-3 control-label">Default Currency</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('default_currency', $currency, $default_currency, ['class' => 'form-control', 'id' => 'input_default_currency']); ?>

								<span class="text-danger"><?php echo e($errors->first('default_currency')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_payment_currency" class="col-sm-3 control-label">
								Payment Currency
								<br>
								<span style="font-size: 12px;">
									Note : This currency must be same as your Braintree currency
								</span>
							</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('payment_currency', $currency, site_settings('payment_currency'), ['class' => 'form-control', 'id' => 'input_payment_currency']); ?>

								<span class="text-danger"><?php echo e($errors->first('payment_currency')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_trip_default_paymode" class="col-sm-3 control-label">Trip Default Payment Method</label>
							<div class="col-md-7 col-sm-offset-1" ng-init="trip_default = '<?php echo e(payment_gateway('trip_default','Common')); ?>'">
								<select name="trip_default_paymode" ng-model="trip_default" class="form-control" id="input_trip_default_paymode">
									<?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pay_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($pay_method['key']); ?>"> <?php echo e($pay_method['value']); ?> </option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span class="text-danger"><?php echo e($errors->first('trip_default_paymode')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Driver Kilo Meter</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::number('driver_km', site_settings('driver_km'), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Driver kilo meter', 'min'=>'1', 'oninput'=>'validity.valid||(value="");']); ?>

								<span class="text-danger"><?php echo e($errors->first('driver_km')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">
								Pickup Kilo Meter <br>
								<small>(* Pool Trip Only)</small>
							</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::number('pickup_km', site_settings('pickup_km'), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Pickup kilo meter', 'min'=>'1', 'oninput'=>'validity.valid||(value="");']); ?>

								<span class="text-danger"><?php echo e($errors->first('pickup_km')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">
								Drop Kilo Meter</br>
								<small>(* Pool Trip Only)</small>
							</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::number('drop_km', site_settings('drop_km'), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Drop kilo meter', 'min'=>'1', 'oninput'=>'validity.valid||(value="");']); ?>

								<span class="text-danger"><?php echo e($errors->first('drop_km')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Add code to the < head >(for tracking codes such as google analytics)</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::textarea('head_code', site_settings('head_code'), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Head Code']); ?>

								<span class="text-danger"><?php echo e($errors->first('head_code')); ?></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="input_default_language" class="col-sm-3 control-label">Default Language</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('default_language', $language, $default_language[0]->value, ['class' => 'form-control', 'id' => 'input_default_language']); ?>

								<span class="text-danger"><?php echo e($errors->first('default_language')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_admin_country_code" class="col-sm-3 control-label">
								Country Code <em class="text-danger">*</em>
							</label>
							<div class="col-md-7 col-sm-offset-1">
								<select class='form-control' id = 'input_admin_country_code' name='admin_country_code' >
									<option value="" disabled> Select </option>
									<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country_code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($country_code->id); ?>" <?php echo e(($country_code->id == old('admin_country_code',site_settings('admin_country_code'))) ? 'Selected' : ''); ?> ><?php echo e($country_code->long_name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span class="text-danger"><?php echo e($errors->first('admin_country_code')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_mobile_number" class="col-sm-3 control-label">Manual Booking Contact Number <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('admin_contact', old('admin_contact',site_settings('admin_contact')), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Contact Number']); ?>

								<span class="text-danger"><?php echo e($errors->first('admin_contact')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_heat_map" class="col-sm-3 control-label">Heat Map <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('heat_map',['On'=>'On','Off'=>'Off'], old('heat_map',site_settings('heat_map')), ['class' => 'form-control', 'id' => 'input_heat_map']); ?>

								<span class="text-danger"><?php echo e($errors->first('heat_map')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_heat_map_hours" class="col-sm-3 control-label">Heat Map Hours <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('heat_map_hours', old('heat_map_hours',site_settings('heat_map_hours')), ['class' => 'form-control', 'id' => 'input_heat_map_hours', 'placeholder' => 'Heat Map Hours']); ?>

								<span class="text-danger"><?php echo e($errors->first('heat_map_hours')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_update_loc_interval" class="col-sm-3 control-label"> Update Location Interval <i id="interval-tooltip" data-toggle="tooltip" data-html="true"  class="glyphicon  glyphicon-info-sign" title="Interval in Seconds to update driver's current location"></i> <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('update_loc_interval', old('update_loc_interval',site_settings('update_loc_interval')), ['class' => 'form-control', 'id' => 'input_update_loc_interval', 'placeholder' => 'Update Location Interval']); ?>

								<span class="text-danger"><?php echo e($errors->first('update_loc_interval')); ?></span>
							</div>
						</div>

						<?php
						$social_logins = site_settings('social_logins');
						$social_logins = explode(',',$social_logins);
						?>

						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Facebook Login</label>
							<div class="col-md-7 col-sm-offset-1" style="padding-top: 7px;margin-bottom: 0;">
								<label class="switch">
									<?php echo Form::checkbox('social_logins[]', 'facebook', in_array('facebook',$social_logins)); ?>

									<span class="slider round"></span>
								</label>
							</div>
						</div>

						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Google Login</label>
							<div class="col-md-7 col-sm-offset-1" style="padding-top: 7px;margin-bottom: 0;">
								<label class="switch">
									<?php echo Form::checkbox('social_logins[]', 'google', in_array('google',$social_logins)); ?>

									<span class="slider round"></span>
								</label>
							</div>
						</div>

					<!--	<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Apple Login</label>
							<div class="col-md-7 col-sm-offset-1" style="padding-top: 7px;margin-bottom: 0;">
								<label class="switch">
									<?php echo Form::checkbox('social_logins[]', 'apple', in_array('apple',$social_logins)); ?>

									<span class="slider round"></span>
								</label>
								<br>
								<b><small>Note: Enable Apple Login for Your Iphone Users</small></b>
							</div>
						</div>  -->

						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Otp Verification  <i id="interval-tooltip" data-toggle="tooltip" data-html="true"  class="glyphicon  glyphicon-info-sign" title="This otp for phone number verification on when you create an account"></i>
							</label>
							<div class="col-md-7 col-sm-offset-1" style="padding-top: 7px;margin-bottom: 0;">
								<label class="switch">
									<?php echo Form::checkbox('otp_verification', 1, site_settings('otp_verification')); ?>

									<span class="slider round"></span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="input_site_name" class="col-sm-3 control-label">Covid Feature</label>
							<div class="col-md-7 col-sm-offset-1" style="padding-top: 7px;margin-bottom: 0;">
								<label class="switch">
									<?php echo Form::checkbox('covid_enable', 1, site_settings('covid_enable')); ?>

									<span class="slider round"></span>
								</label>
							</div>
						</div>
						<div class="form-group">
							<label for="driver_request_seconds" class="col-sm-3 control-label">
								Driver Request Seconds <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('driver_request_seconds', old('driver_request_seconds',site_settings('driver_request_seconds')), ['class' => 'form-control','placeholder' => 'Driver Request Seconds']); ?>

								<span class="text-danger"><?php echo e($errors->first('driver_request_seconds')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_mobile_number" class="col-sm-3 control-label">Driver Request Limit <i id="interval-tooltip" data-toggle="tooltip" data-html="true"  class="glyphicon  glyphicon-info-sign" title="This is the maximum driver limit while sending the trip request."></i><em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('driver_request_limit', old('driver_request_limit',site_settings('driver_request_limit')), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Driver Request Limit']); ?>

								<span class="text-danger"><?php echo e($errors->first('driver_request_limit')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_mobile_number" class="col-sm-3 control-label">Copyright Year <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('copyright_year', old('copyright_year',site_settings('copyright_year')), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'Copyright year']); ?>

								<span class="text-danger"><?php echo e($errors->first('copyright_year')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_mobile_number" class="col-sm-3 control-label">Copyright URL <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('copyright_url', old('copyright_url',site_settings('copyright_url')), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'https://yourdomain.com']); ?>

								<span class="text-danger"><?php echo e($errors->first('copyright_url')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="input_mobile_number" class="col-sm-3 control-label">Copyright Name <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('copyright_name', old('copyright_name',site_settings('copyright_name')), ['class' => 'form-control', 'id' => 'input_head_code', 'placeholder' => 'copyright name']); ?>

								<span class="text-danger"><?php echo e($errors->first('copyright_name')); ?></span>
							</div>
						</div>
					</div>
					<div class="box-footer text-center">
						<button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
						<button type="reset" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
					</div>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\newtaxi\resources\views/admin/site_settings.blade.php ENDPATH**/ ?>