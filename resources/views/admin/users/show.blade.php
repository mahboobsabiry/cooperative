@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'حساب کاربری - ' . $user->name)
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.users.userProfile')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.users.index') }}">@lang('admin.sidebar.users')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.users.userProfile')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

                @can('user_mgmt')
                    <div class="d-flex">
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $user->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.users.delete')
                        </div>
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.users.edit', encrypt($user->id)) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.users.create') }}">
                                @lang('global.new')
                                <i class="fe fe-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!-- Profile Main Info -->
                <div class="card custom-card">
                    @if(Cache::has('user-is-online-' . $user->id))
                        <span class="p-2 tx-sm-10 text-success">
                            <i class="fa fa-circle bd-1 bd-dashed rounded-circle" data-placement="top"
                               data-toggle="tooltip-success" title="@lang('global.online')"></i>
                        </span>
                    @else
                        <span class="p-2 tx-sm-10 text-dark" title="@lang('global.offline')">
                            <i class="fa fa-circle bd-1 bd-dashed rounded-circle" data-placement="top"
                               data-toggle="tooltip-primary" title="@lang('global.offline')"></i>
                        </span>
                    @endif

                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user">
                                @if($user->employee)
                                    <img alt="avatar" src="{{ $user->employee->image ?? asset('assets/images/avatar-default.jpeg') }}">
                                @else
                                    <img alt="avatar" src="{{ $user->image ?? asset('assets/images/avatar-default.jpeg') }}">
                                @endif
                            </div>
                        </div>

                        <!-- Main Info -->
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $user->name }}</span>
                            </h4>

                            @if($user->employee)
                                <!-- Position -->
                                <p class="pro-user-desc text-muted mb-1">{{ $user->employee->position ?? '' }}</p>
                                <!-- Employee Star -->
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <!--/==/ End of Employee Star -->
                            @else
                                {{ $user->username }}
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
                                @lang('pages.users.contactInfo')
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
                                    <span>@lang('form.status')</span>
                                    <div>
                                        @if($user->status == 1)
                                            <a class="updateUserStatus" id="user-{{ $user->id }}"
                                               user_id="{{ $user->id }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                   status="Active"></i>
                                            </a>
                                        @else
                                            <a class="updateUserStatus" id="user-{{ $user->id }}"
                                               user_id="{{ $user->id }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                   status="Inactive"></i>
                                            </a>
                                        @endif
                                        <span id="update_status-{{ $user->id }}" style="display: none;">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
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
                                        @if($user->phone)
                                            <a href="callto:{{ $user->phone }}" class="ctd">{{ $user->phone }}</a>
                                        @else
                                            --- --- ----
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
                                        <a href="mailto:{{ $user->email }}" class="ctd">{{ $user->email }}</a>
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

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $user->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fa fa-user-tie"></i> حساب کاربری
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($user->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header tx-15 tx-bold">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Personal Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">@lang('pages.employees.personalInfo')</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                                    </div>
                                    <div class="col">ID-{{ $user->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.name'): </strong></p>
                                    </div>
                                    <div class="col">{{ $user->name }}</div>
                                </div>

                                @if(auth()->user()->employee)
                                    <!-- Father Name -->
                                    <div class="row">
                                        <div class="col-5 col-sm-4">
                                            <p class="fw-semi-bold mb-1"><strong>@lang('form.fatherName'): </strong></p>
                                        </div>
                                        <div class="col">{{ $user->employee->father_name }}</div>
                                    </div>
                                @endif

                                @if(auth()->user()->employee)
                                    <!-- Employee Code -->
                                    <div class="row">
                                        <div class="col-5 col-sm-4">
                                            <p class="fw-semi-bold mb-1"><strong>@lang('form.empCode'): </strong></p>
                                        </div>
                                        <div class="col">{{ $user->employee->emp_code }}</div>
                                    </div>
                                @endif

                                <!-- Phone Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.phone'): </strong></p>
                                    </div>
                                    <div class="col"><a href="callto:{{ $user->phone }}">{{ $user->phone }}</a></div>
                                </div>

                                @if(auth()->user()->employee)
                                    <!-- Position -->
                                    <div class="row">
                                        <div class="col-5 col-sm-4">
                                            <p class="fw-semi-bold mb-1"><strong>@lang('form.position'): </strong></p>
                                        </div>
                                        <div class="col">{{ $user->employee->position }}</div>
                                    </div>

                                @endif

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'): </strong>:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $user->info ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Position Information -->

                            <!-- User Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات حساب کاربری</h6>
                                <!-- Created Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.createdDate'):</strong></p>
                                    </div>
                                    <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($user->created_at)) }}</div>
                                </div>

                                <!-- User -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>نمبر حساب کاربری:</strong></p>
                                    </div>
                                    <div class="col">{{ $user->username }}</div>
                                </div>

                                <!-- Roles -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('admin.sidebar.roles'):</strong></p>
                                    </div>
                                    <div class="col">
                                        @if(!empty($user->roles))
                                            @foreach($user->roles as $role)
                                                <a class="modal-effect"
                                                   data-effect="effect-sign" data-toggle="modal"
                                                   href="#role_details{{ $role->id }}">
                                                    <code class="text-danger" style="text-decoration: underline;">{{ $loop->iteration }}</code>
                                                    <code class="text-primary">{{ $role->name }}</code>
                                                </a>

                                                @include('admin.users.role_details')
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- Permissions -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('admin.sidebar.permissions'):</strong></p>
                                    </div>
                                    <div class="col">
                                        <div class="text-wrap">
                                            @foreach($user->permissions as $permission)
                                                <code class="text-danger" style="text-decoration: underline;">{{ $loop->iteration }}</code>
                                                <code class="text-primary">{{ $permission->name }}</code>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
                                    </div>
                                    <div class="col">{{ $user->status == 1 ? trans('global.active') : trans('global.inactive') }}</div>
                                </div>
                            </div>
                            <!--/==/ End of General Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details -->

                <!-- Activities -->
                @can('user_mgmt')
                    <div class="card mb-2">
                        <div class="card-header">
                            <h5 class="card-title tx-bold">@lang('global.activities')</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('global.details')</th>
                                        <th>@lang('form.created_date')</th>
                                        <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count(\Spatie\Activitylog\Models\Activity::where('causer_id', $user->id)->get()) >= 1)
                                        @foreach(\Spatie\Activitylog\Models\Activity::all()->where('causer_id', $user->id) as $activity)
                                            <tr>
                                                <th scope="row">{{ $activity->id }}</th>
                                                <td>{{ $activity->description }}</td>
                                                <td>
                                                    @if(app()->getLocale() == 'en')
                                                        {{ date_format($activity->created_at, 'Y-m-d') }}
                                                    @else
                                                        @php
                                                            $date = \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($activity->created_at)); // 1395-02-19
                                                            echo \Morilog\Jalali\CalendarUtils::convertNumbers($date);
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="modal-effect btn btn-sm ripple btn-danger"
                                                       data-effect="effect-sign" data-toggle="modal"
                                                       href="#delete_record{{ $activity->id }}"
                                                       title="@lang('pages.users.deleteActivity')">
                                                        <i class="fe fe-delete"></i>
                                                    </a>

                                                    @include('admin.inc.delete_activity')
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="bg-black-1 text-center">@lang('global.notFound')</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endcan
                <!--/==/ End of Activities -->
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <!-- Data Table js -->
    <script src="{{ asset('backend/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('assets/js/datatable.js') }}"></script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
