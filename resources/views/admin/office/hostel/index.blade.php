@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.hostel.hostel'))
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

    @if(app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @endif

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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.hostel.hostel')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.hostel.hostel')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.office.hostel.create') }}">
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
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All Positions -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.hostel.hostel') دارای
                                ({{ \App\Models\Office\Hostel::select('number')->distinct('number')->count() }}) اتاق
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('pages.hostel.roomNumber')</th>
                                        <th>@lang('pages.hostel.section')</th>
                                        <th>@lang('pages.hostel.numOfMembers')</th>
                                        <th>@lang('admin.sidebar.employees')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($hostels as $hostel)
                                        <tr>
                                            <td>{{ $hostel->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.office.hostel.show', $hostel->id ) }}">{{ $hostel->number }}</a>
                                            </td>
                                            <td>{{ $hostel->section }}</td>
                                            <td>
                                                @php
                                                    if (!$hostel->employees || $hostel->employees->count() == 0) {
                                                        $count_number = 0;
                                                    } elseif ($hostel->employees->count() == 1) {
                                                        $count_number = 20;
                                                    } elseif ($hostel->employees->count() == 2) {
                                                        $count_number = 40;
                                                    } elseif ($hostel->employees->count() == 3) {
                                                        $count_number = 60;
                                                    } elseif ($hostel->employees->count() == 4) {
                                                        $count_number = 80;
                                                    } elseif ($hostel->employees->count() == 5) {
                                                        $count_number = 100;
                                                    } else {
                                                        $count_number = 0;
                                                    }
                                                @endphp
                                                <div class="progress mb-1">
                                                    <div aria-valuemax="100" aria-valuemin="0"
                                                         aria-valuenow="{{ $count_number }}"
                                                         class="progress-bar progress-bar-lg wd-{{ $count_number }}p bg-info"
                                                         role="progressbar">{{ count($hostel->employees) }}</div>
                                                </div>
                                            </td>
                                            <td>
                                                @foreach($hostel->employees as $employee)
                                                    <a href="{{ route('admin.office.employees.show', $employee->id) }}">
                                                        {{ count($hostel->employees) > 1 ? ' - ' : '' }}
                                                        {{ $employee->name }} {{ $employee->last_name }}
                                                    </a>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!--/==/ End of All Agents -->
                    </div>
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
    {{--    <script src="{{ asset('backend/assets/js/datatable.js') }}"></script>--}}
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
