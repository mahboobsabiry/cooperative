<!-- Retire Employee -->
<div class="modal" id="retire_employee{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تقاعد کارمند ({{ $employee->name }}) </h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <p>@lang('global.areYouSure')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.office.employees.retire_employee', $employee->id) }}" class="btn ripple btn-primary">@lang('global.yes')</a>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
            </div>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Reset Position -->
