<!-- Reset Position -->
<div class="modal" id="reset_position{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تبدیل کارمند ({{ $employee->name }}) به اصل بست</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <p>@lang('global.areYouSure')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.office.employees.reset_position', $employee->id) }}" class="btn ripple btn-primary">@lang('global.yes')</a>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
            </div>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Reset Position -->

<!-- Retire Employee -->
<div class="modal" id="retire_employee{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تقاعد کارمند ({{ $employee->name }}) </h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <p>@lang('global.areYouSure')</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('admin.office.employees.retire_employee', $employee->id) }}" class="btn ripple btn-primary">@lang('global.yes')</a>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">@lang('global.no')</button>
            </div>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Reset Position -->

<!-- Change Position Employee -->
<div class="modal" id="change_pos_employee{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">تبدیل نمودن کارمند ({{ $employee->name }}) به ارگان/اداره دیگر</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.employees.change_position_ocustom', $employee->id) }}" class="background_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Document Number -->
                    <div class="form-group @error('doc_number') has-danger @enderror">
                        <p class="mb-2">1) @lang('pages.employees.docNumber'): <span class="tx-danger">*</span></p>
                        <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                        @error('doc_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Document Date -->
                    <div class="form-group @error('doc_date') has-danger @enderror">
                        <p class="mb-2">2) @lang('pages.employees.docDate'): <span class="tx-danger">*</span></p>
                        <input type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                        @error('doc_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="form-group @error('bg_position') has-danger @enderror">
                        <p class="mb-2">3) @lang('form.position'): <span class="tx-danger">*</span></p>
                        <input type="text" id="bg_position" class="form-control @error('bg_position') form-control-danger @enderror" name="bg_position" value="{{ old('bg_position') }}" required>

                        @error('bg_position')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Custom/Organ -->
                    <div class="form-group @error('cus_org') has-danger @enderror">
                        <p class="mb-2">3) گمرک/ارگان: <span class="tx-danger">*</span></p>
                        <input type="text" id="cus_org" class="form-control @error('cus_org') form-control-danger @enderror" name="cus_org" value="{{ old('cus_org') }}" required>

                        @error('cus_org')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Change Position Employee -->

<!-- Fire Employee -->
<div class="modal" id="fire_employee{{ $employee->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">منفک نمودن کارمند ({{ $employee->name }})</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>

            <!-- Form -->
            <form method="post" action="{{ route('admin.office.employees.fire_employee', $employee->id) }}" class="background_form">
                @csrf
                <div class="modal-body">
                    <!-- Fire Reason -->
                    <div class="form-group @error('info') has-danger @enderror">
                        <p class="mb-2">علت منفکی: <span class="tx-danger">*</span></p>
                        <textarea class="form-control" name="info">{{ old('info') }}</textarea>

                        @error('info')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">منفک</button>
                    <button class="btn ripple btn-dark" data-dismiss="modal" type="button">@lang('global.cancel')</button>
                </div>
            </form>
            <!--/==/ End of Form -->
        </div>
    </div>
</div>
<!--/==/ End of Fire Employee -->
