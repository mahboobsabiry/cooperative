@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'تبدیل کارمند به اصل بست')
<!-- Extra Styles -->
@section('extra_css')

@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">تبدیل کارمند به اصل بست</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.show', $employee->id) }}">@lang('pages.employees.employeeInfo')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.resumes', $employee->id) }}">سوابق کارمند</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تبدیل کارمند به اصل بست</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!-- Profile Main Info -->
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user">
                                <img alt="avatar"
                                     src="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>

                        <!-- Main Info -->
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $employee->name }} {{ $employee->last_name }}</span>
                            </h4>

                            @if($employee->status == 0)
                                <!-- Position -->
                                @can('office_position_view')
                                    <a href="{{ route('admin.office.positions.show', $employee->position->id) }}" target="_blank" class="pro-user-desc mb-1">{{ $employee->position->title }} ({{ $employee->position->place }})</a>
                                @else
                                    <p class="pro-user-desc text-muted mb-1">{{ $employee->position->title ?? '' }} ({{ $employee->position->place }})</p>
                                @endcan
                                @if($employee->on_duty == 1)
                                    <p class="pro-user-desc text-muted mb-1">{{ $employee->duty_position ?? '' }}</p>
                                @endif
                                <!-- Employee Star -->
                                <p class="user-info-rating">
                                    @for($i=1; $i<=$employee->position->position_number; $i++)
                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    @endfor
                                </p>
                                <!--/==/ End of Employee Star -->
                            @else
                                <span class="text-danger">
                                    @if($employee->status == 1)
                                        تقاعد نموده است
                                    @elseif($employee->status == 2)
                                        منفک گردیده است
                                    @elseif($employee->status == 3)
                                        تبدیل گردیده است
                                    @elseif($employee->status == 4)
                                        معلق
                                    @elseif($employee->status == 5)
                                        از اداره/ارگان دیگر طور خدمتی آمده است.
                                        <br>
                                        @if($employee->on_duty == 1)
                                            <p class="pro-user-desc text-muted mb-1">{{ $employee->duty_position ?? '' }}</p>
                                        @endif
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div>
                            <h6 class="card-title mb-0">
                                اطلاعات لازم
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="main-profile-contact-list main-profile-work-list">
                            <!-- Phone Number -->
                            <div class="media">
                                <div class="media-logo bg-light text-dark">
                                    <i class="fe fe-smartphone"></i>
                                </div>
                                <div class="media-body">
                                    <span>@lang('form.phone')</span>
                                    <div>
                                        <a href="callto:{{ $employee->phone }}" class="ctd">{{ $employee->phone }}</a>
                                        @if(!empty($employee->phone2))
                                            , <a href="callto:{{ $employee->phone2 }}"
                                                 class="ctd">{{ $employee->phone2 }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Phone Number -->

                            <!-- Email Address -->
                            <div class="media">
                                <div class="media-logo bg-light text-dark">
                                    <i class="fe fe-mail"></i>
                                </div>
                                <div class="media-body">
                                    <span>@lang('form.email')</span>
                                    <div>
                                        <a href="mailto:{{ $employee->email }}" class="ctd">{{ $employee->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Email Address -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Contact Information -->
            </div>
            <div class="col-lg-9 col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <div class="card">
                    <!-- Header -->
                    <div class="card-header row">
                        <div class="col-md-6">
                            <div class="font-weight-bold">تبدیل کارمند به اصل بست</div>
                        </div>
                        <div class="col-md-6 text-left">

                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form method="post" action="{{ route('admin.office.employees.change_to_main_pos', $employee->id) }}" class="background_form" enctype="multipart/form-data">
                            @csrf
                            <!-- Employee && Document Number -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Duty Position -->
                                    <div class="form-group @error('position') has-danger @enderror">
                                        <p class="mb-2">بست:</p>
                                        <input type="text" class="form-control" value="{{ $employee->position->title }}" disabled>
                                    </div>

                                    <!-- Start Duty Date -->
                                    <div class="form-group @error('start_date') has-danger @enderror">
                                        <p class="mb-2">@lang('form.startDuty'): <span class="tx-danger">*</span></p>
                                        <input data-jdp data-jdp-max-date="today" type="text" id="start_date" class="form-control @error('start_date') form-control-danger @enderror" name="start_date" value="{{ old('start_date') }}" required>

                                        @error('start_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Duty Document Number -->
                                    <div class="form-group @error('doc_number') has-danger @enderror">
                                        <p class="mb-2">@lang('form.dutyDocNumber'): <span class="tx-danger">*</span></p>
                                        <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                                        @error('doc_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Duty Document Date -->
                                    <div class="form-group @error('doc_date') has-danger @enderror">
                                        <p class="mb-2">تاریخ مکتوب: <span class="tx-danger">*</span></p>
                                        <input data-jdp type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                                        @error('doc_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Employee && Document Number -->

                            <!-- Start Duty && Duty Document Number -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- File -->
                                    <div class="form-group @error('photo') has-danger @enderror">
                                        <p class="mb-2">اسکن مکتوب: </p>
                                        <input type="file" id="photo" class="form-control @error('photo') form-control-danger @enderror" name="photo">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Info -->
                                    <div class="form-group @error('info') has-danger @enderror">
                                        <p class="mb-2">@lang('global.extraInfo'):</p>
                                        <textarea class="form-control" name="info" id="info">{{ old('info') }}</textarea>

                                        @error('info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Info -->
                            <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                        </form>
                        <!--/==/ End of Form -->
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')

@endsection
<!--/==/ End of Extra Scripts -->
