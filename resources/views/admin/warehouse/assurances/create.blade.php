@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.new') . ' ~ ثبت تضمین')
<!-- Extra Styles -->
@section('extra_css')

@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.new')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.warehouse.assurances.index') }}">تضمین ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت تضمین</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ url()->previous() }}">
                    @lang('global.back')
                    <i class="fe fe-arrow-left"></i>
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form Title -->
                            <div>
                                <h6 class="card-title mb-1">ثبت تضمین جدید</h6>
                                <p class="text-muted card-sub-title">در این قسمت تضمین شرکت از بابت ترخیص اموال آن لیست می‌شود.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.warehouse.assurances.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Company -->
                                        <div class="form-group @error('company_id') has-danger @enderror">
                                            <p class="mb-2"> شرکت: <span class="tx-danger">*</span></p>
                                            <select class="form-control @error('company_id') has-danger @enderror select2" name="company_id">
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('company_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Company -->

                                        <!-- Good Name -->
                                        <div class="form-group @error('good_name') has-danger @enderror">
                                            <p class="mb-2">نوع جنس: <span class="tx-danger">*</span></p>
                                            <input type="text" id="good_name" class="form-control @error('good_name') form-control-danger @enderror" name="good_name" value="{{ old('good_name') }}" required>

                                            @error('good_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Good Name -->

                                        <!-- Assurance Total -->
                                        <div class="form-group @error('assurance_total') has-danger @enderror">
                                            <p class="mb-2">مقدار تضمین: <span class="tx-danger">*</span></p>
                                            <input type="number" id="assurance_total" class="form-control @error('assurance_total') form-control-danger @enderror" name="assurance_total" value="{{ old('assurance_total') }}" required>

                                            @error('assurance_total')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Assurance Total -->

                                        <!-- Bank TT -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Bank TT Number -->
                                                <div class="form-group @error('bank_tt_number') has-danger @enderror">
                                                    <p class="mb-2">نمبر آویز بانکی: <span class="tx-danger">*</span></p>
                                                    <input type="number" id="bank_tt_number" class="form-control @error('bank_tt_number') form-control-danger @enderror" name="bank_tt_number" value="{{ old('bank_tt_number') }}" required>

                                                    @error('bank_tt_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Bank TT Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Bank TT Date -->
                                                <div class="form-group @error('bank_tt_date') has-danger @enderror">
                                                    <p class="mb-2">تاریخ آویز بانکی: <span class="tx-danger">*</span></p>
                                                    <input type="text" data-jdp data-jdp-max-date="today" id="bank_tt_date" class="form-control @error('bank_tt_date') form-control-danger @enderror" name="bank_tt_date" value="{{ old('bank_tt_date') }}" required>

                                                    @error('bank_tt_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Bank TT Date -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Bank TT -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Inquiry Number -->
                                        <div class="form-group @error('inquiry_number') has-danger @enderror">
                                            <p class="mb-2">نمبر استعلام: <span class="tx-danger">*</span></p>
                                            <input type="number" id="inquiry_number" class="form-control @error('inquiry_number') form-control-danger @enderror" name="inquiry_number" value="{{ old('inquiry_number') }}" required>

                                            @error('inquiry_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Inquiry Number -->

                                        <!-- Inquiry Date -->
                                        <div class="form-group @error('inquiry_date') has-danger @enderror">
                                            <p class="mb-2">تاریخ استعلام: <span class="tx-danger">*</span></p>
                                            <input type="text" data-jdp data-jdp-max-date="today" id="inquiry_date" class="form-control @error('inquiry_date') form-control-danger @enderror" name="inquiry_date" value="{{ old('inquiry_date') }}" required>

                                            @error('inquiry_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Inquiry Date -->

                                        <!-- Reason -->
                                        <div class="form-group @error('reason') has-danger @enderror">
                                            <p class="mb-2">علت: </p>
                                            <textarea id="reason" class="form-control @error('reason') form-control-danger @enderror" name="reason">{{ old('reason') }}</textarea>

                                            @error('reason')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Reason -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                                </div>
                            </form>
                            <!--/==/ End of Form -->
                        </div>
                    </div>
                    <!--/==/ End of Card Body -->
                </div>
                <!--/==/ End of Card -->
            </div>
        </div>
        <!--/==/ End of Main Row -->
    </div>
@endsection
<!--/==/ End of Main Content of The Page -->

<!-- Extra Scripts -->
@section('extra_js')
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
