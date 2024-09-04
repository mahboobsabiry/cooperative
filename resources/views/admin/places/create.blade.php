<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">ثبت <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.places.store') }}" class="" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group @error('name') has-danger @enderror">
                        <label class="form-label">@lang('form.name'): <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ old('name') }}" placeholder="@lang('form.name')" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Code -->
                    <div class="form-group">
                        <label class="form-label">@lang('form.code'): <span class="tx-danger">*</span></label>
                        <input type="text" id="code" name="code" class="form-control" value="{{ $code }}" readonly disabled>
                    </div>

                    <!-- Custom Code -->
                    <div class="form-group @error('custom_code') has-danger @enderror">
                        <label class="form-label">کد گمرکی:</label>
                        <input type="text" id="custom_code" class="form-control @error('custom_code') form-control-danger @enderror" name="custom_code" value="{{ old('custom_code') }}" placeholder="کد گمرکی">

                        @error('custom_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Info -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <label class="form-label">@lang('global.extraInfo'):</label>
                        <textarea id="info" class="form-control @error('custom_code') form-control-danger @enderror" name="info" placeholder="@lang('global.extraInfo')">{{ old('info') }}</textarea>

                        @error('info')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.close')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
