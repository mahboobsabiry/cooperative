<!-- Delete -->
<div class="modal" id="reset_position{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تبدیل کارمند ({{ $employee->name }}) به اصل بست</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <p>@lang('global.areYouSure')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.employees.reset_position', $employee->id) }}" class="btn ripple btn-primary">@lang('global.yes')</a>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
            </div>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
