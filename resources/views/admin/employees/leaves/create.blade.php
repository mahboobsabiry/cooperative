@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت رخصتی کارمند ' . $employee->name . $employee->last_name)
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">کارمندان</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.leaves.index', $employee->id) }}">رخصتی های {{ $employee->name }} {{ $employee->last_name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت رخصتی جدید</li>
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
                                <h6 class="card-title mb-1">ثبت رخصتی جدید برای {{ $employee->name }} {{ $employee->last_name }}</h6>
                                <p class="text-muted card-sub-title">You can add new record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.employees.leaves.store', $employee->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Start Date -->
                                        <div class="form-group @error('start_date') has-danger @enderror">
                                            <p class="mb-2">تاریخ شروع: <span class="tx-danger">*</span></p>
                                            <input data-jdp type="text" id="start_date" class="form-control @error('start_date') form-control-danger @enderror" name="start_date" value="{{ old('start_date') }}" required>

                                            @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Start Date -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- End Date -->
                                        <div class="form-group @error('end_date') has-danger @enderror">
                                            <p class="mb-2">تاریخ ختم: <span class="tx-danger">*</span></p>
                                            <input data-jdp type="text" id="end_date" class="form-control @error('end_date') form-control-danger @enderror" name="end_date" value="{{ old('end_date') }}" required>

                                            @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of End Date -->
                                    </div>
                                </div>

                                <!-- Second Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Leave Type -->
                                        <div class="form-group @error('leave_type') has-danger @enderror">
                                            <p class="mb-2">نوع رخصتی: <span class="tx-danger">*</span></p>

                                            <select name="leave_type" id="leave_type" class="form-control">
                                                <option value="ضروری">ضروری</option>
                                                <option value="مریضی">مریضی</option>
                                                <option value="تفریحی">تفریحی</option>
                                                <option value="حج">حج</option>
                                            </select>

                                            @error('leave_type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Leave Type -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Reason -->
                                        <div class="form-group @error('reason') has-danger @enderror">
                                            <p class="mb-2">علت:</p>
                                            <input type="text" id="reason" class="form-control @error('reason') form-control-danger @enderror" name="reason" value="{{ old('reason') }}">

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
