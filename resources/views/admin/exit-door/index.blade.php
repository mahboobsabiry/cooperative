@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.exitDoor.exitDoor'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.exitDoor.exitDoor')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.exitDoor.exitDoor')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.exit-door.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Search Bar -->
        <div class="advanced-search">
            <form method="get" action="{{ route('admin.exit-door.index') }}">
                @csrf
                <div class="row align-items-center">
                    <!-- From Date -->
                    <div class="col-md-4">
                        <div class="form-group mb-lg-0">
                            <label class="">@lang('pages.exitDoor.fromDate') :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fe fe-calendar lh--9 op-6"></i>
                                    </div>
                                </div>
                                <input class="form-control" id="fromDate" name="from_date" value="{{ old('from_date') }}" placeholder="12/29/2023" type="text">
                                <span id="pdFromDateSpan"></span>
                            </div>
                        </div>
                    </div>

                    <!-- To Date -->
                    <div class="col-md-4">
                        <div class="form-group mb-lg-0">
                            <label class="">@lang('pages.exitDoor.toDate') :</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fe fe-calendar lh--9 op-6"></i>
                                    </div>
                                </div>
                                <input class="form-control" id="toDate" name="to_date" value="{{ old('to_date') }}" placeholder="12/29/2023" type="text">
                                <span id="pdToDateSpan"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Exit Type -->
                    <div class="col-md-4">
                        <div class="form-group mb-lg-0">
                            <label for="exit_type" class="">@lang('pages.exitDoor.exitType') :</label>
                            <select id="exit_type" class="form-control select2" name="exit_type" data-placeholder="@lang('pages.exitDoor.exitType')">
                                <option value="5">@lang('global.all')</option>
                                <option value="0">@lang('pages.exitDoor.transit')</option>
                                <option value="1">@lang('pages.exitDoor.export')</option>
                                <option value="2">@lang('pages.exitDoor.emptyVehicles')</option>
                                <option value="3">@lang('pages.exitDoor.rejectedGoods')</option>
                                <option value="4">@lang('pages.exitDoor.returnedGoods')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Submit && Reset Buttons -->
                <div class="row">
                    <div class="col-md-6 {{ app()->getLocale() == 'en' ? 'text-left' : 'text-right' }}">
                        <p>
                            <span class="bg-dark text-white p-2"><strong>تاریخ امروز:</strong> روز <span style="color: burlywood;">{{ \Morilog\Jalali\CalendarUtils::strftime('l', now())  }}</span> تاریخ <span style="color: burlywood;">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', now()) }}</span> مصادف با <span style="color: burlywood;">{{ date_format(now(), 'Y-m-d') }}</span></span>
                        </p>
                    </div>

                    <div class="col-md-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                        <button type="button" class="btn btn-secondary">@lang('global.reset')</button>

                        <button type="submit" class="btn btn-primary">@lang('global.search')</button>
                    </div>
                </div>
            </form>
        </div>
        <!--/==/ End of Search Bar -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card main-content-body-profile">
                    <!-- Table Title -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="nav main-nav-line mb-2">
                                <div class="nav-link active">
                                    @lang('pages.exitDoor.exitDoor')
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="nav main-nav-line mb-2 float-left">
                                <div class="nav-link">مجموع: ({{ count($items) }})</div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.exitDoor.exitDoor')
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table id="exportexample"
                                       class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center tblBorder">#</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.exitType')</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.carrierName')</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.goodName')</th>
                                        <th colspan="3" class="text-center tblBorder">@lang('pages.exitDoor.goodsAmount')</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.vpNumber')</th>
                                        <th rowspan="2" class="text-center tblBorder">EN-EX</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('global.date')</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">@lang('pages.exitDoor.bxTotal')</th>
                                        <th class="text-center">@lang('pages.exitDoor.bxTotalTx')</th>
                                        <th class="text-center">@lang('pages.exitDoor.weight')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>
                                                @if($item->exit_type == 0) <!-- Transit -->
                                                    <a href="{{  route('admin.ed.transit') }}">@lang('pages.exitDoor.transitGoods')</a>
                                                @elseif($item->exit_type == 1) <!-- Export -->
                                                    <a href="{{  route('admin.ed.export') }}">@lang('pages.exitDoor.exportGoods')</a>
                                                @elseif($item->exit_type == 2) <!-- Empty -->
                                                    <a href="{{  route('admin.ed.empty') }}">@lang('pages.exitDoor.emptyVehicles')</a>
                                                @elseif($item->exit_type == 3) <!-- Rejected -->
                                                    <a href="{{  route('admin.ed.rejected') }}">@lang('pages.exitDoor.rejectedGoods')</a>
                                                @elseif($item->is_returned == 1 && $item->exit_type == 0) <!-- Returned Transit -->
                                                    <a href="{{  route('admin.ed.tr_returned') }}" target="_blank">@lang('pages.exitDoor.returnedTransit')</a>
                                                @elseif($item->is_returned == 1 && $item->exit_type == 1) <!-- Returned Export -->
                                                    <a href="{{  route('admin.ed.ex_returned') }}" target="_blank">@lang('pages.exitDoor.returnedExport')</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.exit-door.show', $item->id) }}">{{ $item->company_name }}</a>
                                            </td>
                                            <td>{{ $item->good_name ?? '' }}</td>
                                            <td>{{ $item->bx_total ?? '' }}</td>
                                            <td>{{ $item->bx_total_tx ?? '' }}</td>
                                            <td>{{ $item->weight ?? '' }}</td>
                                            <td>{{ $item->vp_number }} - {{ $item->vpt_number ?? '' }}</td>
                                            <td>{{ $item->enex ?? '' }}</td>

                                            <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!--/==/ End of All -->
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
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>

    <script>
        $("#fromDate").datepicker();
        $("#toDate").datepicker();
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
