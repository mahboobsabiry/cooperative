@extends('layouts.admin.master')
<!-- Title -->
@section('title', $employee->name . ' ' . $employee->last_name)
<!-- Extra Styles -->
@section('extra_css')
    @if(app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @endif
    <style>
        .emp-profile-img {
            width: 190px;
            height: 190px;
            position: absolute;
            z-index: 1;
            margin-top: 80px;
            margin-right: 80px;
            border-radius: 70%;
            padding-left: 8px;
            padding-bottom: 0;
            padding-right: 8px;
        }
        .id-card-img {
            width: 360px; height: 590px;
            -webkit-border-radius: 10px;
            -webkit-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -moz-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -ms-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -o-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
        }
        .id-card-back-img {
            -webkit-border-radius: 10px;
            -webkit-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -moz-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -ms-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -o-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
        }
        .emp-name {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 386px;
            font-size: xx-large;
            color: blue;
            font-weight: bold;
        }
        .emp-pos-title {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 437px;
            font-size: large;
            color: black;
            font-weight: bolder;
        }
        .emp-id {
            position: absolute;
            z-index: 1;
            margin-top: 468px;
            margin-right: 108px;
            font-family: "Times New Roman";
            font-size: 23px;
            color: black;
            font-weight: 500;
        }
        .emp-phone {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 494px;
            font-family: "Times New Roman";
            font-size: 23px;
            color: black;
            font-weight: bolder;
        }
    </style>
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.employees.employeeInfo')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.employees.employeeInfo')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('office_employee_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $employee->id }}"
                               title="@lang('pages.employees.deleteEmployee')">
                                <i class="fe fe-trash"></i>
                                @lang('global.delete')
                            </a>

                            @include('admin.office.employees.delete')
                        </div>
                @endcan

                    @can('office_employee_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm tx-white"
                               href="{{ route('admin.office.employees.edit', $employee->id) }}">
                                <i class="fe fe-edit"></i>
                                @lang('global.edit')
                            </a>
                        </div>
                    @endcan

                    @can('office_employee_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple bg-primary btn-sm tx-white"
                               href="{{ route('admin.office.employees.create') }}">
                                <i class="fe fe-plus-circle"></i>
                                @lang('global.add')
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
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
                                <span>{{ $employee->name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $employee->username ?? '' }}</p>

                            <!-- Employee Star -->
                            <p class="user-info-rating">
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div>
                            <h6 class="card-title tx-15 tx-bold mb-0">
                                اطلاعات لازم
                            </h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="main-profile-contact-list main-profile-work-list">
                            <!-- Status -->
                            <div class="media">
                                <div class="media-logo bg-light text-dark">
                                    <i class="fe fe-message-square"></i>
                                </div>
                                <div class="media-body">
                                    <span>وضعیت یوزر</span>
                                    <div>
                                        @if($employee->user)
                                            @can('user_mgmt')
                                                <a href="{{ route('admin.users.show', encrypt($employee->user->id)) }}" target="_blank">حساب کاربری BEAM دارد ({{ $employee->user->status == '1' ? 'فعال' : 'غیرفعال' }})</a>
                                            @else
                                                حساب کاربری BEAM دارد
                                            @endcan
                                        @else
                                            حساب کاربری BEAM ندارد
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Status -->

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
            <div class="col-lg-8 col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $employee->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fa fa-user-tie"></i> کارمند
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($employee->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details Card -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header">
                        <h4 class="card-title font-weight-bold">@lang('global.details')</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <!-- Personal Information Table -->
                        @include('admin.office.employees.inc.tables')
                        <!--/==/ End of Personal Information -->
                    </div>
                </div>
                <!--/==/ End of Details Card -->
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>
    <script>
        function printDiv()
        {

            var divToPrint=document.getElementById('printIdCardBack');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

        }
    </script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
