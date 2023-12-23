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
                        <a class="btn ripple btn-outline-info btn-sm dropdown-toggle mb-0" href="#"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fe fe-external-link"></i> @lang('global.export') <i
                                class="fas fa-caret-down ml-1"></i>
                        </a>
                        <div class="dropdown-menu tx-13">
                            <a class="dropdown-item" href="#"><i class="far fa-file-pdf mr-2"></i> Pdf</a>
                            <a class="dropdown-item" href="#"><i class="far fa-image mr-2"></i> Image</a>
                            <a class="dropdown-item" href="#"><i class="far fa-file-word mr-2"></i> Word</a>
                        </div>
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-primary btn-sm tx-white"
                           href="{{ route('admin.employees.edit', $employee->id) }}">
                            @lang('global.edit')
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Back -->
                        <a class="btn ripple bg-gray-500 btn-sm tx-white" href="{{ route('admin.employees.index') }}">
                            @lang('global.back')
                            <i class="fa fa-arrow-{{ app()->getLocale() == 'en' ? 'right' : 'left' }}"></i>
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
                                <img alt="avatar" src="{{ $employee->image }}">
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

                                    <!-- P2 Number -->
                                    <tr>
                                        <th><strong>@lang('form.p2number') :</strong></th>
                                        <td>{{ $employee->p2number }}</td>
                                    </tr>

                                    <!-- Left Column -->
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Father Name -->
                                    <tr>
                                        <th><strong>@lang('form.fatherName') :</strong></th>
                                        <td>{{ $employee->father_name }}</td>
                                    </tr>

                                    <!-- Grand Father Name -->
                                    <tr>
                                        <th><strong>@lang('form.grandFatherName') :</strong></th>
                                        <td>{{ $employee->grand_f_name }}</td>
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
                                    <!-- Date of Birth -->
                                    <tr>
                                        <th><strong>@lang('form.dob'): </strong></th>
                                        <td>{{ $employee->dob }}</td>
                                    </tr>

                                    <!-- Email Address -->
                                    <tr>
                                        <th><strong>@lang('form.email'): </strong></th>
                                        <td>
                                            <a href="mailto:{{ $employee->email }}"
                                               class="ctd">{{ $employee->email }}</a>
                                        </td>
                                    </tr>

                                    <!-- Province -->
                                    <tr>
                                        <th><strong>@lang('form.province'): </strong></th>
                                        <td>{{ $employee->province }}</td>
                                    </tr>
                                    </tbody>

                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Status -->
                                    @if($admin)
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
                                                    <a class="updateEmployeeStatus" id="employee-{{ $employee->id }}"
                                                       employee_id="{{ $employee->id }}" href="javascript:void(0)">
                                                        <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                           status="Active"></i>
                                                    </a>
                                                @else
                                                    <a class="updateEmployeeStatus" id="employee-{{ $employee->id }}"
                                                       employee_id="{{ $employee->id }}" href="javascript:void(0)">
                                                        <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                           status="Inactive"></i>
                                                    </a>
                                                @endif
                                                <span id="update_status-{{ $employee->id }}" style="display: none;">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </span>
                                            </td>
                                        </tr>
                                    @endif

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
                                        <th><strong>
                                                <a href="{{ route('admin.positions.show', $employee->position->id) }}"
                                                   class="ctd">
                                                    @lang('form.position')
                                                </a>: </strong>
                                        </th>
                                        <td>{{ $employee->position->title }}
                                            (<span
                                                class="small text-success">{{ $employee->onDuty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}</span>)
                                        </td>
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
                                        @lang('form.idCard'):
                                        <img src="{{ $employee->taz }}" class="img-thumbnail"
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

        <!-- Organization -->
        <div class="card custom-card">
            <div class="card-body">
                <div class="p-2 bd">
                    <div class="main-content-label tx-13 mg-b-20">
                        @if(app()->getLocale() == 'en')
                            {{ $employee->name }} {{ $employee->last_name }}
                            (<span class="small text-secondary">{{ $employee->position->title }}</span>)
                            @lang('pages.positions.organization')
                        @else
                            @lang('pages.positions.organization')
                            {{ $employee->name }} {{ $employee->last_name }}
                            (<span class="small text-secondary">{{ $employee->position->title }}</span>)
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Organization -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
