<!-- Change Position to Other Custom -->
<div class="modal" id="change_position_ocustom{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تبدیل کارمند ({{ $employee->name }}) به گمرک یا ارگان دیگر</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.employees.change_position_ocustom', $employee->id) }}" class="background_form">
                @csrf
                <div class="modal-body">
                    <!-- Document Number -->
                    <div class="form-group @error('doc_number') has-danger @enderror">
                        <p class="mb-2">1) @lang('pages.employees.docNumber'): <span class="tx-danger">*</span></p>
                        <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                        @error('doc_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Document Date -->
                    <div class="form-group @error('doc_date') has-danger @enderror">
                        <p class="mb-2">2) @lang('pages.employees.docDate'): <span class="tx-danger">*</span></p>
                        <input type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                        @error('doc_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="form-group @error('bg_position') has-danger @enderror">
                        <p class="mb-2">3) @lang('form.position'): <span class="tx-danger">*</span></p>
                        <input type="text" id="bg_position" class="form-control @error('bg_position') form-control-danger @enderror" name="bg_position" value="{{ old('bg_position') }}" required>

                        @error('bg_position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Custom/Organ -->
                    <div class="form-group @error('cus_org') has-danger @enderror">
                        <p class="mb-2">3) گمرک/ارگان: <span class="tx-danger">*</span></p>
                        <input type="text" id="cus_org" class="form-control @error('cus_org') form-control-danger @enderror" name="cus_org" value="{{ old('cus_org') }}" required>

                        @error('cus_org')
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
