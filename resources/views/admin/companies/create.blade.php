<div class="modal" id="new_record">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">@lang('global.new') <i class="fe fe-plus-circle"></i></h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.companies.store') }}" class="" data-parsley-validate="">
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

                    <!-- TIN -->
                    <div class="form-group @error('tin') has-danger @enderror">
                        <label class="form-label">TIN: <span class="tx-danger">*</span></label>
                        <input type="number" id="tin" class="form-control @error('tin') form-control-danger @enderror" name="tin" value="{{ old('tin') }}" placeholder="TIN" required>

                        @error('tin')
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
