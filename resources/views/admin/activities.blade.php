@extends('layouts.admin.master')
@section('title', config('app.name') . ' ~ ' . trans('global.activities'))
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.activities')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"
                                                   target="_blank">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.activities')</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <!-- Success Message -->
                    @include('admin.inc.alerts')
                    <nav class="nav main-nav-line mb-4 mt-2 {{ app()->getLocale() == 'en' ? 'ml-4' : 'mr-4' }}">
                        <a class="nav-link active" data-toggle="tab" href="#activities">@lang('global.activities')</a>
                        <a class="nav-link" data-toggle="tab" href="#my_activities">@lang('pages.users.myActivities')</a>
                    </nav>

                    <div class="card-body tab-content">
                        <!-- All Activities -->
                        <div class="tab-pane active" id="activities">
                            @if(count($logActivities) > 1)
                            <div class="mb-2">
                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                   data-effect="effect-sign" data-toggle="modal"
                                   href="#delete_all_activities"
                                   title="@lang('pages.users.deleteAllActivities')">@lang('global.deleteAll') <i
                                        class="fa fa-trash-alt"></i></a>

                                @include('admin.inc.delete_all_activities')
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('global.by')</th>
                                        <th>@lang('global.details')</th>
                                        <th>@lang('form.created_date')</th>
                                        <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($logActivities) >= 1)
                                        @foreach($logActivities as $activity)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <!-- Activity Causer Name -->
                                                <td>
                                                    {{ Auth::user()->where('id', $activity->causer_id)->first()->name }}
                                                </td>
                                                <!-- Activity Description -->
                                                <td>{{ $activity->description }}</td>
                                                <!-- Activity Created Date -->
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
                                                <!-- Activity Delete -->
                                                <td>
                                                    <a class="modal-effect btn btn-sm ripple btn-danger"
                                                       data-effect="effect-sign" data-toggle="modal"
                                                       href="#delete_record{{ $activity->id }}"
                                                       title="@lang('pages.users.deleteActivity')">
                                                        <i class="fe fe-trash"></i>
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
                        </div>
                        <!--/==/ End of All Activities -->

                        <!-- My Activities -->
                        <div class="tab-pane" id="my_activities">
                            @if(count($myActivities) > 1)
                            <div class="mb-2">
                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                   data-effect="effect-sign" data-toggle="modal"
                                   href="#delete_all_admin_activities"
                                   title="@lang('pages.users.deleteAllActivities')">@lang('global.deleteAll') <i
                                        class="fa fa-trash-alt"></i></a>

                                @include('admin.inc.delete_all_admin_activities')
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('global.by')</th>
                                        <th>@lang('global.details')</th>
                                        <th>@lang('form.created_date')</th>
                                        <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($myActivities) >= 1)
                                        @foreach($myActivities as $activity)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>@lang('global.you')</td>
                                                <td>{{ $activity->description }}</td>
                                                <!-- Created Date -->
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
                                                <!-- Action - Delete -->
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
                        </div>
                        <!--/==/ End of My Activities -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>
@endsection
