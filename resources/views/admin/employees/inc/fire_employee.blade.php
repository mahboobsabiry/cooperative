<!-- Delete -->
<div class="modal" id="fire_employee{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">منفک نمودن کارمند ({{ $employee->name }})</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.employees.fire_employee', $employee->id) }}" class="background_form">
                @csrf
                <div class="modal-body">
                    <!-- Fire Reason -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <p class="mb-2">علت منفکی: <span class="tx-danger">*</span></p>
                        <textarea class="form-control" name="info">{{ old('info') }}</textarea>

                        @error('info')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">منفک</button>
                    <button class="btn ripple btn-dark" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
