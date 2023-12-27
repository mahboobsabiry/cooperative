@extends('layouts.admin.master')
<!-- Title -->
@section('title', $position->title)
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
                <h2 class="main-content-title tx-24 mg-b-5">{{ $position->title }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.positions.index') }}">@lang('pages.positions.positions')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{ $position->title }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-primary btn-sm text-white"
                           href="{{ route('admin.positions.edit', $position->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $position->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.positions.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Back -->
                        <a class="btn ripple bg-gray-500 btn-sm" href="{{ route('admin.positions.index') }}">
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
                                <img alt="avatar" src="{{ $position->employees->where('is_responsible', 1)->first()->image ?? '' }}">
                            </div>
                        </div>

                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $position->employees->where('is_responsible', 1)->first()->name ?? trans('global.empty') }} {{ $position->employees->where('is_responsible', 1)->first()->last_name ?? '' }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $position->title }}</p>
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
                                        <a href="callto:{{ $position->employees->where('is_responsible', 1)->first()->phone ?? '' }}"
                                           class="ctd">{{ $position->employees->where('is_responsible', 1)->first()->phone ?? '--- ---- ---' }}</a>
                                        <a href="callto:{{ $position->employees->where('is_responsible', 1)->first()->phone2 ?? '' }}"
                                           class="ctd">{{ $position->employees->where('is_responsible', 1)->first()->phone2 ?? '' }}</a>
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
                                        <a href="mailto:{{ $position->employees->where('is_responsible', 1)->first()->email ?? '' }}"
                                           class="ctd">{{ $position->employees->where('is_responsible', 1)->first()->email ?? '----@---.--' }}</a>
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
                        <div class="p-2 bd">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.employees.generalInfo')
                            </div>

                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Title -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.title'):</th>
                                        <td>{{ $position->title }}</td>
                                    </tr>

                                    <!-- Manager -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.manager'):</th>
                                        <td>
                                            {{ $position->employees->where('is_responsible', 1)->first()->name ?? trans('global.empty') }}
                                            {{ $position->employees->where('is_responsible', 1)->first()->last_name ?? trans('global.empty') }}
                                        </td>
                                    </tr>

                                    <!-- Under Hand -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.underHand'):</th>
                                        <td>{{ $position->parent->title ?? trans('pages.positions.afCustomsDep') }}</td>
                                    </tr>

                                    <!-- Status -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.status'):</th>
                                        <td>
                                            <span class="acInText">
                                                <span id="acInText"
                                                      class="{{ $position->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $position->status == 1 ? trans('global.active') : trans('global.inactive') }}
                                                </span>
                                            </span>
                                            ----
                                            @if($position->status == 1)
                                                <a class="updatePositionStatus" id="position-{{ $position->id }}"
                                                   position_id="{{ $position->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                       status="Active"></i>
                                                </a>
                                            @else
                                                <a class="updatePositionStatus" id="user-{{ $position->id }}"
                                                   position_id="{{ $position->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                       status="Inactive"></i>
                                                </a>
                                            @endif
                                            <span id="update_status-{{ $position->id }}" style="display: none;">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </span>
                                        </td>
                                    </tr>

                                    </tbody>

                                    <!-- Left Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Position Number -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.positionNumber'):</th>
                                        <td>{{ $position->position_number }}</td>
                                    </tr>

                                    <!-- Code -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.code'):</th>
                                        <td>{{ $position->code }}</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <div class="main-content-label tx-13 mg-b-20" style="border-top: 1px solid #ddd;">
                                @lang('global.about')
                            </div>
                            <p>{{ $position->desc ?? '--' }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Row Content -->

        <!-- Employees -->
        <div class="card custom-card main-content-body-profile">
            <!-- Table Title -->
            <div class="nav main-nav-line mb-2">
                <a class="nav-link active" data-toggle="tab" href="#mpEmployees">
                    @lang('pages.employees.mpEmps')
                </a>
                <a class="nav-link" data-toggle="tab" href="#onDutyEmployees">
                    @lang('pages.employees.onDutyEmps')
                </a>
            </div>

            <div class="card-body tab-content h-100">
                <!-- Main Position Employees -->
                <div class="tab-pane active" id="mpEmployees">
                    <div class="main-content-label tx-13 mg-b-20">
                        @lang('pages.employees.mpEmps')
                    </div>

                    <!-- Table -->
                    <div class="table-responsive mt-2">
                        <table id=""
                               class="table table-bordered border-top key-buttons display text-nowrap w-100">
                            <thead>
                            <tr>
                                <th rowspan="2" class="text-center tblBorder">#</th>
                                <th colspan="4" class="text-center tblBorder">@lang('global.personalInfo')</th>
                                <th colspan="4" class="text-center tblBorder">@lang('pages.employees.generalInfo')</th>
                                <th rowspan="2" class="text-center tblBorder">@lang('global.action')</th>
                            </tr>
                            <tr>
                                <th class="text-center">@lang('form.photo')</th>
                                <th class="text-center">@lang('form.name')</th>
                                <th class="text-center">@lang('form.phone')</th>
                                <th class="text-center">@lang('form.email')</th>
                                <th class="text-center">@lang('form.empNumber')</th>
                                <th class="text-center">@lang('form.position')</th>
                                <th class="text-center">@lang('pages.positions.positionNumber')</th>
                                <th class="text-center">@lang('pages.employees.positionNature')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($posEmployees as $employee)
                                <tr>
                                    <td>
                                        @if(app()->getLocale() == 'en')
                                            {{ $loop->iteration }}
                                        @else
                                            <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ $employee->image }}" class="card-img img-fluid w-50 rounded-50">
                                    </td>
                                    <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                                    <!-- Email Address -->
                                    <td class="tx-sm-12-f">
                                        <a href="callto:{{ $employee->phone }}" class="ctd">{{ $employee->phone }}</a>
                                    </td>
                                    <!-- Email Address -->
                                    <td><a href="mailto:{{ $employee->email }}" class="tx-sm-12-f ctd">{{ $employee->email }}</a></td>
                                    <!-- Employee Number -->
                                    <td>{{ $employee->emp_number }}</td>
                                    <!-- Office -->
                                    <td>
                                        <a href="{{ route('admin.positions.show', $employee->position->id) }}" class="ctd">{{ $employee->position->title }}</a>
                                    </td>
                                    <!-- Position -->
                                    <td>{{ $employee->position->position_number }}</td>
                                    <!-- Position Nature -->
                                    <td>{{ $employee->on_duty == 1 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}</td>

                                    <!-- Action -->
                                    <td>
                                        <!-- Show -->
                                        <a class="btn btn-sm ripple btn-secondary" href="{{ route('admin.employees.show', $employee->id) }}"
                                           title="@lang('pages.users.userProfile')">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a class="btn btn-sm ripple btn-info" href="{{ route('admin.employees.edit', $employee->id) }}"
                                           title="@lang('pages.users.editUser')">
                                            <i class="fe fe-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <a class="modal-effect btn btn-sm ripple btn-danger"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#delete_record{{ $employee->id }}"
                                           title="@lang('pages.users.deleteUser')">
                                            <i class="fe fe-delete"></i>
                                        </a>

                                        @include('admin.employees.delete')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--/==/ End of Table -->
                </div>
                <!--/==/ End of Main Position Employees -->


                <!-- On Duty Employees -->
                <div class="tab-pane" id="onDutyEmployees">
                    <div class="main-content-label tx-13 mg-b-20">
                        @lang('pages.employees.onDutyEmps')
                    </div>

                    <!-- Table -->
                    <div class="table-responsive mt-2">
                        <table id=""
                               class="table table-bordered border-top key-buttons display text-nowrap w-100">
                            <thead>
                            <tr>
                                <th rowspan="2" class="text-center tblBorder">#</th>
                                <th colspan="4" class="text-center tblBorder">@lang('global.personalInfo')</th>
                                <th colspan="4" class="text-center tblBorder">@lang('pages.employees.generalInfo')</th>
                                <th rowspan="2" class="text-center tblBorder">@lang('global.action')</th>
                            </tr>
                            <tr>
                                <th class="text-center">@lang('form.photo')</th>
                                <th class="text-center">@lang('form.name')</th>
                                <th class="text-center">@lang('form.phone')</th>
                                <th class="text-center">@lang('form.email')</th>
                                <th class="text-center">@lang('form.empNumber')</th>
                                <th class="text-center">@lang('form.position')</th>
                                <th class="text-center">@lang('pages.positions.positionNumber')</th>
                                <th class="text-center">@lang('pages.employees.positionNature')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($onDutyPosEmp as $employee)
                                <tr>
                                    <td>
                                        @if(app()->getLocale() == 'en')
                                            {{ $loop->iteration }}
                                        @else
                                            <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ $employee->image }}" class="card-img img-fluid w-50 rounded-50">
                                    </td>
                                    <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                                    <!-- Email Address -->
                                    <td class="tx-sm-12-f">
                                        <a href="callto:{{ $employee->phone }}" class="ctd">{{ $employee->phone }}</a>
                                    </td>
                                    <!-- Email Address -->
                                    <td><a href="mailto:{{ $employee->email }}" class="tx-sm-12-f ctd">{{ $employee->email }}</a></td>
                                    <!-- Employee Number -->
                                    <td>{{ $employee->emp_number }}</td>
                                    <!-- Office -->
                                    <td>
                                        <a href="{{ route('admin.positions.show', $employee->position->id) }}" class="ctd">{{ $employee->position->title }}</a>
                                    </td>
                                    <!-- Position -->
                                    <td>{{ $employee->position->position_number }}</td>
                                    <!-- Position Nature -->
                                    <td>{{ $employee->on_duty == 1 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}</td>

                                    <!-- Action -->
                                    <td>
                                        <!-- Show -->
                                        <a class="btn btn-sm ripple btn-secondary" href="{{ route('admin.employees.show', $employee->id) }}"
                                           title="@lang('pages.users.userProfile')">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a class="btn btn-sm ripple btn-info" href="{{ route('admin.employees.edit', $employee->id) }}"
                                           title="@lang('pages.users.editUser')">
                                            <i class="fe fe-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <a class="modal-effect btn btn-sm ripple btn-danger"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#delete_record{{ $employee->id }}"
                                           title="@lang('pages.users.deleteUser')">
                                            <i class="fe fe-delete"></i>
                                        </a>

                                        @include('admin.employees.delete')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--/==/ End of Table -->
                </div>
                <!--/==/ End of On Duty Employees -->
            </div>
        </div>
        <!--/==/ End of Employees -->

        <!-- Organization -->
        <div class="card custom-card">
            <div class="card-body">
                <div class="p-2 bd">
                    <div class="main-content-label tx-13 mg-b-20">
                        @if(app()->getLocale() == 'en')
                            {{ $position->title }} @lang('pages.positions.organization')
                        @else
                            @lang('pages.positions.organization') {{ $position->title }}
                        @endif
                    </div>

                    <div class="container">
                        <div class="row">
                            @include('admin.inc.org_tree')
                        </div>
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
