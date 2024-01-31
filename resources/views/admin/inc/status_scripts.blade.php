<script>
    // Change User Status
    $(".updateUserStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");
        $("#user-" + user_id).hide();
        $("#update_status-" + user_id).show();
        // alert("test"); return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/update-user-status',
            data: {status: status, user_id: user_id},
            success: function (resp) {
                $("#user-" + user_id).show();
                $("#update_status-" + user_id).hide();

                if (resp['status'] == 0) {
                    $("#user-" + user_id).html('<i class="fa fa-toggle-off text-danger" aria-hidden="true" status="Inactive"></i>');
                    // Change the inactivity
                    $(".acInText").html('<span id="acInText" class="text-danger">@lang('global.inactive')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.warning('{{ trans('messages.users.userDeactivated') }}');
                } else if (resp['status'] == 1) {
                    $("#user-" + user_id).html('<i class="fa fa-toggle-on text-success" aria-hidden="true" status="Active"></i>');
                    // Change the activity
                    $(".acInText").html('<span id="acInText" class="text-success">@lang('global.active')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.success('{{ trans('messages.users.userActivated') }}');
                }
            }, error: function (resp) {
                toastr.options = {
                    positionClass: 'toast-top-right'
                };
                toastr.error('متاسفیم! مشکلی پیش آمده است.');
            }
        });
    });
    // |/==/ End of Change User Status

    // Change Position Status
    $(".updatePositionStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var position_id = $(this).attr("position_id");
        $("#position_status").hide();
        $("#update_status").show();
        // alert("test"); return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '{{ route('admin.office.updatePositionStatus') }}',
            data: {status: status, position_id: position_id},
            success: function (resp) {
                $("#position_status").show();
                $("#update_status").hide();

                if (resp['status'] == 0) {
                    $("#position_status").html('<i class="fa fa-toggle-off text-danger" aria-hidden="true" status="Inactive"></i>');
                    // Change the inactivity
                    $(".acInText").html('<span id="acInText" class="text-danger">@lang('global.inactive')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.warning('{{ trans('messages.positions.positionDeactivated') }}');
                } else if (resp['status'] == 1) {
                    $("#position_status").html('<i class="fa fa-toggle-on text-success" aria-hidden="true" status="Active"></i>');
                    // Change the activity
                    $(".acInText").html('<span id="acInText" class="text-success">@lang('global.active')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.success('{{ trans('messages.positions.positionActivated') }}');
                }
            }, error: function (resp) {
                toastr.options = {
                    positionClass: 'toast-top-right'
                };
                toastr.error('متاسفیم! مشکلی پیش آمده است.');
            }
        });
    });
    // |/==/ End of Change Position Status

    // Change Employee Status
    $(".updateEmployeeStatus").click(function () {
        var status = $(this).children("i").attr("status");
        var employee_id = $(this).attr("employee_id");
        $("#employee_status").hide();
        $("#update_status").show();
        // alert("test"); return false;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'post',
            url: '/admin/office/update-employee-status',
            data: {status: status, employee_id: employee_id},
            success: function (resp) {
                $("#employee_status").show();
                $("#update_status").hide();

                if (resp['status'] == 0) {
                    $("#employee_status").html('<i class="fa fa-toggle-off text-danger" aria-hidden="true" status="Inactive"></i>');
                    // Change the inactivity
                    $(".acInText").html('<span id="acInText" class="text-danger">@lang('global.inactive')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.warning('{{ trans('messages.employees.employeeDeactivated') }}');
                } else if (resp['status'] == 1) {
                    $("#employee_status").html('<i class="fa fa-toggle-on text-success" aria-hidden="true" status="Active"></i>');
                    // Change the activity
                    $(".acInText").html('<span id="acInText" class="text-success">@lang('global.active')</span>');
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.success('{{ trans('messages.employees.employeeActivated') }}');
                }
            }, error: function (resp) {
                toastr.options = {
                    positionClass: 'toast-top-right'
                };
                toastr.error('متاسفیم! مشکلی پیش آمده است.');
            }
        });
    });
    // |/==/ End of Change User Status
</script>
