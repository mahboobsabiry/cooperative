<!-- Delete -->
<div class="modal" id="add_code{{ $position->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">ثبت کد بست</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.positions.add_code', $position->id) }}" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <div class="form-group @error('code') form-group-danger @enderror">
                        <p>@lang('form.code'): <span class="text-danger">*</span></p>
                        <input type="text" name="code" id="code" class="form-control @error('code') form-control-danger @enderror" value="001">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.add')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Delete -->
