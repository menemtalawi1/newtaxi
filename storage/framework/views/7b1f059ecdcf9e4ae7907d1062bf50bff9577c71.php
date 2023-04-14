<?php $__env->startSection('main'); ?>
<div class="content-wrapper" ng-controller="driver_management" ng-init="login_user_type = '<?php echo e(LOGIN_USER_TYPE); ?>'; driver_doc = <?php echo e($driver_doc); ?>; errors = <?php echo e(json_encode($errors->getMessages())); ?>;">
	<section class="content-header">
		<h1> Add Driver </h1>
		<ol class="breadcrumb">
			<li>
				<a href="<?php echo e(url(LOGIN_USER_TYPE.'/dashboard')); ?>"> <i class="fa fa-dashboard"></i> Home </a>
			</li>
			<li>
				<a href="<?php echo e(url(LOGIN_USER_TYPE.'/driver')); ?>"> Drivers </a>
			</li>
			<li class="active"> Add </li>
		</ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Add Driver Form</h3>
					</div>
					<?php echo Form::open(['url' => LOGIN_USER_TYPE.'/add_driver', 'class' => 'form-horizontal','files' => true]); ?>

					<?php echo e(Form::hidden('user_id', '', array('id'=>'user_id'))); ?>

					<div class="box-body">
						<span class="text-danger">(*)Fields are Mandatory</span>
						<div class="form-group">
							<label for="input_first_name" class="col-sm-3 control-label">First Name<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('first_name',  old('first_name'), ['class' => 'form-control', 'id' => 'input_first_name', 'placeholder' => 'First Name']); ?>

								<span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_last_name" class="col-sm-3 control-label">Last Name<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('last_name', old('last_name'), ['class' => 'form-control', 'id' => 'input_last_name', 'placeholder' => 'Last Name']); ?>

								<span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_email" class="col-sm-3 control-label">Email<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('email', old('email'), ['class' => 'form-control', 'id' => 'input_email', 'placeholder' => 'Email']); ?>

								<span class="text-danger"><?php echo e($errors->first('email')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_password" class="col-sm-3 control-label">Password<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('password', '', ['class' => 'form-control', 'id' => 'input_password', 'placeholder' => 'Password']); ?>

								<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
							</div>
						</div>
						<?php echo Form::hidden('user_type','Driver', ['class' => 'form-control', 'id' => 'user_type', 'placeholder' => 'Select']); ?>

						<div class="form-group">
							<label for="input_country_code" class="col-sm-3 control-label">Country Code<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('country_id', $country_code_option, '', ['class' => 'form-control', 'id' => 'input_country_code', 'placeholder' => 'Select']); ?>


								
								<span class="text-danger"><?php echo e($errors->first('country_id')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="gender" class="col-sm-3 control-label">Gender <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo e(Form::radio('gender', '1', '', ['class' => 'form-check-input gender', 'id'=>'g_male'])); ?>

								<label for="g_male" style="font-weight: normal !important;">Male</label>
								<?php echo e(Form::radio('gender', '2', '', ['class' => 'form-check-input gender', 'id'=>'g_female'])); ?>

								<label for="g_female" style="font-weight: normal !important;">Female</label>
								<div class="text-danger"><?php echo e($errors->first('gender')); ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">Mobile Number <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('mobile_number', old('mobile_number'), ['class' => 'form-control', 'id' => 'mobile_number', 'placeholder' => 'Mobile Number']); ?>

								<span class="text-danger"><?php echo e($errors->first('mobile_number')); ?></span>
							</div>
						</div>
						<?php if(LOGIN_USER_TYPE!='company'): ?>
						<div class="form-group">
							<label for="input_company" class="col-sm-3 control-label">Company Name<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::select('company_name', $company, old('company_name'), ['class' => 'form-control', 'id' => 'input_company_name', 'placeholder' => 'Select']); ?>

								<span class="text-danger"><?php echo e($errors->first('company_name')); ?></span>
							</div>
						</div>
						<?php endif; ?>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">Status<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('status', 'Car_details', ['class' => 'form-control', 'id' => 'input_status', 'readonly']); ?>

							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">Address Line 1 </label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('address_line1', old('address_line1'), ['class' => 'form-control', 'id' => 'address_line1', 'placeholder' => 'Address Line 1']); ?>

								<span class="text-danger"><?php echo e($errors->first('address_line1')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">Address Line 2 </label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('address_line2', old('address_line2'), ['class' => 'form-control', 'id' => 'address_line2', 'placeholder' => 'Address Line 2']); ?>

								<span class="text-danger"><?php echo e($errors->first('address_line2')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">City </label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('city', old('city'), ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'City']); ?>

								<span class="text-danger"><?php echo e($errors->first('city')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">State</label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('state', old('state'), ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'State']); ?>

								<span class="text-danger"><?php echo e($errors->first('state')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="input_status" class="col-sm-3 control-label">Postal Code </label>
							<div class="col-md-7 col-sm-offset-1">
								<?php echo Form::text('postal_code', old('postal_code'), ['class' => 'form-control', 'id' => 'postal_code', 'placeholder' => 'Postal Code']); ?>

								<span class="text-danger"><?php echo e($errors->first('postal_code')); ?></span>
							</div>
						</div>

						<div class="col-sm-12">
							<label class="col-sm-3"></label>
							<div class="loading d-none" id="document_loading"></div>
						</div>
						<div class="form-group" ng-repeat="doc in driver_doc" ng-cloak ng-if="driver_doc">
							<label class="col-sm-3 control-label">{{doc.document_name}} <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<input type="file" name="file_{{doc.id}}" class="form-control">
								<span class="text-danger">{{ errors['file_'+doc.id][0] }}</span>
							</div>
							<br>
							<br>
							<div class="col-sm-12 p-0">
							<label class="col-sm-3 control-label" ng-if="doc.expiry_required=='1'">Expire Date <em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1" ng-if="doc.expiry_required=='1'">
								<input type="text" min="<?php echo e(date('Y-m-d')); ?>" name="expired_date_{{doc.id}}" class="form-control document_expired" placeholder="Expire date" autocomplete="off">
								<span class="text-danger">{{ errors['expired_date_'+doc.id][0] }}</span>
							</div>
						</div>
						<div class="col-sm-12 p-0">
							<label class="col-sm-3 control-label"> {{doc.document_name}} Status<em class="text-danger">*</em></label>
							<div class="col-md-7 col-sm-offset-1">
								<select class ='form-control' name='{{doc.doc_name}}_status'>
									<option value="0" ng-selected="doc.status==0">Pending</option>
									<option value="1" ng-selected="doc.status==1">Approved</option>
									<option value="2" ng-selected="doc.status==2">Rejected</option>
								</select>
							</div>
						</div>
						</div>
	
						<?php if(LOGIN_USER_TYPE!='company' || Auth::guard('company')->user()->id != 1): ?>
						<span class="bank_detail">
							<div class="form-group">
								<label for="input_status" class="col-sm-3 control-label">Account Holder Name <em class="text-danger">*</em></label>
								<div class="col-md-7 col-sm-offset-1">
									<?php echo Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control', 'id' => 'account_holder_name', 'placeholder' => 'Account Holder Name']); ?>

									<span class="text-danger"><?php echo e($errors->first('account_holder_name')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input_status" class="col-sm-3 control-label">Account Number <em class="text-danger">*</em></label>
								<div class="col-md-7 col-sm-offset-1">
									<?php echo Form::text('account_number', old('account_number'), ['class' => 'form-control', 'id' => 'account_number', 'placeholder' => 'Account Number']); ?>

									<span class="text-danger"><?php echo e($errors->first('account_number')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input_status" class="col-sm-3 control-label">Name of Bank <em class="text-danger">*</em></label>
								<div class="col-md-7 col-sm-offset-1">
									<?php echo Form::text('bank_name', old('bank_name'), ['class' => 'form-control', 'id' => 'bank_name', 'placeholder' => 'Name of Bank']); ?>

									<span class="text-danger"><?php echo e($errors->first('bank_name')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input_status" class="col-sm-3 control-label">Bank Location <em class="text-danger">*</em></label>
								<div class="col-md-7 col-sm-offset-1">
									<?php echo Form::text('bank_location', old('bank_location'), ['class' => 'form-control', 'id' => 'bank_location', 'placeholder' => 'Bank Location']); ?>

									<span class="text-danger"><?php echo e($errors->first('bank_location')); ?></span>
								</div>
							</div>
							<div class="form-group">
								<label for="input_status" class="col-sm-3 control-label">BIC/SWIFT Code <em class="text-danger">*</em></label>
								<div class="col-md-7 col-sm-offset-1">
									<?php echo Form::text('bank_code', old('bank_code'), ['class' => 'form-control', 'id' => 'bank_code', 'placeholder' => 'BIC/SWIFT Code']); ?>

									<span class="text-danger"><?php echo e($errors->first('bank_code')); ?></span>
								</div>
							</div>
						</span>
						<?php endif; ?>
					</div>
					<div class="box-footer text-center">
						<button type="submit" class="btn btn-info" name="submit" value="submit">Submit</button>
						<button type="submit" class="btn btn-default" name="cancel" value="cancel">Cancel</button>
					</div>
					<?php echo Form::close(); ?>

				</div>
			</div>
		</div>
	</section>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp7\htdocs\newtaxi\resources\views/admin/driver/add.blade.php ENDPATH**/ ?>