@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.exitDoor.returnedGoods'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.exitDoor.returnedGoods')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.exitDoor.returnedGoods')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.ed-trex.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('global.new') @lang('pages.exitDoor.trex')
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
                        <a class="nav-link active" href="{{ route('admin.ed-trex.tr_returned') }}">
                            @lang('pages.exitDoor.transitGoods')
                        </a>
                        <a class="nav-link" href="{{ route('admin.ed-trex.ex_returned') }}">
                            @lang('pages.exitDoor.exportGoods')
                        </a>
                    </div>

                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.exitDoor.returnedGoods')
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table id="exportexample"
                                       class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center tblBorder">#</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.carrierName')</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.goodName')</th>
                                        <th colspan="3" class="text-center tblBorder">@lang('pages.exitDoor.goodsAmount')</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.vpNumber')</th>
                                        <th rowspan="2" class="text-center tblBorder">EN-EX</th>
                                        <th rowspan="2" class="text-center tblBorder">@lang('pages.exitDoor.returnDate')</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">@lang('pages.exitDoor.bxTotal')</th>
                                        <th class="text-center">@lang('pages.exitDoor.bxTotalTx')</th>
                                        <th class="text-center">@lang('pages.exitDoor.weight')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($tr_returned as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="{{ route('admin.ed-trex.show', $item->id) }}">{{ $item->c_name }}</a>
                                            </td>
                                            <td>{{ $item->good_name }}</td>
                                            <td>{{ $item->bx_total }}</td>
                                            <td>{{ $item->bx_total_tx }}</td>
                                            <td>{{ $item->weight }}</td>
                                            <td>{{ $item->vp_number }} - {{ $item->vpt_number ?? '' }}</td>
                                            <td>{{ $item->enex }}</td>

                                            <td>{{ $item->return_date }}</td>
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
@endsection
<!--/==/ End of Extra Scripts -->
