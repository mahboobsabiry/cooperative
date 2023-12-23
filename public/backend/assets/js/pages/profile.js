$(document).ready(function(){
	// Check admin password is correct or not
	$("#cur_password").keyup(function(){
		// alert("test"); return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		var cur_password = $("#cur_password").val();
		$.ajax({
			type: 'post',
			url: "/admin/check-current-password",
			data: {cur_password:cur_password},
			success: function(resp){
				if (resp == 'false') {
					$("#cur_password").removeClass('is-valid').removeClass('state-valid').addClass('is-invalid').addClass('state-invalid');

					$("#checkPwdMsg").html('<font color="red">لطفا رمز عبور فعلی را درست وارد کنید!</font>');
				} else if (resp == 'true') {
					$("#cur_password").removeClass('is-invalid').removeClass('state-invalid').addClass('is-valid').addClass('state-valid');

					$("#checkPwdMsg").html('<font color="green">رمز عبور فعلی درست است!</font>');
				}
			}, error: function(resp){
				$("#cur_password").removeClass('is-valid').removeClass('state-valid').addClass('is-invalid').addClass('state-invalid');

				$("#checkPwdMsg").html('<font color="red">متاسفیم، مشکلی پیش آمده است!</font>');
			}
		});
	});
	// |/==/ End of Check admin password is correct or not

	// Update admin current password
	$("#updatePasswordForm").submit(function(e){
		e.preventDefault();

		var cur_password = $("#cur_password").val();
		var new_password = $("#new_password").val();
		var confirm_password = $("#confirm_password").val();
		$.ajax({
			type: 'post',
			url: "/admin/update-current-password",
			data: {
				cur_password:$("#cur_password").val(),
				new_password:$("#new_password").val(),
				confirm_password:$("#confirm_password").val()
			},
			success:function(resp){
				$("#cur_password").removeClass('is-valid').removeClass('state-valid');
				$("#cur_password").removeClass('is-invalid').removeClass('state-invalid');
				$("#checkPwdMsg").text("");
				$("#cur_password").val("");
				$("#new_password").val("");
				$("#confirm_password").val("");
				if (resp['message']) {
					toastr.options = {
						positionClass: 'toast-top-right'
					};
					toastr.success(resp['message']);
					$('.alert').show();
				} else if(resp['error']){
					toastr.options = {
						positionClass: 'toast-top-right',

					};
					toastr.error(resp['error']);
					// alert('Error!');
				} else {
					toastr.options = {
						positionClass: 'toast-top-right'
					};
					toastr.error(resp['incorrect']);
					// alert('Incorrent!');
				}

			}, error:function(){
				$("#cur_password").removeClass('has-danger');
				$("#cur_password").removeClass('has-success');
				$("#checkPwdMsg").text("");
				toastr.options = {
					positionClass: 'toast-top-right'
				};
				toastr.error('متاسفیم، مشکلی پیش آمده است!');
			}
		});
	});
	// |/==/ End of Update Password
});
