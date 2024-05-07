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
                        <a href="{{ route('admin.employees.index') }}">@lang('admin.sidebar.employees')</a>
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

                                @include('admin.employees.delete')
                            </div>
                    @endcan

                    @can('office_employee_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm tx-white"
                               href="{{ route('admin.employees.edit', $employee->id) }}">
                                <i class="fe fe-edit"></i>
                                @lang('global.edit')
                            </a>
                        </div>
                    @endcan

                    @can('office_employee_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple bg-primary btn-sm tx-white"
                               href="{{ route('admin.employees.create') }}">
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
                                <span>{{ $employee->name }} {{ $employee->last_name }}</span>
                            </h4>

                            <!-- Position -->
                            <a href="javascript:void(0);" target="_blank" class="pro-user-desc mb-1">{{ $employee->position }}</a>
                            <!-- Employee Star -->
                            <p class="user-info-rating">
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
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
                            <h6 class="card-title mb-0">
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
                                    <div>{{ $employee->status == 1 ? 'فعال' : 'غیرفعال' }}</div>
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
                <div class="card custom-card main-content-body-profile">

                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2">
                            <!-- Personal Information -->
                            <div class="main-content-label tx-13 mg-b-20 bd-b tx-bold pb-2">
                                @lang('global.details')
                            </div>
                            <!-- Personal Information Table -->
                            @include('admin.employees.inc.tables')
                            <!--/==/ End of Personal Information -->
                        </div>
                        <!--/==/ End of User Information Details -->
                        <div class="p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="font-weight-bold tx-16 m-2">اسناد و مدارک</div>
                                </div>

                                <div class="col-md-6">
                                    <div class="float-left ml-5">
                                        <!-- New -->
                                        <a class="pos-absolute modal-effect btn btn-sm btn-outline-primary font-weight-bold"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#new_file{{ $employee->id }}">
                                            ثبت
                                        </a>

                                        @include('admin.employees.inc.new_file')
                                    </div>
                                </div>
                            </div>

                            <div class="row bd">
                                @foreach($employee->files as $file)
                                    <div class="bd m-1 p-1">
                                        <!-- Delete -->
                                        <a class="pos-absolute modal-effect btn btn-sm btn-danger"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#delete_file{{ $file->id }}">
                                            <i class="fe fe-trash"></i>
                                        </a>

                                        @include('admin.employees.inc.delete_file')

                                        <a href="{{ asset('storage/employees/files/' . $file->path) ?? asset('assets/images/id-card-default.png') }}"
                                           target="_blank">
                                            <img
                                                src="{{ asset('storage/employees/files/' . $file->path) ?? asset('assets/images/id-card-default.png') }}" alt="اسناد" width="150">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
