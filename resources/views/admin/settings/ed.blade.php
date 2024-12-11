<!-- Edit -->
<div class="modal" id="edit_record{{ $setting->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('pages.settings.editSetting') <i class="fe fe-edit"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.settings.update', $setting->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Key -->
                    <div class="form-group @error('key') has-danger @enderror">
                        <label class="form-label">@lang('form.key'): <span class="tx-danger">*</span></label>
                        <input type="text" id="key" class="form-control @error('key') form-control-danger @enderror" name="key" value="{{ $setting->key ?? old('key') }}" placeholder="@lang('form.key')" required>

                        @error('key')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Value TR -->
                    <div class="form-group @error('value_tr') has-danger @enderror">
                        <label class="form-label">Turkce: <span class="tx-danger">*</span></label>
                        <textarea id="value_tr" class="form-control @error('value_tr') form-control-danger @enderror" name="value_tr" placeholder="Turkce" required>{{ $setting->value_tr ?? old('value_tr') }}</textarea>

                        @error('value_tr')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Value FA -->
                    <div class="form-group @error('value_fa') has-danger @enderror">
                        <label class="form-label">فارسی: <span class="tx-danger">*</span></label>
                        <textarea id="value_fa" class="form-control @error('value_fa') form-control-danger @enderror" name="value_fa" placeholder="فارسی">{{ $setting->value_fa ?? old('value_fa') }}</textarea>

                        @error('value_fa')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Value AR -->
                    <div class="form-group @error('value_ar') has-danger @enderror">
                        <label class="form-label">العربیه: <span class="tx-danger">*</span></label>
                        <textarea id="value_ar" class="form-control @error('value_ar') form-control-danger @enderror" name="value_ar" placeholder="العربیه">{{ $setting->value_ar ?? old('value_ar') }}</textarea>

                        @error('value_ar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Value EN -->
                    <div class="form-group @error('value_en') has-danger @enderror">
                        <label class="form-label">English: <span class="tx-danger">*</span></label>
                        <textarea id="value_en" class="form-control @error('value_en') form-control-danger @enderror" name="value_en" placeholder="English">{{ $setting->value_en ?? old('value_en') }}</textarea>

                        @error('value_en')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.update')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.close')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Edit -->

<!-- Delete -->
<div class="modal" id="delete_record{{ $setting->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('pages.settings.deleteSetting') <i class="fe fe-delete"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.settings.destroy', $setting->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>@lang('global.areYouSure')</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.yes')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
