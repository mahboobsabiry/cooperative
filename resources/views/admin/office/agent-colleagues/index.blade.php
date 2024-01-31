@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ همکاران نمایندگان')
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.companies.agents')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">همکاران نمایندگان</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->

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
                                همکاران نمایندگان ({{ count($colleagues) }})
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.photo')</th>
                                        <th>@lang('form.name')</th>
                                        <th>مافوق</th>
                                        <th>@lang('form.fromDate')</th>
                                        <th>@lang('form.toDate')</th>
                                        <th>@lang('pages.employees.docNumber')</th>
                                        <th>@lang('global.validationStatus')</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('global.address')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($colleagues as $colleague)
                                        <tr>
                                            <td>AGC-{{ $colleague->id }}</td>
                                            <td>
                                                <a href="{{ $colleague->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                                    <img src="{{ $colleague->image ?? asset('assets/images/avatar-default.jpeg') }}" width="40">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('admin.office.agent-colleagues.show', $colleague->id ) }}">{{ $colleague->name }}</a></td>
                                            <td>{{ $colleague->agent->name }}</td>
                                            <!-- From Date -->
                                            <td>{{ $colleague->from_date }}</td>
                                            <!-- To Date -->
                                            <td>{{ $colleague->to_date ?? '---' }}</td>
                                            <!-- Document Number -->
                                            <td>{{ $colleague->doc_number ?? '---' }} </td>

                                            <!-- Validation Date Status -->
                                            <td>
                                                @php
                                                    $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();

                                                    // $diff_days = $to_date->diffInDays($from_date);
                                                    $valid_days = now()->diffInDays($to_date);
                                                    if ($to_date > today()) {
                                                        echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                    } else {
                                                        echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                    }
                                                @endphp
                                            </td>
                                            <!--/==/ End of Validation Date Status -->

                                            <td>{{ $colleague->phone }}{{ $colleague->phone2 ? ', ' : '' }} {{ $colleague->phone2 ?? '' }}</td>
                                            <td>{{ $colleague->address }}</td>
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
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
