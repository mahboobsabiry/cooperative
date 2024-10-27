<!-- Show -->
<div class="modal" id="show_code{{ $code->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">جزئیات کد بست</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <table>
                    <!-- ID -->
                    <tr>
                        <th class="font-weight-bold">ID:</th>
                        <td>&nbsp;{{ $code->id }}</td>
                    </tr>

                    <!-- Position -->
                    <tr>
                        <th class="font-weight-bold">@lang('pages.positions.position'):</th>
                        <td>&nbsp;{{ $code->position->title }}</td>
                    </tr>

                    <!-- Code -->
                    <tr>
                        <th class="font-weight-bold">@lang('form.code'):</th>
                        <td>&nbsp;{{ $code->code }}</td>
                    </tr>

                    <!-- Status -->
                    <tr>
                        <th class="font-weight-bold">@lang('form.status'):</th>
                        <td>&nbsp;{{ $code->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                    </tr>

                    <!-- Extra Information -->
                    <tr>
                        <th class="font-weight-bold">@lang('global.extraInfo'):</th>
                        <td>&nbsp;{{ $code->info }}</td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.close')</button>
            </div>
        </div>
    </div>
</div>
<!--/==/ End of Show -->

<!-- Edit -->
<div class="modal" id="edit_code{{ $code->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">ویرایش کد بست</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.positions.edit_code', $code->id) }}" data-parsley-validate="">
                @csrf
                <div class="modal-body">
                    <!-- Code -->
                    <div class="form-group @error('code') form-group-danger @enderror">
                        <p>@lang('form.code'): <span class="text-danger">*</span></p>
                        <input type="text" name="code" id="code" class="form-control @error('code') form-control-danger @enderror" value="{{ $code->code ?? '' }}" required>
                    </div>

                    <!-- Extra Info -->
                    <div class="form-group @error('info') form-group-danger @enderror">
                        <p>@lang('global.extraInfo'):</p>
                        <textarea name="info" id="info" class="form-control" placeholder="@lang('global.extraInfo')">{{ $code->info ?? '' }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Edit -->
