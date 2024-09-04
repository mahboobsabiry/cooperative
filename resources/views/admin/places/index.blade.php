@extends('layouts.admin.master')
@section('title', 'موقعیت ها')
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">موقعیت ها</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">موقعیت ها</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="modal-effect btn ripple btn-primary" data-effect="effect-sign"
                   data-toggle="modal" href="#new_record">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
                @include('admin.places.create')
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Message -->
                @include('admin.inc.alerts')

                <!-- Table Card -->
                <div class="card">
                    <!-- Table Title -->
                    <div class="card-header">
                        <h6 class="card-title mb-1">موقعیت ها</h6>
                        <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export:</p>
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.name')</th>
                                    <th>کد</th>
                                    <th>کد گمرکی</th>
                                    <th>@lang('global.createdDate')</th>
                                    <th>معلومات اضافی</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($places as $place)
                                    <tr>
                                        @include('admin.places.ed')
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('admin.places.show', $place->id) }}">{{ $place->name }}</a></td>
                                        <td>{{ $place->code }}</td>
                                        <td>{{ $place->custom_code }}</td>
                                        <td>{{  \Morilog\Jalali\CalendarUtils::strftime('Y-F-d', strtotime($place->created_at)) }}</td>
                                        <td>{!! $place->info !!}</td>
                                        <td>
                                            <!-- Edit -->
                                            <a class="modal-effect btn btn-sm ripple btn-info" data-effect="effect-sign" data-toggle="modal" href="#edit_record{{ $place->id }}" title="@lang('global.edit')">
                                                <i class="fe fe-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a class="modal-effect btn btn-sm ripple btn-danger" data-effect="effect-sign" data-toggle="modal" href="#delete_record{{ $place->id }}" title="@lang('global.delete')">
                                                <i class="fe fe-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Table -->
                    </div>
                    <!--/==/ End of Table Card Body -->
                </div>
                <!--/==/ End of Table Card -->
            </div>
        </div>
        <!--/==/ End of Data Table -->
    </div>
@endsection

@section('extra_js')
    <!-- Data Table js -->
    <script src="{{ asset('backend/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/table-data.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endsection
