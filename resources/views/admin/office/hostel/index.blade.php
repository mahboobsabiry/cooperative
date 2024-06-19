@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.hostel.hostel'))
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
                @can('office_hostel_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.office.hostel.create') }}">
                        <i class="fe fe-plus-circle"></i> @lang('global.new')
                    </a>
                @endcan
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Table Card -->
                <div class="card">
                    <div class="card-header tx-15 tx-bold mg-b-20">
                        @lang('pages.hostel.hostel') محصولی دارای
                        ({{ \App\Models\Office\Hostel::where('place', 'محصولی')->select('id')->distinct('id')->count() }}) اتاق
                        <br>
                        @lang('pages.hostel.hostel')  سرحدی دارای
                        ({{ \App\Models\Office\Hostel::where('place', 'سرحدی')->select('id')->distinct('id')->count() }}) اتاق
                        <br>
                        @lang('pages.hostel.hostel') پورت یکم دارای
                        ({{ \App\Models\Office\Hostel::where('place', 'پورت یکم')->select('id')->distinct('id')->count() }}) اتاق
                        <br>
                        @lang('pages.hostel.hostel') مراقبت سیار دارای
                        ({{ \App\Models\Office\Hostel::where('place', 'مراقبت سیار')->select('id')->distinct('id')->count() }}) اتاق
                    </div>

                    <div class="card-body">
                        <!-- All Positions -->
                        <div class="">
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>موقعیت</th>
                                        <th>@lang('pages.hostel.roomNumber')</th>
                                        <th>@lang('pages.hostel.section')</th>
                                        <th>گنجایش و تعداد اعضا</th>
                                        <th>@lang('admin.sidebar.employees')</th>
                                        <th>@lang('global.extraInfo')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($hostels as $hostel)
                                        <tr>
                                            <td>{{ $hostel->id }}</td>
                                            <td>{{ $hostel->place }}</td>
                                            <td>
                                                <a href="{{ route('admin.office.hostel.show', $hostel->id ) }}">{{ $hostel->number }}</a>
                                            </td>
                                            <td>{{ $hostel->section }}</td>
                                            <td>
                                                @if($hostel->capacity >=1)
                                                    @php
                                                        $capacity = $hostel->capacity;
                                                        $each = 100 / $hostel->capacity;
                                                        $total = $each * $hostel->employees->count();
                                                        echo $hostel->capacity . '/' . $hostel->employees->count();
                                                    @endphp
                                                    <div class="progress mb-1">
                                                        <div aria-valuemax="100" aria-valuemin="0"
                                                             aria-valuenow="{{ round($total) }}"
                                                             class="progress-bar progress-bar-lg @if($total == 100) bg-danger @else bg-info @endif"
                                                             role="progressbar" style="width: {{ round($total) }}%;">{{ count($hostel->employees) }}</div>
                                                    </div>
                                                @else
                                                    0
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($hostel->employees as $employee)
                                                    <a href="{{ route('admin.office.employees.show', $employee->id) }}">
                                                        {{ count($hostel->employees) > 1 ? ' - ' : '' }}
                                                        {{ $employee->name }} {{ $employee->last_name }}
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td>{{ $hostel->info }}</td>
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
