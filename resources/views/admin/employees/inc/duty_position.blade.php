<!-- Delete -->
<div class="modal" id="duty_position{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('form.dutyPosition') <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.employees.duty_position', $employee->id) }}" class="background_form">
                @csrf
                <div class="modal-body">
                    <!-- Start Duty -->
                    <div class="form-group @error('start_duty') has-danger @enderror">
                        <p class="mb-2">@lang('form.startDuty'): <span class="tx-danger">*</span></p>
                        <input type="text" id="start_duty" class="form-control @error('start_duty') form-control-danger @enderror" name="start_duty" value="{{ old('start_duty') }}" required>

                        @error('start_duty')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Duty Document Number -->
                    <div class="form-group @error('duty_doc_number') has-danger @enderror">
                        <p class="mb-2">@lang('form.dutyDocNumber'): <span class="tx-danger">*</span></p>
                        <input type="text" id="duty_doc_number" class="form-control @error('duty_doc_number') form-control-danger @enderror" name="duty_doc_number" value="{{ old('duty_doc_number') }}" required>

                        @error('duty_doc_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Duty Position -->
                    <div class="form-group @error('duty_position') has-danger @enderror">
                        <p class="mb-2">@lang('form.dutyPosition'): <span class="tx-danger">*</span></p>
                        <input type="text" id="duty_position" class="form-control @error('duty_position') form-control-danger @enderror" name="duty_position" value="{{ old('duty_position') }}" required>

                        @error('duty_position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
