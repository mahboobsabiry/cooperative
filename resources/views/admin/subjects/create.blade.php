<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.add') <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.subjects.store') }}" class="" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <!-- Title -->
                    <div class="form-group @error('title') has-danger @enderror">
                        <label class="form-label">@lang('form.title'): <span class="tx-danger">*</span></label>
                        <input type="text" id="title" class="form-control @error('title') form-control-danger @enderror" name="title" value="{{  old('title') }}" placeholder="@lang('form.title')" required>

                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Info -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <label class="form-label">@lang('global.extraInfo'): <span class="tx-danger">*</span></label>
                        <textarea id="info" class="form-control @error('info') form-control-danger @enderror" name="info" placeholder="@lang('global.extraInfo')">{{ old('info') }}</textarea>

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
