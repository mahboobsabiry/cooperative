@extends('layouts.admin.master')
@section('title', config('app.name') . ' ~ ' . trans('admin.dashboard.dashboard'))
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">Welcome to <span class="font-weight-bold text-success" style="font-family: 'Times New Roman'; text-decoration: underline;">BEAM</span>!</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" target="_blank">@lang('global.home')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.dashboard.dashboard')</li>
                </ol>
            </div>

            <div class="d-flex">
                <div class="mr-2">

                </div>
                <div class="">

                </div>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Date -->
        <div class="card custom-card">
            <div class="card-body bg-primary-transparent" style="border: 1px solid #0f0373;">
                <span class="font-weight-bold">@lang('pages.dashboard.todaysDate'):</span> {{ date_format(now(), 'Y-M-d') }} <span class="font-weight-bold">@lang('pages.dashboard.coincidingWith'):</span> {{ \Morilog\Jalali\CalendarUtils::strftime('Y-F-d', strtotime(now())) }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-weight-bold">@lang('global.day'):</span> {{ \Morilog\Jalali\CalendarUtils::strftime('%A', strtotime(now())) }}
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="font-weight-bold">@lang('global.hour'):</span> {{ \Morilog\Jalali\CalendarUtils::strftime('h:i A', strtotime(now())) }}
            </div>
        </div>
        <!--/==/ End of Date -->

        <!-- First Cards Row -->
        <div class="row row-sm">
            <!-- Users Card -->
            @can('user_view')
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse font-weight-bold">@lang('admin.sidebar.users')</p>
                                <div class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                    <i class="fas fa-users fs-20 text-dark"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">{{ count(\App\Models\User::all()) }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100"
                                     class="progress-bar bg-dark progress-bar-xs wd-100p" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="font-weight-bold">@lang('pages.users.activeUsers')&nbsp;&nbsp;</span>
                                <span class="{{ app()->getLocale() == 'en' ? 'mr-auto' : 'ml-auto' }}">
                                <i class="fas fa-caret-{{ \App\Models\User::all()->where('status', 1)->count() > \App\Models\User::all()->where('status', 0)->count() ? 'up' : 'down' }} mr-1 text-dark"></i>{{ \App\Models\User::all()->where('status', 1)->count() }}
                            </span>
                                <span class="font-weight-bold">@lang('pages.users.inactiveUsers')&nbsp;&nbsp;</span>
                                <span class="{{ app()->getLocale() == 'en' ? 'mr-auto' : 'ml-auto' }}">
                                <i class="fas fa-caret-{{ \App\Models\User::all()->where('status', 0)->count() > \App\Models\User::all()->where('status', 1)->count() ? 'up' : 'down' }} mr-1 text-dark"></i>{{ \App\Models\User::all()->where('status', 0)->count() }}
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <!--/==/ End of Users Card -->

            <!-- Employees -->
            @can('office_employee_view')
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse font-weight-bold">@lang('admin.sidebar.employees')</p>
                                <div class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                    <i class="fa fa-user-tie fs-20 text-dark"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">{{ count(\App\Models\Office\Employee::all()) }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100"
                                     class="progress-bar progress-bar-xs wd-100p bg-dark" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="font-weight-bold">@lang('pages.office.activeEmployees')&nbsp;&nbsp;</span>
                                <span class="{{ app()->getLocale() == 'en' ? 'mr-auto' : 'ml-auto' }}">
                                    <i class="fas fa-caret-{{ \App\Models\Office\Employee::all()->where('status', 1)->count() > \App\Models\Office\Employee::all()->where('status', 0)->count() ? 'up' : 'down' }} text-dark"></i>
                                    {{ \App\Models\Office\Employee::all()->where('status', 1)->count() }}
                                </span>
                                <span class="font-weight-bold">@lang('pages.office.inactiveEmployees')&nbsp;&nbsp;</span>
                                <span class="{{ app()->getLocale() == 'en' ? 'mr-auto' : 'ml-auto' }}">
                                    <i class="fas fa-caret-{{ \App\Models\Office\Employee::all()->where('status', 0)->count() > \App\Models\Office\Employee::all()->where('status', 1)->count() ? 'up' : 'down' }} text-dark"></i>
                                    {{ \App\Models\Office\Employee::all()->where('status', 0)->count() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <!--/==/ End of Employees -->
        </div>
        <!--/==/ End of First Cards Row -->

        <!-- Row -->
        @can('site_admin')
            <div class="row row-sm">
                <!-- Activity -->
                <div class="col-sm-12 col-xl-4 col-lg-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <h6 class="card-title mb-1">
                                    <div class="row">
                                        <div class="col-md-6">@lang('global.activity')</div>
                                        <div class="col-md-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                            <a href="{{ route('admin.activities') }}">
                                                @lang('global.activities')
                                            </a>
                                        </div>
                                    </div>
                                </h6>
                                <p class="text-muted mb-0 card-sub-title">@lang('admin.dashboard.usersAcDetails')</p>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="activity-block">
                                <ul class="task-list">
                                    @foreach($logActivities as $activity)
                                        <li>
                                            <i class="task-icon @if($activity->log_name == 'added') bg-info @elseif($activity->log_name == 'updated') bg-primary  @elseif($activity->log_name == 'deleted') bg-danger @else bg-success @endif"></i>
                                            <h6>{{ $activity->description }}
                                                <small class="{{ app()->getLocale() == 'en' ? 'float-right' : 'float-left' }} text-muted tx-11">
                                                    @if(app()->getLocale() == 'en')
                                                        {{ date_format($activity->created_at, 'Y-M-d') }}
                                                    @else
                                                        <span class="text-muted tx-sm-12">
                                                    @php
                                                        $date = \Morilog\Jalali\CalendarUtils::strftime('Y-M-d', strtotime($activity->created_at)); // 1395-02-19
                                                        echo \Morilog\Jalali\CalendarUtils::convertNumbers($date);
                                                    @endphp
                                                    </span>
                                                    @endif
                                                </small>
                                            </h6>
                                            <span class="text-muted tx-12">@lang('global.by'):
                                            @php
                                                $user = \App\Models\User::where('id', $activity->causer_id)->first();
                                                echo $user->name;
                                            @endphp
                                        </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Activity -->

                <!-- Top Users Based on their activities -->
                <div class="col-sm-12 col-xl-4 col-lg-4">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div>
                                <h6 class="card-title mb-1">@lang('admin.dashboard.activeUsers')</h6>
                                <p class="text-muted mb-0 card-sub-title">@lang('admin.dashboard.usersWithMostAc')</p>
                            </div>
                        </div>
                        <div class="user-manager scroll-widget border-top">
                            <div class="table-responsive">
                                <table class="table mg-b-0">
                                    <tbody>
                                    @foreach($top_users as $user)
                                        <tr>
                                            <td class="bd-t-0">
                                                <div class="main-img-user">
                                                    <img alt="avatar"
                                                         src="{{ $user->image ? $user->image : asset('assets/images/avatar-default.jpeg') }}">
                                                </div>
                                            </td>

                                            <td class="bd-t-0">
                                                <h6 class="mg-b-0">
                                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                                       target="_blank">{{ $user->name }}</a>
                                                </h6>
                                                <small class="tx-11 tx-gray-500">{{ $user->roles->first()->name ?? '' }}</small>
                                            </td>
                                            <td class="bd-t-0">
                                                <h6 class="mg-b-0 font-weight-bold">
                                                    @if(count($user->activities()) > 0)
                                                        {{ round((count($user->activities()) / count(\Spatie\Activitylog\Models\Activity::all())) * 100) }}
                                                        %
                                                    @else
                                                        0%
                                                    @endif
                                                </h6>
                                                <small class="tx-11 tx-gray-500">@lang('pages.dashboard.activityRate')</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Top Users Based on their activities -->
            </div>
        @endcan
        <!-- End Row -->
    </div>
@endsection
