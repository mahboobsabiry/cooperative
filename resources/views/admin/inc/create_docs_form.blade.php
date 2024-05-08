<div class="row">
    <div class="col-md-4">
        <!-- Type -->
        <div class="form-group @error('type') has-danger @enderror">
            <p class="mb-2">نوعیت: <span class="tx-danger">*</span></p>
            <select id="type" name="type" class="form-control">
                <option value="document">مکتوب</option>
                <option value="suggestion">پیشنهاد</option>
            </select>

            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Subject -->
        <div class="form-group @error('subject') has-danger @enderror">
            <p class="mb-2">موضوع: <span class="tx-danger">*</span></p>
            <input type="text" id="subject" class="form-control @error('subject') form-control-danger @enderror" name="subject" value="{{ old('subject') }}" required>

            @error('subject')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Document Number -->
        <div class="form-group @error('doc_number') has-danger @enderror">
            <p class="mb-2">نمبر: <span class="tx-danger">*</span></p>
            <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

            @error('doc_number')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <!-- Doc Type -->
        <div class="form-group @error('doc_type') has-danger @enderror">
            <p class="mb-2">نوعیت سند: <span class="tx-danger">*</span></p>
            <select id="doc_type" name="doc_type" class="form-control">
                <option value="normal">عادی</option>
                <option value="fast">عاجل</option>
                <option value="secret">محرم</option>
            </select>

            @error('doc_type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Doc Date -->
        <div class="form-group @error('doc_date') has-danger @enderror">
            <p class="mb-2">تاریخ صدور: <span class="tx-danger">*</span></p>
            <input data-jdp data-jdp-max-date="today" type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

            @error('doc_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Appendices -->
        <div class="form-group @error('appendices') has-danger @enderror">
            <p class="mb-2">ضمایم: <span class="tx-danger">*</span></p>
            <input type="number" id="appendices" class="form-control @error('appendices') form-control-danger @enderror" name="appendices" value="{{ old('appendices') }}" required>

            @error('appendices')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="col-md-4">
        <!-- Document -->
        <div class="form-group @error('document') has-danger @enderror">
            <p class="mb-2">مکتوب:<span class="tx-danger">*</span></p>
            <input type="file" class="form-control-file" name="document[]" accept="image/*" data-height="200" multiple />
            @error('document')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!--/==/ End of Document -->

        <!-- Description -->
        <div class="form-group @error('info') has-danger @enderror">
            <p class="mb-2">@lang('form.extraInfo'):</p>
            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ old('info') }}</textarea>

            @error('info')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <!--/==/ End of Description -->
    </div>
</div>
