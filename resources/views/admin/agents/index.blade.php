@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.companies.agents'))
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
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.companies.agents')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.agents.create') }}">
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
                                @lang('pages.companies.agents') ({{ count($agents) }})
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.photo')</th>
                                        <th>@lang('form.name')</th>
                                        <th>تعداد همکاران</th>
                                        <th>@lang('form.fromDate')</th>
                                        <th>@lang('form.toDate')</th>
                                        <th>@lang('pages.employees.docNumber')</th>
                                        <th>شرکت</th>
                                        <th>@lang('global.validationStatus')</th>
                                        <th>@lang('form.phone')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($agents as $agent)
                                        <tr>
                                            <td>{{ $agent->id }}</td>
                                            <td>
                                                <a href="{{ $agent->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                                    <img src="{{ $agent->image ?? asset('assets/images/avatar-default.jpeg') }}" width="40">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('admin.agents.show', $agent->id ) }}">{{ $agent->name }}</a></td>
                                            <td>{{ $agent->colleagues->count() }}</td>
                                            <!-- From Date -->
                                            <td>
                                                <span class="bd-b">{{ $agent->from_date ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->from_date2 ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->from_date3 ?? '---' }}</span> <br>
                                            </td>

                                            <!-- To Date -->
                                            <td>
                                                <span class="bd-b">{{ $agent->to_date ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->to_date2 ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->to_date3 ?? '---' }}</span> <br>
                                            </td>

                                            <!-- Document Number -->
                                            <td>
                                                <span class="bd-b">{{ $agent->doc_number ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->doc_number2 ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->doc_number3 ?? '---' }}</span> <br>
                                            </td>

                                            <!-- Company Name -->
                                            <td>
                                                <span class="bd-b">{{ $agent->company_name ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->company_name2 ?? '---' }}</span> <br>
                                                <span class="bd-b">{{ $agent->company_name3 ?? '---' }}</span> <br>
                                            </td>

                                            <!-- Validation Date Status -->
                                            <td>
                                                <!-- First Company -->
                                                @if($agent->to_date)
                                                    <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    </span>
                                                @else
                                                    <span class="bdb">---</span>
                                                @endif
                                                <br>
                                                <!-- Second Company -->
                                                @if($agent->to_date2)
                                                    <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date2)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    </span>
                                                @else
                                                    <span class="bdb">---</span>
                                                @endif
                                                <br>
                                                <!-- Third Company -->
                                                @if($agent->to_date3)
                                                    <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date3)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    </span>
                                                @else
                                                    <span class="bdb">---</span>
                                                @endif
                                            </td>
                                            <!--/==/ End of Validation Date Status -->

                                            <td>{{ $agent->phone }}{{ $agent->phone2 ? ', ' : '' }} {{ $agent->phone2 ?? '' }}</td>
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
