@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('admin.sidebar.positions'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.sidebar.positions')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.sidebar.positions')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.positions.create') }}" target="_blank">
                    <i class="fe fe-plus-circle"></i> @lang('pages.positions.addPosition')
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
                        <a class="nav-link active" data-toggle="tab" href="#allPositions">
                            @lang('pages.positions.allPositions')
                        </a>
                        <a class="nav-link" data-toggle="tab" href="#emptyPositions">
                            @lang('pages.positions.emptyPositions')
                        </a>
                    </div>

                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All Positions -->
                        <div class="tab-pane active" id="allPositions">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.positions.allPositions')
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table id="exportexample"
                                       class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.title')</th>
                                        <th>@lang('pages.positions.responsible')</th>
                                        <th>@lang('pages.positions.underHand')</th>
                                        <th>@lang('pages.positions.positionNumber')</th>
                                        <th>@lang('form.description')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($positions as $position)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td><a href="{{ route('admin.positions.show', $position->id ) }}">{{ $position->title }}</a></td>
                                            <!-- Responsible -->
                                            <td>
                                                @if($position->employees)
                                                    @foreach($position->employees as $employee)
                                                        <a href="{{ route('admin.employees.show', $employee->id) }}" class="badge badge-pill badge-dark" target="_blank">
                                                            {{ $employee->name }} {{ $employee->last_name }}
                                                        </a>
                                                    @endforeach
                                                @else
                                                    @lang('global.empty')
                                                @endif
                                            </td>

                                            <!-- Parent Position -->
                                            <td>
                                                {{ $position->parent->title ?? trans('pages.positions.afCustomsDep') }}
                                            </td>
                                            <td>{{ $position->position_number }}</td>
                                            <td>{{ \Str::limit($position->desc, 50, '...') }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!--/==/ End of All Positions -->

                        <!-- Empty Positions -->
                        <div class="tab-pane" id="emptyPositions">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.positions.emptyPositions')
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered row">
                                    <tbody>
                                    <tr class="bg-gray-500">
                                        <th class="font-weight-bold">#</th>
                                        <th class="font-weight-bold">@lang('form.title')</th>
                                        <th class="font-weight-bold">@lang('pages.positions.positionNumber')</th>
                                        <th class="font-weight-bold">@lang('pages.positions.underHand')</th>
                                        <th class="font-weight-bold">@lang('form.status')</th>
                                    </tr>
                                    @foreach($emptyPositions as $post)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->position_number }}</td>
                                            <td>{{ $post->parent->title ?? trans('pages.positions.afCustomsDep') }}</td>
                                            <td>@lang('global.empty')</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/==/ End of Empty Positions -->
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
