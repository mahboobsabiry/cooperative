@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'حساب کاربری - ' . $user->name)
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
                               href="{{ route('admin.users.edit', $user->id) }}">
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
            <div class="col-lg-4 col-md-12">
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
                                @can('office_position_view')
                                    <a href="{{ route('admin.office.positions.show', $user->employee->position->id) }}" target="_blank" class="pro-user-desc mb-1">{{ $user->employee->position->title ?? '' }}</a>
                                @else
                                    <p class="pro-user-desc text-muted mb-1">{{ $user->employee->position->title ?? '' }}</p>
                                @endcan
                                @if($user->employee->on_duty == 1)
                                    <p class="pro-user-desc text-muted mb-1">{{ $user->employee->duty_position ?? '' }}</p>
                                @endif

                                @if($user->employee->position->position_number == 2 || $user->employee->position->position_number == 3)
                                @else
                                    <p class="pro-user-desc text-primary mb-1">({{ $user->employee->position->type ?? '' }})</p>
                                @endif
                                <!-- Employee Star -->
                                @if($user->employee->position)
                                    <p class="user-info-rating">
                                        @for($i=1; $i<=$user->employee->position->position_number; $i++)
                                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                        @endfor
                                    </p>
                                @endif
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
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <!-- First Table -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="4" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </td>
                                    </tr>

                                    <!-- First Row -->
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>@lang('form.name')</strong></th>
                                        <th><strong>نام پدر</strong></th>
                                        <th><strong>نام کاربری</strong></th>
                                    </tr>
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->employee->father_name ?? '' }}</td>
                                        <td>{{ $user->username }}</td>
                                    </tr>

                                    <!-- Second Row -->
                                    <tr>
                                        <th><strong>@lang('form.phone')</strong></th>
                                        <th><strong>@lang('form.email')</strong></th>
                                        <th><strong>کد گمرک</strong></th>
                                        <th><strong>موقعیت</strong></th>
                                    </tr>
                                    <tr>
                                        <td>{{ $user->phone ?? '' }}</td>
                                        <td>{{ $user->email ?? '' }}</td>
                                        <td>{{ $user->employee->position->custom_code ?? 'AF151' }}</td>
                                        <td>{{ $user->employee->position->type ?? 'ریاست' }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of First Table -->

                                    <!-- Second Table -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="4" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">2</span>
                                            معلومات یوزر
                                        </td>
                                    </tr>

                                    <!-- First Row -->
                                    <tr>
                                        <th colspan="3"><strong>مجوز ها</strong></th>
                                        <th colspan="1"><strong>صلاحیت ها</strong></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-wrap">
                                            @foreach($user->permissions as $permission)
                                                <a class="modal-effect" href="javascript:void(0);">
                                                    <span class="tag tag-success tag-pill mt-1 mb-1 pr-0" style="cursor:pointer;">
                                                        <span class="tag tag-dark tag-pill ml-1 mr-0">{{ $loop->iteration }}</span>
                                                        {{ $permission->name }}
                                                    </span>
                                                </a>
                                            @endforeach
                                        </td>
                                        <td colspan="1" class="text-wrap">
                                            @if(!empty($user->roles))
                                                @foreach($user->roles as $role)
                                                    <a class="modal-effect"
                                                       data-effect="effect-sign" data-toggle="modal"
                                                       href="#role_details{{ $role->id }}">
                                                        <span class="tag tag-success tag-pill mt-1 mb-1 pr-0" style="cursor:pointer;">
                                                            <span class="tag tag-dark tag-pill ml-1 mr-0">{{ $loop->iteration }}</span>
                                                            {{ $role->name }}
                                                        </span>
                                                    </a>

                                                    @include('admin.users.role_details')
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Second Table -->
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->
                            <p>{{ $user->info }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->

                        @if($user->employee)
                            <h4>سابقه کاری کارمند</h4>
                            <br>

                            <!-- Experiences Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">@lang('form.name')</th>
                                        <th class="text-center">بست</th>
                                        <th class="text-center">نوع بست</th>
                                        <th class="text-center">فعالیت یوزر سیستم</th>
                                        <th class="text-center">تاریخ شروع</th>
                                        <th class="text-center">تاریخ ختم</th>
                                        <th class="text-center">نمبر مکتوب</th>
                                        <th class="text-center">مکتوب</th>
                                        <th class="text-center">@lang('global.extraInfo')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user->employee->experiences as $exp)
                                        <tr>
                                            <td>{{ $exp->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.office.employees.show', $exp->employee->id) }}">{{ $exp->employee->name }}</a>
                                            </td>
                                            <td>{{ $exp->position }}</td>
                                            <td>{{ $exp->position_type == 1 ? 'خدمتی' : 'اصل بست' }}</td>
                                            <!-- Asycuda User -->
                                            <td>
                                                @if($exp->employee->user)
                                                    {{ $exp->employee->user->status == 1 ? 'فعال' : 'غیرفعال' }}
                                                @else
                                                    یوزر ندارد
                                                @endif
                                            </td>
                                            <td>{{ $exp->start_date }}</td>
                                            <td>{{ $exp->end_date ?? 'در حال انجام وظیفه' }}</td>
                                            <td>{{ $exp->doc_number }}</td>
                                            <td>
                                                <a href="{{ asset('storage/employees/documents/' . $exp->document) }}" target="_blank">
                                                    <img src="{{ asset('storage/employees/documents/' . $exp->document) }}" alt="{{ $exp->employee->name }}" width="80">
                                                </a>
                                            </td>
                                            <td>{{ $exp->info }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Experiences Table -->
                        @endif

                        <br>
                        <br>

                        <!-- Activities -->
                        @can('user_mgmt')
                            <div>
                                <h6 class="card-title mb-1">@lang('global.activities')</h6>
                            </div>
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
                        @endcan
                        <!--/==/ End of Activities -->
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
