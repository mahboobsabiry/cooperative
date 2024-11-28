<!-- Edit -->
<div class="modal" id="edit_record{{ $currency->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.edit') <i class="fe fe-edit"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.finance.currencies.update', $currency->id) }}" class="" data-parsley-validate="">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group @error('name') has-danger @enderror">
                        <label class="form-label">@lang('form.name'): <span class="tx-danger">*</span></label>
                        <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $currency->name ?? old('name') }}" placeholder="@lang('form.name')" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Code -->
                    <div class="form-group @error('code') has-danger @enderror">
                        <label class="form-label">@lang('form.code'): <span class="tx-danger">*</span></label>
                        <input type="text" id="code" class="form-control @error('code') form-control-danger @enderror" name="code" value="{{ $currency->code ?? old('code') }}" placeholder="USD" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Symbol -->
                    <div class="form-group @error('symbol') has-danger @enderror">
                        <label class="form-label">@lang('form.symbol'): <span class="tx-danger">*</span></label>
                        <input type="text" id="symbol" class="form-control @error('symbol') form-control-danger @enderror" name="symbol" value="{{ $currency->symbol ?? old('symbol') }}" placeholder="$" required>

                        @error('symbol')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <label class="form-label">@lang('global.extraInfo'):</label>
                        <textarea class="form-control @error('info') form-control-danger @enderror" id="info" name="info">{{ $currency->info ?? old('info') }}</textarea>

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
<div class="modal" id="delete_record{{ $currency->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.delete') <i class="fe fe-delete"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.finance.currencies.destroy', $currency->id) }}" class="" data-parsley-validate="">
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
