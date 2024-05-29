@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ویرایش حساب کاربری سیستم اسیکودا')
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
                <h2 class="main-content-title tx-24 mg-b-5">ویرایش حساب کاربری سیستم اسیکودا</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    @can('office_employee_view')
                        <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    @else
                        <li class="breadcrumb-item">@lang('admin.sidebar.employees')</li>
                    @endcan
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.users.index') }}">حسابات کاربری سیستم اسیکودا</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda.users.show', $asycuda_user->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ویرایش حساب کاربری اسیکودا</li>
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
                <!-- Errors Message -->
                @include('admin.inc.alerts')

                <!-- Card -->
                <div class="card mb-2">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h5 class="card-title font-weight-bold mb-1">ویرایش حساب کاربری سیستم اسیکودا مربوط ({{ $asycuda_user->employee->name }})</h5>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post" action="{{ route('admin.asycuda.users.update', $asycuda_user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Roles -->
                                    <div class="form-group @error('roles') has-danger @enderror">
                                        <p class="mb-2">@lang('admin.sidebar.roles'): <span class="tx-danger">*</span></p>
                                        <input type="text" id="roles" class="form-control @error('roles') form-control-danger @enderror" name="roles" value="{{ $asycuda_user->roles ?? old('roles') }}" required>

                                        @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Info -->
                                    <div class="form-group @error('info') has-danger @enderror">
                                        <p class="mb-2">@lang('global.extraInfo'):</p>
                                        <textarea class="form-control" name="info">{{ $asycuda_user->info ?? old('info') }}</textarea>

                                        @error('info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group float-left">
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
