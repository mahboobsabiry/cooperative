@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . 'ثبت یوزر کارمند')
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
                <h2 class="main-content-title tx-24 mg-b-5">ثبت یوزر کارمند</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.asycuda-users.index') }}">یوزر کارمندان</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت یوزر کارمند</li>
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
                            <h6 class="card-title mb-1">ثبت یوزر کارمند</h6>
                            <p class="text-muted card-sub-title">You can add new record here.</p>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{ route('admin.asycuda-users.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Employee -->
                                    <div class="form-group @error('employee_id') has-danger @enderror">
                                        <p class="mb-2">کارمند: <span class="tx-danger">*</span></p>

                                        <select class="form-control @error('employee_id') form-control-danger @enderror select2" name="employee_id">
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->last_name }}</option>
                                            @endforeach
                                        </select>

                                        @error('employee_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- User -->
                                    <div class="form-group @error('user') has-danger @enderror">
                                        <p class="mb-2">یوزر: <span class="tx-danger">*</span></p>
                                        <input type="number" id="user" class="form-control @error('user') form-control-danger @enderror" name="user" value="{{ old('user') }}" required>

                                        @error('user')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group @error('password') has-danger @enderror">
                                        <p class="mb-2">@lang('form.password'): <span class="tx-danger">*</span></p>
                                        <input type="number" id="password" class="form-control @error('password') form-control-danger @enderror" name="password" value="200" required>

                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Roles -->
                                    <div class="form-group @error('roles') has-danger @enderror">
                                        <p class="mb-2">@lang('admin.sidebar.roles'): <span class="tx-danger">*</span></p>
                                        <input type="text" id="roles" class="form-control @error('roles') form-control-danger @enderror" name="roles" value="{{ old('roles') }}" required>

                                        @error('roles')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Info -->
                                    <div class="form-group @error('info') has-danger @enderror">
                                        <p class="mb-2">@lang('global.extraInfo'): <span class="tx-danger">*</span></p>
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
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
