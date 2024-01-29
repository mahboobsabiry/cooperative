@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . 'ثبت جواز شرکت')
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
                <h2 class="main-content-title tx-24 mg-b-5">ثبت جواز شرکت</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.coal.index') }}">جواز شرکت ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت جواز شرکت</li>
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
                        <!-- Errors Message -->
                        @include('admin.inc.alerts')

                        <!-- Form Title -->
                        <div>
                            <h6 class="card-title mb-1">ثبت جواز شرکت</h6>
                            <p class="text-muted card-sub-title">You can add new record here.</p>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{ route('admin.asycuda.coal.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Company Name -->
                                    <div class="form-group @error('company_name') has-danger @enderror">
                                        <p class="mb-2">نام شرکت: <span class="tx-danger">*</span></p>
                                        <input type="text" id="company_name" class="form-control @error('company_name') form-control-danger @enderror" name="company_name" value="{{ old('company_name') }}" required>

                                        @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Company TIN -->
                                    <div class="form-group @error('company_tin') has-danger @enderror">
                                        <p class="mb-2">نمبر تشخیصیه شرکت: <span class="tx-danger">*</span></p>
                                        <input type="number" id="company_tin" class="form-control @error('company_tin') form-control-danger @enderror" name="company_tin" value="{{ old('company_tin') }}" required>

                                        @error('company_tin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- License Number -->
                                    <div class="form-group @error('license_number') has-danger @enderror">
                                        <p class="mb-2">نمبر جواز شرکت: <span class="tx-danger">*</span></p>
                                        <input type="number" id="license_number" class="form-control @error('license_number') form-control-danger @enderror" name="license_number" value="{{ old('license_number') }}" required>

                                        @error('license_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Export Date -->
                                    <div class="form-group @error('export_date') has-danger @enderror">
                                        <p class="mb-2">تاریخ صدور: <span class="tx-danger">*</span></p>
                                        <input data-jdp type="text" id="export_date" class="form-control @error('export_date') form-control-danger @enderror" name="export_date" value="{{ old('export_date') }}" required>

                                        @error('export_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Expire Date -->
                                    <div class="form-group @error('expire_date') has-danger @enderror">
                                        <p class="mb-2">تاریخ ختم جواز: <span class="tx-danger">*</span></p>
                                        <input data-jdp type="text" id="expire_date" class="form-control @error('expire_date') form-control-danger @enderror" name="expire_date" value="{{ old('expire_date') }}" required>

                                        @error('expire_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Owner Name -->
                                    <div class="form-group @error('owner_name') has-danger @enderror">
                                        <p class="mb-2">نام مالک/رئیس: <span class="tx-danger">*</span></p>
                                        <input type="text" id="owner_name" class="form-control @error('owner_name') form-control-danger @enderror" name="owner_name" value="{{ old('owner_name') }}" required>

                                        @error('owner_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Owner Phone -->
                                    <div class="form-group @error('owner_phone') has-danger @enderror">
                                        <p class="mb-2">شماره تماس مالک/رئیس:</p>
                                        <input type="tel" id="owner_phone" class="form-control @error('owner_phone') form-control-danger @enderror" name="owner_phone" value="{{ old('owner_phone') }}">

                                        @error('owner_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div class="form-group @error('phone') has-danger @enderror">
                                        <p class="mb-2">@lang('form.phone'): <span class="tx-danger">*</span></p>
                                        <input type="tel" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ old('phone') }}">

                                        @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-group @error('email') has-danger @enderror">
                                        <p class="mb-2">@lang('form.email'): <span class="tx-danger">*</span></p>
                                        <input type="email" id="email" class="form-control @error('email') form-control-danger @enderror" name="email" value="{{ old('email') }}" required>

                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="form-group @error('address') has-danger @enderror">
                                        <p class="mb-2">@lang('global.address'): <span class="tx-danger">*</span></p>
                                        <input type="text" id="address" class="form-control @error('address') form-control-danger @enderror" name="address" value="{{ old('address') }}" required>

                                        @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

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
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                            </div>
                        </form>
                        <!--/==/ End of Form -->
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
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
