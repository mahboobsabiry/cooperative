<!-- Edit -->
<div class="modal" id="edit_record{{ $category->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.edit') <i class="fe fe-edit"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.categories.update', $category->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Title -->
                    <div class="form-group @error('title') has-danger @enderror">
                        <label class="form-label">@lang('form.title'): <span class="tx-danger">*</span></label>
                        <input type="text" id="title" class="form-control @error('title') form-control-danger @enderror" name="title" value="{{ $category->title ?? old('title') }}" placeholder="@lang('form.title')" required>

                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Info -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <label class="form-label">@lang('global.extraInfo'): <span class="tx-danger">*</span></label>
                        <textarea id="info" class="form-control @error('info') form-control-danger @enderror" name="info" placeholder="@lang('global.extraInfo')" required>{{ $category->info ?? old('info') }}</textarea>

                        @error('info')
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
