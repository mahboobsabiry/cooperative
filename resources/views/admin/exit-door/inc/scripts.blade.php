<script>
    $(document).ready(function () {
        // When Vehicle Returned
        $('#is_returned').click(function (e){
            e.preventDefault();

            // alert($(this).attr('id'));
            var is_returned = $(this).children("i").attr("is_returned");
            var exit_type = $(this).attr("exit_type");
            $("#is_returned").hide();
            $("#update_return").show();
            // alert("test"); return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ route('admin.ed.is_returned') }}',
                data: {is_returned: is_returned, exit_type: exit_type},
                success: function (resp) {
                    $("#is_returned").show();
                    $("#update_return").hide();

                    if (resp['is_returned'] == 0) {
                        $("#is_returned").html('<i class="fa fa-toggle-off text-danger" aria-hidden="true" is_returned="No"></i>');
                        // Change the activity
                        $(".yesNo").text('@lang('global.no')');
                        toastr.options = {
                            positionClass: 'toast-top-right'
                        };
                        toastr.warning('{{ trans('messages.exitDoor.vehicleNotReturned') }}');
                        window.location.href = '{{ route('admin.exit-door.show', $item->id) }}';
                    } else if (resp['is_returned'] == 1) {
                        $("#is_returned").html('<i class="fa fa-toggle-on text-success" aria-hidden="true" is_returned="Yes"></i>');
                        // Change the activity
                        $(".yesNo").text('@lang('global.yes')');
                        toastr.options = {
                            positionClass: 'toast-top-right'
                        };
                        toastr.success('{{ trans('messages.exitDoor.vehicleReturned') }}');
                        window.location.href = '{{ route('admin.exit-door.show', $item->id) }}';
                    }
                }, error: function (resp) {
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.error('متاسفیم! مشکلی پیش آمده است.');
                }
            });
        });
        //==/ End of Vehicle Returned

        // When Vehicle Exit Again
        $('#exit_again').click(function (e){
            e.preventDefault();

            // alert($(this).attr('id'));
            var exit_again = $(this).children("i").attr("exit_again");
            var exit_type = $(this).attr("exit_type");
            $("#exit_again").hide();
            $("#update_exit").show();
            // alert("test"); return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: '{{ route('admin.ed.exit_again') }}',
                data: {exit_again: exit_again, exit_type: exit_type},
                success: function (resp) {
                    $("#exit_again").show();
                    $("#update_exit").hide();

                    if (resp['exit_again'] == 0) {
                        $("#exit_again").html('<i class="fa fa-toggle-off text-danger" aria-hidden="true" exit_again="No"></i>');
                        // Change the activity
                        $(".yesNo").text('@lang('global.no')');
                        toastr.options = {
                            positionClass: 'toast-top-right'
                        };
                        toastr.warning('{{ trans('messages.exitDoor.vehicleNotEA') }}');
                        window.location.href = '{{ route('admin.exit-door.show', $item->id) }}';
                    } else if (resp['exit_again'] == 1) {
                        $("#exit_again").html('<i class="fa fa-toggle-on text-success" aria-hidden="true" exit_again="Yes"></i>');
                        // Change the activity
                        $(".yesNo").text('@lang('global.yes')');
                        toastr.options = {
                            positionClass: 'toast-top-right'
                        };
                        toastr.success('{{ trans('messages.exitDoor.vehicleEA') }}');
                        window.location.href = '{{ route('admin.exit-door.show', $item->id) }}';
                    }
                }, error: function (resp) {
                    toastr.options = {
                        positionClass: 'toast-top-right'
                    };
                    toastr.error('متاسفیم! مشکلی پیش آمده است.');
                }
            });
        });
        //==/ End of Vehicle Exit Again
    });
</script>
