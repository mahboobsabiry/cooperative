<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('pages.settings.addNewSetting') <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.settings.store') }}" class="" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <!-- Key -->
                    <div class="form-group @error('key') has-danger @enderror">
                        <label class="form-label">@lang('form.key'): <span class="tx-danger">*</span></label>
                        <input type="text" id="key" class="form-control @error('key') form-control-danger @enderror" name="key" value="{{  old('key') }}" placeholder="@lang('form.key')" required>

                        @error('key')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Value -->
                    <div class="form-group @error('value') has-danger @enderror">
                        <label class="form-label">Value: <span class="tx-danger">*</span></label>
                        <textarea id="value" class="form-control @error('value') form-control-danger @enderror" name="value" placeholder="Value" required>{{ old('value') }}</textarea>

                        @error('value')
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
