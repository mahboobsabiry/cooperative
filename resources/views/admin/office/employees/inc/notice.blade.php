<!-- Delete -->
<div class="modal" id="notice_modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">ثبت اخطاریه</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.employees.add_notice', $employee->id) }}" data-parsley-validate="" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Reason -->
                    <div class="form-group">
                        <p class="">علت: <span class="text-danger">*</span></p>
                        <input type="text" name="reason" class="form-control" value="{{ old('reason') }}" required>
                    </div>

                    <!-- Notice -->
                    <div class="form-group">
                        <p class="">سطح هشدار:</p>
                        <select class="form-control" disabled>
                            @if(!$employee->notices->last())
                                <option selected disabled>توصیه</option>
                            @elseif($employee->notices->last() && $employee->notices->last()->notice == 1)
                                <option selected disabled>اخطاریه</option>
                            @elseif($employee->notices->last() && $employee->notices->last()->notice == 2)
                                <option selected disabled>اخطاریه کتبی</option>
                            @elseif($employee->notices->last() && $employee->notices->last()->notice == 3)
                                <option selected disabled>منفک</option>
                            @endif
                        </select>
                    </div>

                    <!-- Document -->
                    <div class="form-group">
                        <p class="">مکتوب:</p>
                        <input type="file" name="notice_file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
