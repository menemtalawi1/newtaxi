app.service('fileUploadService', function ($http, $q) {
	this.uploadFileToUrl = function (file, uploadUrl, data) {
		var fileFormData = new FormData();
		fileFormData.append('file', file);
		if(data){
			$.each(data, function(i, v){
				fileFormData.append(i, v);
			})
		}
		var deffered = $q.defer();
		var getProgressListener = function(deffered) {
			return function(event) {
				eventLoaded = event.loaded;
				eventTotal = event.total;
				percentageLoaded = ((eventLoaded/eventTotal)*100);
				deffered.notify(Math.round(percentageLoaded));
			};
		};
		$.ajax({
			type: 'POST',
			url: uploadUrl,
			data: fileFormData,
			cache: false,
			contentType: false,
			processData: false,
			headers:
			{
				'X-CSRF-Token': $('input[name="_token"]').val()
			},
			success: function(response, textStatus, jqXHR) {
				deffered.resolve(response);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				deffered.reject(errorThrown);
			},
			xhr: function() {
				var myXhr = $.ajaxSettings.xhr();
				if (myXhr.upload) {
					myXhr.upload.addEventListener(
						'progress', getProgressListener(deffered), false);
				}
				return myXhr;
			}
		});
		return deffered.promise;
	}
});

app.controller('user', ['$scope', '$http', '$compile','fileUploadService', function($scope, $http, $compile, fileUploadService) {
	$scope.selectFile = function(){
		$("#file").click();
	}

	$scope.select_image = function() {
		$("#file").click();
	}

	$scope.fileNameChanged = function(element) {

		files = element.files;
		if(files)
		{
			file = files[0];
			if(file)
			{
				$('.profile_update-loader').addClass('loading');
				url = APP_URL+'/'+'profile_upload';
				upload = fileUploadService.uploadFileToUrl(file, url);
				upload.then(
					function(response){
						if(response.success == 'true')
						{
							$('.profile_picture').attr('src',response.profile_url);
							$('.flash-container').html('<div class="alert alert-success text-center col-ssm-12" style="background: #2ec5e1 !important;border-color: #2ec5e1 !important;color: #fff !important;" >' + response.status_message + '</div>');
							$(".flash-container").fadeIn(3000);
							$(".flash-container").fadeOut(3000);
							$('.profile_update-loader').removeClass('loading');

						}
						else
						{
							$('.flash-container').html('<div class="alert alert-danger text-center col-ssm-12" >' + response.status_message + '</div>');
							$(".flash-container").fadeIn(3000);
							$(".flash-container").fadeOut(3000);
							$('.profile_update-loader').removeClass('loading');
						}

					}
					);
			}
		}
	}
	
	$('#phone_country').change(function(){
		id = $(this).find(':selected').attr('data-id');
		// $('#select-title-stage').text($(this).find(':selected').attr('data-value'));
		$('#country_id').val(id);
	});

	$(document).ready(function() {
		$('#phone_country').trigger('change');
	});

	$('.singin_rider').click(function(){
		var data_params = {};
		var type		= $(this).attr('data-type');
		data_params['type'] = type;
		if($('#email_phone').val()=='') {
			$('.email-error').removeClass('hide');
			$('.email-error').text($scope.invalid_email);
			return false;
		}
		if(type=='email') {
			data_params['email_phone'] = $('#email_phone').val();
		} else if(type=='password') {
			data_params['password'] = $('#password').val();
			data_params['email'] = $('#email_phone').val();
		}

		data_params['user_type'] = $('#user_type').val();
		data_params['country_id'] = $('#country_id').val();
		var data = JSON.stringify(data_params);
		$http.post('login', {
			data:data
		}).then(function(response) {
			if(response.data.status == 'false') {
				$('.email-error').removeClass('hide');
				$('.email-error').text(response.data.error);
			}

			if(response.data.status == 'true') {
				if(response.data.user_detail != '') {
					$('.email_or_phone').text(response.data.user_detail);
				}
				if(response.data.success == 'true') {
					if($('#user_type').val() == 'Driver')
						window.location.href = "driver_profile";
					else if($('#user_type').val() == 'Company')
						window.location.href = "company/dashboard";
					else
						window.location.href = "profile";
				} else {
					$('.email-error').addClass("hide");
					$('.email_phone-sec').addClass('hide');
					$('.password-sec').removeClass('hide');
					$('.password_btn').focus();
					$('.email_phone-sec-1').attr('data-type','password');
				}
			}
		});
	})
}]);
// Delete Account Redirects
$('#phone_country').change(function(){
	id = $(this).find(':selected').attr('data-id');
	// $('#select-title-stage').text($(this).find(':selected').attr('data-value'));
	$('#country_id').val(id);
});

$(document).ready(function() {
	$('#phone_country').trigger('change');
});

$('.singin_rider').click(function(){
	var data_params = {};
	var type		= $(this).attr('data-type');
	data_params['type'] = type;
	if($('#email_phone').val()=='') {
		$('.email-error').removeClass('hide');
		$('.email-error').text($scope.invalid_email);
		return false;
	}
	if(type=='email') {
		data_params['email_phone'] = $('#email_phone').val();
	} else if(type=='password') {
		data_params['password'] = $('#password').val();
		data_params['email'] = $('#email_phone').val();
	}

	
	data_params['user_type'] = $('#users_type').val();
	data_params['country_id'] = $('#country_id').val();
	var data = JSON.stringify(data_params);
	$http.post('login', {
		data:data
	}).then(function(response) {
		if(response.data.status == 'false') {
			$('.email-error').removeClass('hide');
			$('.email-error').text(response.data.error);
		}

		if(response.data.status == 'true') {
			if(response.data.user_detail != '') {
				$('.email_or_phone').text(response.data.user_detail);
			}
			if(response.data.success == 'true') {
				if($('#users_type').val() == 'Rider')
					window.location.href = "deleteacc";
				else if($('#users_type').val() == 'Driver')
					window.location.href = "deleteaccount";
					
				else
					window.location.href = "profile";
			} else {
				$('.email-error').addClass("hide");
				$('.email_phone-sec').addClass('hide');
				$('.password-sec').removeClass('hide');
				$('.password_btn').focus();
				$('.email_phone-sec-1').attr('data-type','password');
			}
		}
	});
})

$('.btn-switch').click(function() {
	if($('.btn-switch').hasClass('on')) {
		$('#is_deaf').val('Yes');
	}
	else {
		$('#is_deaf').val('No');
	}
})

$('#click_image').click(function() {
	$('#profile_image').trigger('click');
});

$('#click_image_driver').click(function() {
	$('#profile_image_driver').trigger('click');
});