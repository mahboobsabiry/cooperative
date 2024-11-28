<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.add') <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.finance.currencies.store') }}" class="" data-parsley-validate="">
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
                    <div class="form-group @error('code') has-danger @enderror">
                        <label class="form-label">@lang('form.code'): <span class="tx-danger">*</span></label>
                        <input type="text" id="code" class="form-control @error('code') form-control-danger @enderror" name="code" value="{{ old('code') }}" placeholder="USD" required>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Symbol -->
                    <div class="form-group @error('symbol') has-danger @enderror">
                        <label class="form-label">@lang('form.symbol'): <span class="tx-danger">*</span></label>
                        <input type="text" id="symbol" class="form-control @error('symbol') form-control-danger @enderror" name="symbol" value="{{ old('symbol') }}" placeholder="$" required>

                        @error('symbol')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <label class="form-label">@lang('global.extraInfo'):</label>
                        <textarea class="form-control @error('info') form-control-danger @enderror" id="info" name="info">{{ old('info') }}</textarea>

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
