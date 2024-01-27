@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . 'کارمندان متقاعد')
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
                    <li class="breadcrumb-item active" aria-current="page">کارمندان متقاعد</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card main-content-body-profile">
                    <!-- Table Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- Employees -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                کارمندان متقاعد ({{ count($retired_employees) }})
                            </div>

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.name')</th>
                                        <th>@lang('form.fatherName')</th>
                                        <th>@lang('form.background')</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('form.empNumber')</th>
                                        <th>@lang('form.birthYear')</th>
                                        <th>@lang('form.introducer')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($retired_employees as $employee)
                                        <tr>
                                            <td>{{ $employee->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->name }} {{ $employee->last_name }}</a>
                                            </td>
                                            <td>{{ $employee->father_name ?? '' }}</td>
                                            <td>{!! $employee->background !!}</td>
                                            <td class="tx-sm-12-f">
                                                <a href="callto:{{ $employee->phone ?? '' }}" class="ctd">{{ $employee->phone ?? '' }}</a>
                                            </td>
                                            <td>{{ $employee->emp_number ?? '' }}</td>
                                            <td>{{ $employee->birth_year }} ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }} ساله)</td>
                                            <td>{{ $employee->introducer ?? '' }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!-- End of Employees -->
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
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
