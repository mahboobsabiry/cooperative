@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'حسابات کاربری سیستم اسیکودا')
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
                <h2 class="main-content-title tx-24 mg-b-5">حسابات کاربری سیستم اسیکودا</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    @can('office_employee_view')
                        <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    @else
                        <li class="breadcrumb-item">@lang('admin.sidebar.employees')</li>
                    @endcan
                    <li class="breadcrumb-item active" aria-current="page">حسابات کاربری سیستم اسیکودا</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('asy_user_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.asycuda.users.create') }}">
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
                    <div class="card-header tx-15 font-weight-bold">
                        مجموع حسابات کاربری فعال سیستم اسیکودا ({{ count($asycuda_users) }})
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Employees -->
                        <div class="tab-pane active">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100" style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام کارمند</th>
                                        <th>یوزر</th>
                                        <th>رمز عبور</th>
                                        <th>صلاحیت ها</th>
                                        <th>@lang('form.status')</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($asycuda_users as $asycuda_user)
                                        <tr>
                                            <td>{{ $asycuda_user->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.asycuda.users.show', $asycuda_user->id) }}">{{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }}</a>
                                            </td>
                                            <td>{{ $asycuda_user->user ?? '' }}</td>
                                            <td>{{ $asycuda_user->password ?? '' }}</td>
                                            <td>{{ $asycuda_user->roles ?? '' }}</td>
                                            <td>{{ $asycuda_user->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                                            <td>{{ $asycuda_user->info ?? '' }}</td>
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
