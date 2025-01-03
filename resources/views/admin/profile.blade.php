@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('admin.myProfile'))
<!-- Extra Styles -->
@section('extra_css')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.profile')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.profile')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

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
                            <i class="fa fa-circle bd-1 bd-dashed rounded-circle" data-placement="top" data-toggle="tooltip-success" title="@lang('global.online')"></i>
                        </span>
                    @else
                        <span class="p-2 tx-sm-10 text-dark" title="@lang('global.offline')">
                            <i class="fa fa-circle bd-1 bd-dashed rounded-circle" data-placement="top" data-toggle="tooltip-dark" title="@lang('global.offline')"></i>
                        </span>
                    @endif

                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user">
                                <img alt="avatar" src="{{ $user->image ?? asset('assets/images/users/no-image.jpeg') }}">
                            </div>
                        </div>
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $user->name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $user->username }}</p>
                            <!-- User Star -->
                            <p class="user-info-rating">
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                @if($user->status == 0)
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                @elseif($user->status == 1)
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                @else
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="far fa-star text-warning"> </i></a>
                                @endif
                            </p>
                            <!--/==/ End of User Star -->
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
                                        @if($user->photo)
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
                                        <td><strong>@lang('admin.sidebar.roles') ({{ count($user->roles) }}): </strong>
                                            @foreach($user->roles as $role)
                                                <code class="text-danger" style="text-decoration: underline;">{{ $loop->iteration }}</code>
                                                <code class="text-primary">{{ $role->name }}</code>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <!-- Permissions -->
                                    <tr>
                                        <td><strong>@lang('admin.sidebar.permissions') ({{ count($user->permissions) }}): </strong>
                                            @foreach($user->permissions as $permission)
                                                <code class="text-danger" style="text-decoration: underline;">{{ $loop->iteration }}</code>
                                                <code class="text-primary">{{ $permission->name }}</code>
                                            @endforeach
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

                            <div class="main-content-label tx-13 mg-b-20 pt-2" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{{ $user->info ?? '--' }}</p>
                        </div>
                        <br>
                        <br>

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
    <script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script>

@endsection
<!--/==/ End of Extra Scripts -->
