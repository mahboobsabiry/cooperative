<!-- Delete -->
<div class="modal" id="edit_record{{ $company->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.edit') {{ $company->name }}</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.companies.update', $company->id) }}" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Info -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <p class="mb-2">@lang('global.extraInfo'):</p>
                        <textarea name="info" id="info" class="form-control @error('info') form-control-danger @enderror" placeholder="@lang('global.extraInfo')">{{ $company->info ?? old('info') }}</textarea>

                        @error('info')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--/==/ End of Info -->
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.update')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
