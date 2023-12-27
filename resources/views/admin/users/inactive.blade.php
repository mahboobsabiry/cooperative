@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.users.inactiveUsers'))
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Select 2 -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Sumoselect css-->
    <link href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">

    <style>
        table thead tr .tblBorder {
            border: 1px solid #ddd;
        }
    </style>
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.users.inactiveUsers')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.users.inactiveUsers')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.users.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- Table Title -->
                        <nav class="nav main-nav-line mb-3">
                            <!-- All Users -->
                            <a class="nav-link {{ request()->url() == route('admin.users.index') ? 'active text-primary' : '' }}"
                               href="{{ request()->url() == route('admin.users.index') ? 'javascript:void(0)' : route('admin.users.index') }}">@lang('pages.users.allUsers')</a>
                            <!-- Active Users -->
                            <a class="nav-link {{ request()->url() == route('admin.users.active') ? 'active text-primary' : '' }}"
                               href="{{ request()->url() == route('admin.users.active') ? 'javascript:void(0)' : route('admin.users.active') }}">@lang('pages.users.activeUsers')</a>
                            <!-- Inactive Users -->
                            <a class="nav-link {{ request()->url() == route('admin.users.inactive') ? 'active text-primary' : '' }}"
                               href="{{ request()->url() == route('admin.users.inactive') ? 'javascript:void(0)' : route('admin.users.inactive') }}">@lang('pages.users.inactiveUsers')</a>
                        </nav>
                        <hr>
                        <!-- Table -->
                        <div class="table-responsive mt-2">
                            <table id="exportexample"
                                   class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th rowspan="2" class="text-center tblBorder">#</th>
                                    <th colspan="4" class="text-center tblBorder">@lang('global.personalInfo')</th>
                                    <th colspan="3" class="text-center tblBorder">@lang('global.details')</th>
                                    <th rowspan="2" class="text-center tblBorder">@lang('global.action')</th>
                                </tr>
                                <tr>
                                    <th class="text-center">@lang('form.avatar')</th>
                                    <th class="text-center">@lang('form.name')</th>
                                    <th class="text-center">@lang('form.phone')</th>
                                    <th class="text-center">@lang('form.email')</th>
                                    <th class="text-center">@lang('admin.sidebar.roles')</th>
                                    <th class="text-center">@lang('global.information')</th>
                                    <th class="text-center">@lang('global.createdDate')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ $loop->iteration }}
                                            @else
                                                <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ $user->image }}" class="card-img img-fluid w-50 rounded-50">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <!-- Email Address -->
                                        <td class="tx-sm-12-f">
                                            <a href="callto:{{ $user->phone }}" class="ctd">{{ $user->phone }}</a>
                                        </td>
                                        <!-- Email Address -->
                                        <td><a href="mailto:{{ $user->email }}" class="tx-sm-12-f ctd">{{ $user->email }}</a></td>
                                        <!-- Roles -->
                                        <td>
                                            @if(!empty($user->roles))
                                                @foreach($user->roles as $role)
                                                    <a class="modal-effect ctd"
                                                       data-effect="effect-sign" data-toggle="modal"
                                                       href="#role_details{{ $role->id }}">{{ $role->name }}</a>
                                                    {{ count($user->roles) > 1 ? '|' : '' }}

                                                    @include('admin.users.role_details')
                                                @endforeach
                                            @endif
                                        </td>
                                        <!-- Information -->
                                        <td class="text-nowrap tx-sm-12">{{ \Illuminate\Support\Str::limit($user->info, 30, '...') }}</td>
                                        <!-- Created Date -->
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ date_format($user->created_at, 'Y-F-d / h:i A') }}
                                            @else
                                                <span class="text-muted tx-sm-12">
                                                @php
                                                     $date = \Morilog\Jalali\CalendarUtils::strftime('Y-m-d / h:i A', strtotime($user->created_at)); // 1395-02-19
                                                     echo \Morilog\Jalali\CalendarUtils::convertNumbers($date);
                                                @endphp
                                                </span>
                                            @endif
                                        </td>

                                        <!-- Action -->
                                        <td>
                                            <!-- Show -->
                                            <a class="btn btn-sm ripple btn-secondary" href="{{ route('admin.users.show', $user->id) }}"
                                               title="@lang('pages.users.userProfile')">
                                                <i class="fe fe-eye"></i>
                                            </a>

                                            <!-- Edit -->
                                            <a class="btn btn-sm ripple btn-info" href="{{ route('admin.users.edit', $user->id) }}"
                                               title="@lang('pages.users.editUser')">
                                                <i class="fe fe-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a class="modal-effect btn btn-sm ripple btn-danger"
                                               data-effect="effect-sign" data-toggle="modal"
                                               href="#delete_record{{ $user->id }}"
                                               title="@lang('pages.users.deleteUser')">
                                                <i class="fe fe-delete"></i>
                                            </a>

                                            @include('admin.users.delete')
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Table -->
                    </div>
                    <!--/==/ End of Table Card Body -->
                </div>
                <!--/==/ End of Table Card -->
            </div>
        </div>
        <!--/==/ End of Data Table -->
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
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
