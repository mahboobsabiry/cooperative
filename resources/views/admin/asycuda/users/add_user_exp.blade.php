@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت سوابق حساب کاربری سیستم اسیکودا')
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
                <h2 class="main-content-title tx-24 mg-b-5">ثبت سوابق حساب کاربری سیستم اسیکودا</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    @can('office_employee_view')
                        <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    @else
                        <li class="breadcrumb-item">@lang('admin.sidebar.employees')</li>
                    @endcan
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.users.index') }}">حسابات کاربری سیستم اسیکودا</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.users.show', $asycuda_user->id) }}">حساب کاربری سیستم اسیکودا</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت سابقه حساب کاربری ({{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }})</li>
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
                            <h6 class="card-title mb-1">ثبت سوابق حساب کاربری سیستم اسیکودا ({{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }})</h6>
                            <p class="text-muted card-sub-title">ثبت سوابق فعالیت حساب کاربری سیستم اسیکودا کارمندان گمرک بلخ اینجا انجام میشود.</p>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{ route('admin.asycuda.users.store_user_exp', $asycuda_user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Position -->
                                    <div class="form-group @error('position') has-danger @enderror">
                                        <p class="mb-2">بست: <span class="tx-danger">*</span></p>
                                        <input type="text" id="position" class="form-control @error('position') form-control-danger @enderror" name="position" @if($asycuda_user->employee->on_duty == 0) value="{{ $asycuda_user->employee->position->title ?? old('position') }}" @else value="{{ $asycuda_user->employee->duty_position ?? old('position') }}" @endif required>

                                        @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Position Type -->
                                    <div class="form-group @error('position_type') has-danger @enderror">
                                        <p class="mb-2">نوع بست: <span class="tx-danger">*</span></p>
                                        <select name="position_type" class="form-control">
                                            <option value="0" {{ $asycuda_user->employee->on_duty == 0 ? 'selected' : '' }}>اصل بست</option>
                                            <option value="1" {{ $asycuda_user->employee->on_duty == 1 ? 'selected' : '' }}>خدمتی</option>
                                        </select>

                                        @error('position_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- User Roles -->
                                    <div class="form-group @error('user_roles') has-danger @enderror">
                                        <p class="mb-2">صلاحیت های حساب کاربری: <span class="tx-danger">*</span></p>
                                        <input type="text" id="user_roles" class="form-control @error('user_roles') form-control-danger @enderror" name="user_roles" value="{{ $asycuda_user->roles ?? old('user_roles') }}" required>

                                        @error('user_roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- User Status -->
                                    <div class="form-group @error('user_status') has-danger @enderror">
                                        <p class="mb-2">وضعیت حساب کاربری: <span class="tx-danger">*</span></p>
                                        <select name="user_status" class="form-control">
                                            <option value="1" {{ $asycuda_user->status == 1 ? 'selected' : '' }}>فعال</option>
                                            <option value="0" {{ $asycuda_user->status == 0 ? 'selected' : '' }}>غیر فعال</option>
                                        </select>

                                        @error('user_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Document Number -->
                                    <div class="form-group @error('doc_number') has-danger @enderror">
                                        <p class="mb-2">نمبر مکتوب: <span class="tx-danger">*</span></p>
                                        <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                                        @error('doc_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Document Date -->
                                    <div class="form-group @error('doc_date') has-danger @enderror">
                                        <p class="mb-2">تاریخ مکتوب: <span class="tx-danger">*</span></p>
                                        <input data-jdp data-jdp-max-date="today" type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                                        @error('doc_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Photo -->
                                    <div class="form-group @error('photo') has-danger @enderror">
                                        <p class="mb-2">مکتوب:</p>
                                        <input type="file" class="dropify" name="photo" accept="image/*" data-height="200" />
                                        @error('photo')
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
