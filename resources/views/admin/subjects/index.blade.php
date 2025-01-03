@extends('layouts.admin.master')
@section('title', 'مضامین')
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
                <h2 class="main-content-title tx-24 mg-b-5">{{ __('مضامین') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('مضامین') }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="modal-effect btn ripple btn-primary" data-effect="effect-sign"
                   data-toggle="modal" href="#new_record">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
                @include('admin.subjects.create')
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Messages -->
                        @include('admin.inc.alerts')

                        <!-- Table Title -->
                        <div>
                            <h6 class="card-title font-weight-bold mb-1">{{ __('مضامین') }} ({{ $subjects->count() }})</h6>
                            <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of
                                a complex application. The Buttons extension for DataTables provides three plug-ins that
                                provide overlapping functionality for data export:</p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="exportexample"
                                   class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.title')</th>
                                    <th>@lang('global.extraInfo')</th>
                                    <th>@lang('global.createdDate')</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($subjects as $subject)
                                    <tr>
                                        @include('admin.subjects.ed')
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- Title -->
                                        <td>
                                            <a href="{{ route('admin.subjects.show', $subject->id) }}">
                                                {{ $subject->title }}
                                            </a>
                                        </td>
                                        <!-- Info -->
                                        <td>{{ \Illuminate\Support\Str::limit($subject->info, 200, '...') }}</td>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($subject->created_at)) }}</td>
                                        <td>
                                            <!-- Edit -->
                                            <a class="modal-effect btn btn-sm ripple btn-info" data-effect="effect-sign"
                                               data-toggle="modal" href="#edit_record{{ $subject->id }}"
                                               title="@lang('global.edit')">
                                                <i class="fe fe-edit"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a class="modal-effect btn btn-sm ripple btn-danger"
                                               data-effect="effect-sign" data-toggle="modal"
                                               href="#delete_record{{ $subject->id }}" title="@lang('global.delete')">
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