@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.exitDoor.rejectedGoods'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.exitDoor.rejectedGoods')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.ed-rejected.index') }}">@lang('pages.exitDoor.rejectedGoods')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Delete -->
                <a class="modal-effect btn btn-sm ripple btn-danger"
                   data-effect="effect-sign" data-toggle="modal"
                   href="#delete_record{{ $item->id }}">
                    <i class="fe fe-trash"></i>
                    @lang('global.delete')
                </a>
                @include('admin.exit-door.rejected.delete')

                <!-- Edit -->
                <a class="btn ripple btn-dark btn-sm" href="{{ route('admin.ed-rejected.edit', $item->id) }}">
                    <i class="fe fe-edit"></i> @lang('global.edit')
                </a>

                <!-- Add New -->
                <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.ed-rejected.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div class="card-title mb-0 font-weight-bold">@lang('global.details')</div>
                    </div>

                    <div class="card-body">
                        <div class="p-2">
                            <!-- Details Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Company Name -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.cName') :</strong></th>
                                        <td>{{ $item->c_name }}</td>
                                    </tr>

                                    <!-- Vehicle Plate Number -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.vpNumber') :</strong></th>
                                        <td>{{ $item->vp_number }}</td>
                                    </tr>

                                    <!-- Vehicle Plate Trailer Number -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.vptNumber') :</strong></th>
                                        <td>{{ $item->vpt_number }}</td>
                                    </tr>

                                    <!-- Left Column -->
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Good Name -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.goodName'):</strong></th>
                                        <td>{{ $item->good_name }}</td>
                                    </tr>

                                    <!-- Date -->
                                    <tr>
                                        <th><strong>@lang('global.date'):</strong></th>
                                        <td>
                                            {{ date_format($item->created_at, 'Y-m-d') }}
                                            @lang('global.coincidesWith')
                                            {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->created_at)) ?? '' }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Details Table -->

                            <!-- When Returned / Code will be here -->

                            <hr>

                            <!-- Desc -->
                            <p><strong>@lang('form.description'): </strong> {{ $item->desc }}</p>
                        </div>
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
