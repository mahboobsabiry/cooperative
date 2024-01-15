@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.positions.inactivePositions'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.sidebar.positions')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.positions.inactivePositions')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.positions.create') }}">
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
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')
                        <!-- All Positions -->
                        <div class="tab-pane active">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.positions.inactivePositions') ({{ count($positions) }})
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.title')</th>
                                        <th>@lang('pages.positions.officials_emps')</th>
                                        <th>@lang('pages.positions.underHand')</th>
                                        <th>@lang('pages.positions.positionNumber')</th>
                                        <th>@lang('form.num_of_pos')</th>
                                        <th>@lang('form.extraInfo')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($positions as $position)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td><a href="{{ route('admin.positions.show', $position->id ) }}">{{ $position->title }}</a></td>

                                            <!-- Employees and Officials -->
                                            <td>
                                                @if($position->employees)
                                                    @foreach($position->employees as $emp)
                                                    <a href="{{ route('admin.employees.show', $emp->id) }}">
                                                        {{ $emp->name }}
                                                        {{ $emp->last_name }}
                                                        (<span class="text-danger text-sm-center">
                                                            {{ $emp->on_duty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}
                                                        </span>)
                                                    </a>{{ $position->num_of_pos > 1 ? ', ' : '' }}
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
                                            <td>
                                                {{ $position->num_of_pos }}
                                                @if($position->employees->count() < $position->num_of_pos)
                                                    {<span class="text-danger small">@lang('global.empty')</span>}
                                                @elseif($position->employees->count() == $position->num_of_pos)

                                                @elseif($position->employees->count() > $position->num_of_pos)
                                                    {<span class="text-danger small">{{ $position->employees->count() - $position->num_of_pos }} @lang('global.empty')</span>}
                                                @endif
                                            </td>
                                            <td>{{ $position->desc }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Table -->
                        </div>
                        <!--/==/ End of All Positions -->
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
