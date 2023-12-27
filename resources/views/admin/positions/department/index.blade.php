@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.positions.department'))
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
{{--    <link href="https://unpkg.com/treeflex/dist/css/treeflex.css" rel="stylesheet">--}}
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.positions.department')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.positions.index') }}">@lang('admin.sidebar.positions')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.positions.department')</li>
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
                        <a class="nav-link active" data-toggle="tab" href="#depPosition">
                            @lang('form.position') @lang('pages.positions.department')
                        </a>
                        <a class="nav-link" data-toggle="tab" href="#organ">
                            @lang('pages.positions.organization')
                        </a>
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- Department Position -->
                        <div class="tab-pane active" id="depPosition">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.positions.department')
                            </div>
                            <!-- Table -->
                            <div class="table-responsive mt-2">
                                <table id="exportexample"
                                       class="table table-bordered border-top key-buttons display text-nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('form.title')</th>
                                        <th>@lang('pages.positions.head')</th>
                                        <th>@lang('pages.positions.underHand')</th>
                                        <th>@lang('pages.positions.positionNumber')</th>
                                        <th>@lang('form.description')</th>
                                        <th>@lang('global.action')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($department as $dep)
                                        <tr>
                                            <td>
                                                @if(app()->getLocale() == 'en')
                                                    {{ $loop->iteration }}
                                                @else
                                                    <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $dep->title }}</td>
                                            <td>
                                                @php
                                                    $employee = \App\Models\Employee::where('position_id', $dep->id)->first();
                                                @endphp

                                                @if($employee)
                                                    <a href="{{ route('admin.employees.show', $employee->id) }}">
                                                        {{ $employee->name }} {{ $employee->last_name }}
                                                    </a>
                                                @else
                                                    @lang('global.empty')
                                                @endif
                                            </td>

                                            <!-- Parent Position -->
                                            <td>
                                                {{ $dep->parent->title ?? trans('pages.positions.afCustomsDep') }}
                                            </td>
                                            <td>{{ $dep->position_number }}</td>
                                            <td>{{ \Str::limit($dep->desc, 50, '...') }}</td>

                                            <!-- Action -->
                                            <td>
                                                <!-- Show -->
                                                <a class="btn btn-sm ripple btn-secondary"
                                                   href="{{ route('admin.positions.show', $dep->id) }}"
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
                        <!--/==/ End of Department Position -->

                        <!-- Organization -->
                        <div class="tab-pane" id="organ">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.positions.bcdOrg')
                            </div>

                            <div class="container">
                                <div class="row bd">
                                    <div class="tree m-2">
                                        <ul>
                                            @foreach($organization as $organ)
                                                <li>
                                                    <a href="{{ route('admin.positions.show', $organ->id) }}" style="background: #ba8b00; color: beige">{{ $organ->title }}</a>
                                                    <ul>
                                                        @foreach($organ->children as $admin)
                                                            <li>
                                                                <a href="{{ route('admin.positions.show', $admin->id) }}" style="background: burlywood;">{{ $admin->title }}</a>
                                                                <ul>
                                                                    @foreach($admin->children as $mgmt)
                                                                        <li>
                                                                            <a href="{{ route('admin.positions.show', $mgmt->id) }}" style="background: bisque;">{{ $mgmt->title }}</a>
                                                                            <ul>
                                                                                @foreach($mgmt->children as $mgr)
                                                                                    <li>
                                                                                        <a href="{{ route('admin.positions.show', $mgr->id) }}" style="background: beige;">{{ $mgr->title }} ({{ count($mgr->employees) }})</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/==/ End of Organization -->
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
    <script src="{{ asset('assets/js/org.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
