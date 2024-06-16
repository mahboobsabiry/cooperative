@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت سوابق جواز فعالیت شرکت')
<!-- Extra Styles -->
@section('extra_css')
    <!---Fileupload css-->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet">
    <!---Fancy uploader css-->
    <link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet">
    <!--Sumoselect css-->
    <link href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">

    <!---Datetimepicker css-->
    <link href="{{ asset('backend/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">ثبت سوابق جواز فعالیت شرکت</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.coal.index') }}">جواز فعالیت شرکت ها</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.coal.show', $cal->id) }}">جواز فعالیت شرکت {{ $cal->company_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت سابقه جواز فعالیت شرکت ({{ $cal->company_name }})</li>
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
            <!-- Large Part -->
            <div class="col-md-12">
                <!-- Errors Message -->
                @include('admin.inc.alerts')

                <!-- Card -->
                <div class="card">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title mb-1">ثبت سوابق جواز فعالیت شرکت ({{ $cal->company_name }})</h6>
                        <p class="text-muted card-sub-title">ثبت سوابق فعالیت جواز فعالیت شرکت</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post" action="{{ route('admin.asycuda.coal.store_cal_exp', $cal->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Company Name && TIN -->
                                    <div class="form-group">
                                        <p class="mb-2">نام و نمبر تشخیصیه شرکت:</p>
                                        <input type="text" class="form-control" value="{{ $cal->company_name . ' - ' . $cal->company_tin }}">
                                    </div>

                                    <!-- License Number -->
                                    <div class="form-group @error('license_number') has-danger @enderror">
                                        <p class="mb-2">نمبر جواز: <span class="tx-danger">*</span></p>
                                        <input type="number" id="license_number" class="form-control @error('license_number') form-control-danger @enderror" name="license_number" value="{{ $cal->license_number ?? old('license_number') }}" required>

                                        @error('license_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Owner Name -->
                                    <div class="form-group @error('owner_name') has-danger @enderror">
                                        <p class="mb-2">نام مالک/رئیس: <span class="tx-danger">*</span></p>
                                        <input type="text" id="owner_name" class="form-control @error('owner_name') form-control-danger @enderror" name="owner_name" value="{{ $cal->owner_name ?? old('owner_name') }}" required>

                                        @error('owner_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Owner Phone -->
                                    <div class="form-group @error('owner_phone') has-danger @enderror">
                                        <p class="mb-2">شماره تماس مالک/رئیس: <span class="tx-danger">*</span></p>
                                        <input type="text" id="owner_phone" class="form-control @error('owner_phone') form-control-danger @enderror" name="owner_phone" value="{{ $cal->owner_phone ?? old('owner_phone') }}" required>

                                        @error('owner_phone')
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
                                        <p class="mb-2">تاریخ ختم: <span class="tx-danger">*</span></p>
                                        <input data-jdp type="text" id="expire_date" class="form-control @error('expire_date') form-control-danger @enderror" name="expire_date" value="{{ old('expire_date') }}" required>

                                        @error('expire_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Address -->
                                    <div class="form-group @error('address') has-danger @enderror">
                                        <p class="mb-2">آدرس: <span class="tx-danger">*</span></p>
                                        <input type="text" id="address" class="form-control @error('address') form-control-danger @enderror" name="address" value="{{ old('address') }}" required>

                                        @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- License -->
                                    <div class="form-group @error('license') has-danger @enderror">
                                        <p class="mb-2">جواز:</p>
                                        <input type="file" class="dropify" name="license" accept="image/*" data-height="200" />
                                        @error('license')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!--/==/ End of Photo -->

                                    <!-- Info -->
                                    <div class="form-group @error('info') has-danger @enderror">
                                        <p class="mb-2">@lang('global.extraInfo'):</p>
                                        <textarea class="form-control" name="info">{{ old('info') }}</textarea>

                                        @error('info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group float-left">
                                        <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                                    </div>
                                </div>
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
    <!--Fileuploads js-->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Fancy uploader js-->
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
