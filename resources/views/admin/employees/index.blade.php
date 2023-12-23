@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('admin.sidebar.employees'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.sidebar.employees')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.sidebar.employees')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('employee_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.employees.create') }}" target="_blank">
                        <i class="fe fe-plus-circle"></i> @lang('global.new')
                    </a>
                @endcan
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
                        <div>
                            <h6 class="card-title mb-1">@lang('admin.sidebar.employees')</h6>
                            <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of
                                a complex application. The Buttons extension for DataTables provides three plug-ins that
                                provide overlapping functionality for data export:</p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive mt-2">
                            <table id="exportexample"
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
                                    <th class="text-center">@lang('form.office')</th>
                                    <th class="text-center">@lang('form.position')</th>
                                    <th class="text-center">@lang('form.province')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($employees as $employee)
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
                                        <!-- Province -->
                                        <td>{{ $employee->province }}</td>

                                        <!-- Action -->
                                        <td>
                                            <!-- Show -->
                                            <a class="btn btn-sm ripple btn-secondary" href="{{ route('admin.employees.show', $employee->id) }}"
                                               title="@lang('pages.users.userProfile')">
                                                <i class="fe fe-eye"></i>
                                            </a>

                                            <!-- Edit -->
                                            @can('employee_update')
                                                <a class="btn btn-sm ripple btn-info" href="{{ route('admin.employees.edit', $employee->id) }}"
                                                   title="@lang('pages.users.editUser')">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            @endcan

                                            <!-- Delete -->
                                            @can('employee_delete')
                                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                                   data-effect="effect-sign" data-toggle="modal"
                                                   href="#delete_record{{ $employee->id }}"
                                                   title="@lang('pages.users.deleteUser')">
                                                    <i class="fe fe-delete"></i>
                                                </a>

                                                @include('admin.employees.delete')
                                            @endcan
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
