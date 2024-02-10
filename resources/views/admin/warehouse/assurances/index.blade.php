@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ تضمین ها')
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
                <h2 class="main-content-title tx-24 mg-b-5">مدیریت عمومی گدام ها</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">تضمین ها</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('office_hostel_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.warehouse.assurances.create') }}">
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
                <div class="card custom-card main-content-body-profile">
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All Positions -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                تضمین های جاری ({{ $assurances->count() }})
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام شرکت</th>
                                        <th>نام جنس</th>
                                        <th>مقدار تضمین</th>
                                        <th>نمبر استعلام</th>
                                        <th>تاریخ استعلام</th>
                                        <th>نمبر آویز بانکی</th>
                                        <th>تاریخ آویز بانکی</th>
                                        <th>تاریخ ختم</th>
                                        <th>مدت اعتبار</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($assurances as $assurance)
                                        <tr>
                                            <td>{{ $assurance->id }}</td>
                                            <td>{{ $assurance->company->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.warehouse.assurances.show', $assurance->id ) }}">{{ $assurance->good_name }}</a>
                                            </td>
                                            <td>{{ $assurance->assurance_total }}</td>
                                            <td>{{ $assurance->inquiry_number }}</td>
                                            <td>{{ $assurance->inquiry_date }}</td>
                                            <td>{{ $assurance->bank_tt_number }}</td>
                                            <td>{{ $assurance->bank_tt_date }}</td>
                                            <td>{{ $assurance->expire_date }}</td>
                                            <td>
                                                @php
                                                $exp_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->expire_date)->toCarbon();
                                                $valid_days = now()->diffInDays($exp_date);
                                                @endphp
                                                @if($valid_days > 10)
                                                    {{ $valid_days }} روز
                                                @else
                                                    <span class="text-danger">{{ $valid_days }} روز</span>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <span class="fas fa-dollar-sign fa-pulse text-danger"></span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!--/==/ End of All Record -->
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
