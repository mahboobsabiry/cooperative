@extends('layouts.admin.master')
<!-- Title -->
@section('title', ' جواز فعالیت ختم شده شرکت ها')
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
                <h2 class="main-content-title tx-24 mg-b-5">جواز فعالیت ختم شده شرکت ها</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.asycuda.coal.index') }}">جواز فعالیت شرکت ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">جواز فعالیت ختم شده شرکت ها</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('asy_coal_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.asycuda.coal.create') }}">
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
                <div class="card mb-2">
                    <div class="card-header tx-15 tx-bold">
                        جواز فعالیت ختم شده شرکت ها ({{ count($coal) }})
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Employees -->
                        <div class="">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام شرکت</th>
                                        <th>نمبر تشخیصیه</th>
                                        <th>جواز</th>
                                        <th>تاریخ صدور</th>
                                        <th>تاریخ ختم</th>
                                        <th>نام مالک/رئیس</th>
                                        <th>شماره تماس مالک/رئیس</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('form.email')</th>
                                        <th>@lang('global.address')</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($coal as $cal)
                                        <tr>
                                            <td>{{ $cal->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.asycuda.coal.show', $cal->id) }}">{{ $cal->company_name }}</a>
                                            </td>
                                            <td>{{ $cal->company_tin }}</td>
                                            <td>{{ $cal->license_number }}</td>
                                            <td>{{ $cal->export_date }}</td>
                                            <td>{{ $cal->expire_date }}</td>
                                            <td>{{ $cal->owner_name }}</td>
                                            <td>{{ $cal->owner_phone }}</td>
                                            <td>{{ $cal->phone }}</td>
                                            <td>{{ $cal->email }}</td>
                                            <td>{{ $cal->address }}</td>
                                            <td>{{ $cal->info }}</td>
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
