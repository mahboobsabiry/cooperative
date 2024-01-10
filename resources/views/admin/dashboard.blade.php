@extends('layouts.admin.master')
@section('title', config('app.name') . ' ~ ' . trans('admin.dashboard.dashboard'))
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">به سیستم کمکی گمرک سرحدی حیرتان خوش آمدید!</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}" target="_blank">@lang('global.home')</a></li>
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

        <!-- Cards -->
        <div class="row row-sm">
            <!-- Users Card -->
            @can('user_mgmt')
            <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card custom-card">
                    <div class="card-body dash1">
                        <div class="d-flex">
                            <p class="mb-1 tx-inverse">@lang('admin.sidebar.users')</p>
                            <div class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                <i class="fas fa-users fs-20 text-primary"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="dash-25">{{ count(\App\Models\User::all()) }}</h3>
                        </div>
                        <div class="progress mb-1">
                            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" class="progress-bar progress-bar-xs wd-100p" role="progressbar"></div>
                        </div>
                        <div class="expansion-label d-flex">
                            <span class="text-muted">@lang('admin.dashboard.lastMonth')</span>
                            <span class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                <i class="fas fa-caret-up mr-1 text-success"></i>100.0%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
            <!--/==/ End of Users Card -->

            <!-- Positions -->
            @can('organization_mgmt')
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">@lang('admin.sidebar.positions')</p>
                                <div class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                    <i class="fe fe-activity fs-20 text-info"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">{{ count(\App\Models\Position::all()) }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-info" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-info"></i>0.43%</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <!--/==/ End of Positions -->

            <!-- Employees -->
            @can('employee_mgmt')
                <div class="col-sm-6 col-xl-3 col-lg-6">
                    <div class="card custom-card">
                        <div class="card-body dash1">
                            <div class="d-flex">
                                <p class="mb-1 tx-inverse">@lang('admin.sidebar.employees')</p>
                                <div class="{{ app()->getLocale() == 'en' ? 'ml-auto' : 'mr-auto' }}">
                                    <i class="fa fa-user-tie fs-20 text-secondary"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="dash-25">{{ count(\App\Models\Employee::all()) }}</h3>
                            </div>
                            <div class="progress mb-1">
                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="70" class="progress-bar progress-bar-xs wd-60p bg-secondary" role="progressbar"></div>
                            </div>
                            <div class="expansion-label d-flex">
                                <span class="text-muted">Last Month</span>
                                <span class="ml-auto"><i class="fas fa-caret-down mr-1 text-danger"></i>0.43%</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <!--/==/ End of Employees -->
        </div>
        <!--End  Row -->

        <!-- Row -->
        @can('site_admin')
        <div class="row row-sm">
            <!-- Activity -->
            <div class="col-sm-12 col-xl-6 col-lg-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">
                                <div class="row">
                                    <div class="col-md-6">@lang('global.activity')</div>
                                    <div class="col-md-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                        <a href="{{ route('admin.activities') }}" class="ctd">
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
            <div class="col-sm-12 col-xl-6 col-lg-6">
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
                                                <img alt="avatar" src="{{ $user->image ? $user->image : asset('assets/images/avatar-default.jpeg') }}">
                                            </div>
                                        </td>
                                        <td class="bd-t-0">
                                            <h6 class="mg-b-0">
                                                <a href="{{ route('admin.users.show', $user->id) }}" class="ctd" target="_blank">{{ $user->name }}</a>
                                            </h6>
                                            <small class="tx-11 tx-gray-500">{{ $user->roles->first()->name }}</small>
                                        </td>
                                        <td class="bd-t-0">
                                            <h6 class="mg-b-0 font-weight-bold">
                                                @if(count($user->activities()) > 0)
                                                    {{ (count($user->activities()) / count(\Spatie\Activitylog\Models\Activity::all())) * 100 }}%
                                                @else
                                                    0%
                                                @endif
                                            </h6>
                                            <small class="tx-11 tx-gray-500">Activity Rate</small>
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
