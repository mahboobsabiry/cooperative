<div class="collapse mg-t-5" id="collapseAddBackground">
    <div class="card card-body">
        <!-- Header -->
        <div class="">
            <h6 class="">@lang('pages.employees.addBackground') <i class="fe fe-plus-circle"></i></h6>
        </div>

        <!-- Form -->
        <form method="post" action="{{ route('admin.employees.add_background', $employee->id) }}" class="background_form">
            @csrf
            <div class="">
                <!-- From Date -->
                <div class="form-group @error('from_date') has-danger @enderror">
                    <p class="mb-2">1) @lang('form.fromDate'): <span class="tx-danger">*</span></p>
                    <input type="text" id="from_date" class="form-control @error('from_date') form-control-danger @enderror" name="from_date" value="{{ old('from_date') }}" required>

                    @error('from_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- To Date -->
                <div class="form-group @error('to_date') has-danger @enderror" id="to_date_div">
                    <p class="mb-2">2) @lang('form.toDate'): <span class="tx-danger">*</span></p>
                    <input type="text" id="to_date" class="form-control @error('to_date') form-control-danger @enderror" name="to_date" value="{{ old('to_date') }}" required>

                    @error('to_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Document Number -->
                <div class="form-group @error('doc_number') has-danger @enderror">
                    <p class="mb-2">3) @lang('pages.employees.docNumber'): <span class="tx-danger">*</span></p>
                    <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                    @error('doc_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Document Date -->
                <div class="form-group @error('doc_date') has-danger @enderror">
                    <p class="mb-2">4) @lang('pages.employees.docDate'): <span class="tx-danger">*</span></p>
                    <input type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                    @error('doc_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Position -->
                <div class="form-group @error('bg_position') has-danger @enderror">
                    <p class="mb-2">5) @lang('form.position'): <span class="tx-danger">*</span></p>
                    <input type="text" id="bg_position" class="form-control @error('bg_position') form-control-danger @enderror" name="bg_position" value="{{ old('bg_position') }}" required>

                    @error('bg_position')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="">
                <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
            </div>
        </form>
        <!--/==/ End of Form -->
    </div>
</div>
