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

                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm tx-white"
                           href="{{ route('admin.employees.edit', $employee->id) }}">
                            <i class="fe fe-edit"></i>
                            @lang('global.edit')
                        </a>
                    </div>

                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple bg-primary btn-sm tx-white"
                           href="{{ route('admin.employees.create') }}" target="_blank">
                            <i class="fe fe-plus-circle"></i>
                            @lang('global.add')
                        </a>
                    </div>
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
                                <img alt="avatar" src="{{ $employee->image ? $employee->image : asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>

                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $employee->name }} {{ $employee->last_name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $employee->position->title }}</p>
                            <!-- Employee Star -->
                            <p class="user-info-rating">
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                @if($employee->status == 0)
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                @elseif($employee->status == 1)
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                @else
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                @endif
                            </p>
                            <!--/==/ End of Employee Star -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div>
                            <h6 class="card-title mb-0">
                                @lang('pages.users.contactInfo')
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
                                <span class="badge badge-primary badge-pill">1</span>
                                @lang('pages.employees.personalInfo')
                            </div>
                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Name -->
                                    <tr>
                                        <th><strong>@lang('form.name') :</strong></th>
                                        <td>{{ $employee->name }}</td>
                                    </tr>

                                    <!-- Last Name -->
                                    <tr>
                                        <th><strong>@lang('form.lastName') :</strong></th>
                                        <td>{{ $employee->last_name }}</td>
                                    </tr>

                                    <!-- Gender -->
                                    <tr>
                                        <th><strong>@lang('form.gender') :</strong></th>
                                        <td>{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</td>
                                    </tr>

                                    <!-- Left Column -->
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Father Name -->
                                    <tr>
                                        <th><strong>@lang('form.fatherName') :</strong></th>
                                        <td>{{ $employee->father_name }}</td>
                                    </tr>

                                    <!-- Birth Year -->
                                    <tr>
                                        <th><strong>@lang('form.birthYear') :</strong></th>
                                        <td>{{ $employee->birth_year }} ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }} ساله)</td>
                                    </tr>

                                    <!-- Employee Number -->
                                    <tr>
                                        <th><strong>@lang('form.empNumber') :</strong></th>
                                        <td>{{ $employee->emp_number }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->

                            <!-- General Information -->
                            <div class="main-content-label tx-13 mg-b-20 bd-b tx-bold pb-2">
                                <span class="badge badge-primary badge-pill">2</span>
                                @lang('pages.employees.generalInfo')
                            </div>
                            <div class="table-responsive">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Appointment Number -->
                                    <tr>
                                        <th><strong>@lang('form.appointmentNumber'): </strong></th>
                                        <td>{{ $employee->appointment_number }}</td>
                                    </tr>

                                    <!-- Appointment Date -->
                                    <tr>
                                        <th><strong>@lang('form.appointmentDate'): </strong></th>
                                        <td>{{ $employee->appointment_date }}</td>
                                    </tr>

                                    <!-- Email Address -->
                                    <tr>
                                        <th><strong>@lang('form.email'): </strong></th>
                                        <td>
                                            <a href="mailto:{{ $employee->email }}"
                                               class="ctd">{{ $employee->email }}</a>
                                        </td>
                                    </tr>

                                    <!-- Education -->
                                    <tr>
                                        <th><strong>@lang('form.education'): </strong></th>
                                        <td>{{ $employee->education }}</td>
                                    </tr>

                                    <!-- PRR/NPR -->
                                    <tr>
                                        <th><strong>PRR/NPR: </strong></th>
                                        <td>{{ $employee->prr_npr }}</td>
                                    </tr>

                                    <!-- NPR Date -->
                                    <tr>
                                        <th><strong>NPR/Date: </strong></th>
                                        <td>{{ $employee->npr_date }}</td>
                                    </tr>

                                    <!-- Introducer -->
                                    <tr>
                                        <th><strong>@lang('form.introducer'): </strong></th>
                                        <td>{{ $employee->introducer }}</td>
                                    </tr>
                                    </tbody>

                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Status -->
                                    <tr>
                                        <th><strong>@lang('form.status'): </strong></th>
                                        <td>
                                            <span class="acInText">
                                                <span id="acInText"
                                                      class="{{ $employee->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $employee->status == 1 ? trans('global.active') : trans('global.inactive') }}
                                                </span>
                                            </span>
                                            ----
                                            @if($employee->status == 1)
                                                <a class="updateEmployeeStatus" id="employee_status"
                                                   employee_id="{{ $employee->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                       status="Active"></i>
                                                </a>
                                            @else
                                                <a class="updateEmployeeStatus" id="employee_status"
                                                   employee_id="{{ $employee->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                       status="Inactive"></i>
                                                </a>
                                            @endif
                                            <span id="update_status" style="display: none;">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </span>
                                        </td>
                                    </tr>

                                    <!-- Phone Number -->
                                    <tr>
                                        <th><strong>@lang('form.phone'): </strong></th>
                                        <td>
                                            <a href="callto:{{ $employee->phone }}"
                                               class="ctd">{{ $employee->phone }}</a>
                                            @if($employee->phone2)
                                                , <a href="callto:{{ $employee->phone2 }}"
                                                     class="ctd">{{ $employee->phone2 }}</a>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Position -->
                                    <tr>
                                        <th><strong>@lang('form.position'): </strong>
                                        </th>
                                        <td>
                                            {{ $employee->position->position_number }} -
                                            <a href="{{ route('admin.positions.show', $employee->position->id) }}">
                                                {{ $employee->position->title }}
                                            </a>
                                            (<span class="text-danger">{{ $employee->on_duty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') . ' - ' }} {{ $employee->on_duty == 1 ? $employee->duty_position : '' }}</span>)
                                            [{{ $employee->position->code }}]
                                        </td>
                                    </tr>

                                    <!-- Last Duty -->
                                    <tr>
                                        <th><strong>@lang('form.lastDuty'): </strong></th>
                                        <td>{{ $employee->last_duty }}</td>
                                    </tr>

                                    <!-- Main Province -->
                                    <tr>
                                        <th><strong>@lang('form.mainAddress'): </strong></th>
                                        <td>{{ $employee->main_province }}, {{ $employee->main_district }}</td>
                                    </tr>

                                    <!-- Current Address -->
                                    <tr>
                                        <th><strong>@lang('form.curAddress'): </strong></th>
                                        <td>{{ $employee->current_province }}, {{ $employee->current_district }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <div class="main-content-label tx-13 mg-b-20 bd-b tx-bold pb-2">
                                <span class="badge badge-primary badge-pill">3</span>
                                @lang('pages.employees.otherInfo')
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <p>- {{ $employee->info ?? '--' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <strong>@lang('form.idCard'):</strong> <br>
                                        <img src="{{ $employee->taz ? $employee->taz : asset('assets/images/id-card-default.png') }}" class="img-thumbnail"
                                             alt="@lang('form.idCard')">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/==/ End of User Information Details -->
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

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
