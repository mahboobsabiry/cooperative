@extends('layouts.admin.master')
<!-- Title -->
@section('title', $user->name)
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
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.users.create') }}" target="_blank">
                            @lang('global.new')
                            <i class="fe fe-plus-circle"></i>
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
                                <img alt="avatar" src="{{ $user->image ?? asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $user->name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $user->username }}</p>
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
                        <div class="p-2" style="border: 1px solid #ddd;">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.users.personalInfo')
                            </div>
                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <tr>
                                        <td><strong>@lang('form.name') :</strong>{{ $user->name }}</td>
                                    </tr>

                                    <!-- Roles -->
                                    <tr>
                                        <td><strong>@lang('admin.sidebar.roles'): </strong>
                                            @foreach($user->roles as $role)
                                                <span class="tag tag-primary tag-pill">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <!-- Status -->
                                    <tr>
                                        <td><strong>@lang('form.status'): </strong>
                                            <span class="acInText">
                                                <span id="acInText"
                                                      class="{{ $user->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $user->status == 1 ? trans('global.active') : trans('global.inactive') }}
                                                </span>
                                            </span>
                                            ----
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
                                            </span>
                                        </td>
                                    </tr>

                                    <!-- Left Column -->
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Email Address -->
                                    <tr>
                                        <td>
                                            <strong>@lang('form.email'): </strong>
                                            <a href="mailto:{{ $user->email }}" class="ctd">{{ $user->email }}</a>
                                        </td>
                                    </tr>

                                    <!-- Phone Number -->
                                    <tr>
                                        <td><strong>@lang('form.phone'): </strong>
                                            @if($user->phone)
                                                <a href="callto:{{ $user->phone }}" class="ctd">{{ $user->phone }}</a>
                                            @else
                                                --- --- ----
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Username -->
                                    <tr>
                                        <td><strong>@lang('form.username'): </strong>
                                            {{ $user->username }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <div class="main-content-label tx-13 mg-b-20" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{{ $user->info ?? '--' }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->

                        <br>
                        <br>

                        <!-- Activities -->
                        <div>
                            <h6 class="card-title mb-1">@lang('global.activities')</h6>
                            <p class="text-muted card-sub-title">Add borders on all sides of the table and cells.</p>
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
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $activity->description }}</td>
                                            <td>
                                                @if(app()->getLocale() == 'en')
                                                    {{ date_format($activity->created_at, 'Y-M-d') }}
                                                @else
                                                    @php
                                                        $date = \Morilog\Jalali\CalendarUtils::strftime('Y-M-d', strtotime($activity->created_at)); // 1395-02-19
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
                                        <td></td>
                                        <td></td>
                                        <td>@lang('global.notFound')</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
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
