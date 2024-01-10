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
                <a class="btn ripple btn-primary" href="{{ route('admin.employees.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card main-content-body-profile">
                    <!-- Table Title -->
                    <div class="nav main-nav-line mb-2">
                        <a class="nav-link active" data-toggle="tab" href="#employees">
                            @lang('admin.sidebar.employees')
                        </a>
                        <a class="nav-link" data-toggle="tab" href="#mpEmp">
                            @lang('pages.employees.mpEmps')
                        </a>
                        <a class="nav-link" data-toggle="tab" href="#onDuty">
                            @lang('pages.employees.onDutyEmps')
                        </a>
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- Employees -->
                        <div class="tab-pane active" id="employees">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('admin.sidebar.employees')
                            </div>

                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table id="exportexample"
                                       class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.photo')</th>
                                        <th>@lang('form.name')</th>
                                        <th>@lang('form.fatherName')</th>
                                        <th>@lang('form.gender')</th>
                                        <th>@lang('form.empNumber')</th>
                                        <th>@lang('form.appointmentNumber')</th>
                                        <th>@lang('form.appointmentDate')</th>
                                        <th>@lang('form.lastDuty')</th>
                                        <th>@lang('form.birthYear')</th>
                                        <th>@lang('form.education')</th>
                                        <th>PRR/NPR</th>
                                        <th>PRR Date</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('form.email')</th>
                                        <th>@lang('form.mainProvince')</th>
                                        <th>@lang('form.currentProvince')</th>
                                        <th>@lang('form.onDuty')</th>
                                        <th>@lang('form.info')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>
                                                <img src="{{ $employee->image ? $employee->image : asset('assets/images/avatar-default.jpeg') }}" width="50" class="rounded-50">
                                            </td>
                                            <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                                            <td>{{ $employee->father_name ?? '' }}</td>
                                            <td>{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</td>
                                            <td>{{ $employee->emp_number ?? '' }}</td>
                                            <td>{{ $employee->appointment_number ?? '' }}</td>
                                            <td>{{ $employee->appointment_date ?? '' }}</td>
                                            <td>{{ $employee->lastDuty ?? '' }}</td>
                                            <td>{{ $employee->birth_year ?? '' }}</td>
                                            <td>{{ $employee->education ?? '' }}</td>
                                            <td>{{ $employee->prr_npr ?? '' }}</td>
                                            <td>{{ $employee->prr_date ?? '' }}</td>
                                            <!-- Email Address -->
                                            <td class="tx-sm-12-f">
                                                <a href="callto:{{ $employee->phone ?? '' }}" class="ctd">{{ $employee->phone ?? '' }}</a>
                                                <a href="callto:{{ $employee->phone2 ?? '' }}" class="ctd">{{ $employee->phone2 ?? '' }}</a>
                                            </td>
                                            <!-- Email Address -->
                                            <td><a href="mailto:{{ $employee->email ?? '' }}" class="tx-sm-12-f ctd">{{ $employee->email ?? '' }}</a></td>
                                            <td>{{ $employee->main_province ?? '' }}</td>
                                            <td>{{ $employee->current_province ?? '' }}</td>
                                            <td>{{ $employee->onDuty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}</td>
                                            <td>{{ $employee->info }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!-- End of Employees -->

                        @include('admin.employees.mpEmp')
                        @include('admin.employees.onDuty')
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
