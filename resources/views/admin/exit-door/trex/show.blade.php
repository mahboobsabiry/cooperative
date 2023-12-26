@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.exitDoor.trex'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.exitDoor.trex')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.ed-trex.index') }}">@lang('pages.exitDoor.trexGoods')</a></li>
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
                @include('admin.exit-door.trex.delete')

                <!-- Edit -->
                <a class="btn ripple btn-dark btn-sm" href="{{ route('admin.ed-trex.edit', $item->id) }}">
                    <i class="fe fe-edit"></i> @lang('global.edit')
                </a>

                <!-- Add New -->
                <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.ed-trex.create') }}" target="_blank">
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
                                        <th><strong>@lang('pages.exitDoor.carrierName') :</strong></th>
                                        <td>{{ $item->c_name }}</td>
                                    </tr>

                                    <!-- Good Name -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.goodName') :</strong></th>
                                        <td>{{ $item->good_name }}</td>
                                    </tr>

                                    <!-- Box Total -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.bxTotal') :</strong></th>
                                        <td>{{ $item->bx_total }}</td>
                                    </tr>

                                    <!-- Box Total Text -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.bxTotalTx') :</strong></th>
                                        <td>{{ $item->bx_total_tx }}</td>
                                    </tr>

                                    <!-- Weight -->
                                    <tr>
                                        <th><strong>@lang('pages.exitDoor.weight') :</strong></th>
                                        <td>{{ $item->weight }}</td>
                                    </tr>
                                    <!-- Left Column -->
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
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

                                    <!-- Enex -->
                                    <tr>
                                        <th><strong>EN-EX:</strong></th>
                                        <td>{{ $item->enex }}</td>
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

                                    <!-- Type -->
                                    <tr>
                                        <th><strong>@lang('global.type'):</strong></th>
                                        <td>{{ $item->is_tr == 1 ? trans('pages.exitDoor.transit') : trans('pages.exitDoor.export') }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Details Table -->

                            <!-- When Returned -->
                            <div>
                                <div class="row">
                                    <!-- Vehicle Returned -->
                                    <div class="col-md-6">
                                        <div class="form-group bd-t pt-1">
                                            <label for="is_returned">@lang('pages.exitDoor.isReturned')</label>
                                            @if($item->is_returned == 1)
                                                <a class="is_returned" id="is_returned"
                                                   trex_id="{{ $item->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                       is_returned="Yes"></i>
                                                </a>

                                                <span class="yesNo">@lang('global.yes')</span>
                                            @else
                                                <a class="is_returned" id="is_returned"
                                                   trex_id="{{ $item->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                       is_returned="No"></i>
                                                </a>

                                                <span class="yesNo">@lang('global.no')</span>
                                            @endif
                                            <span id="update_return" style="display: none;">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </span>
                                        </div>

                                        <!-- Return Date -->
                                        @if($item->return_date != null)
                                            <div><strong>@lang('pages.exitDoor.returnDate'): </strong>
                                                {{ $item->return_date }}
                                                @lang('global.coincidesWith')
                                                {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->return_date)) ?? '' }}
                                            </div>
                                        @endif
                                    </div>
                                    <!--/==/ End of Vehicle Returned -->

                                    <!-- Vehicle Exit Again -->
                                    @if($item->is_returned == 1)
                                    <div class="col-md-6">
                                        <div class="form-group bd-t pt-1">
                                            <label for="exit_again">@lang('pages.exitDoor.isExitAgain')</label>
                                            @if($item->exit_again == 1)
                                                <a class="exit_again" id="exit_again"
                                                   trex_id="{{ $item->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                       exit_again="Yes"></i>
                                                </a>

                                                <span class="yesNo">@lang('global.yes')</span>
                                            @else
                                                <a class="exit_again" id="exit_again"
                                                   trex_id="{{ $item->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                       exit_again="No"></i>
                                                </a>

                                                <span class="yesNo">@lang('global.no')</span>
                                            @endif
                                            <span id="update_exit" style="display: none;">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </span>
                                        </div>

                                        <!-- Exit Again Date -->
                                        @if($item->ea_date != null)
                                            <div><strong>@lang('pages.exitDoor.eaDate'): </strong>
                                                {{ $item->ea_date }}
                                                @lang('global.coincidesWith')
                                                {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($item->ea_date)) ?? '' }}
                                            </div>
                                        @endif
                                    </div>
                                    @endif
                                    <!--/==/ End of Exit Again -->
                                </div>
                            </div>

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

    @include('admin.exit-door.trex.trex_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
