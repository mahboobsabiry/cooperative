@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.positions.administrations'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.positions.administrations')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.positions.index') }}">@lang('admin.sidebar.positions')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.positions.administrations')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('position_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.positions.create') }}" target="_blank">
                        <i class="fe fe-plus-circle"></i> @lang('pages.positions.addPosition')
                    </a>
                @endcan
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
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- Table Title -->
                        <div>
                            <h6 class="card-title mb-1">@lang('form.position') @lang('pages.positions.administrations')</h6>
                            <p class="text-muted card-sub-title">@lang('pages.positions.administrationsTitleNote'):</p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive mt-2">
                            <table id="exportexample"
                                   class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.title')</th>
                                    <th>@lang('pages.positions.admin')</th>
                                    <th>@lang('pages.positions.underHand')</th>
                                    <th>@lang('form.position')</th>
                                    <th>@lang('form.description')</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($administrations as $admin)
                                    <tr>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ $loop->iteration }}
                                            @else
                                                <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $admin->title }}</td>
                                        <td>
                                            @php
                                            $employee = \App\Models\Employee::where('position_id', $admin->id)->first();
                                            @endphp
                                            @if(!empty($employee))
                                                <a href="{{ route('admin.employees.show', $employee->id) }}">
                                                    {{ $employee->name }} {{ $employee->last_name }}
                                                </a>
                                            @else
                                                @lang('global.empty')
                                            @endif
                                        </td>

                                        <!-- Parent Position -->
                                        <td>
                                            {{ $admin->parent->title ?? '' }}
                                        </td>
                                        <td>{{ $admin->position_number }}</td>
                                        <td>{{ \Str::limit($admin->desc, 50, '...') }}</td>

                                        <!-- Action -->
                                        <td>
                                            <!-- Show -->
                                            <a class="btn btn-sm ripple btn-secondary"
                                               href="{{ route('admin.positions.show', $admin->id) }}"
                                               title="@lang('global.details')">
                                                <i class="fe fe-eye"></i>
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
