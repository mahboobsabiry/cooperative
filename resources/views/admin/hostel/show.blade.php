@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.hostel.hostel') . ' - ' . $hostel->number)
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.details')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.hostel.index') }}">@lang('pages.hostel.hostel')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $hostel->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.hostel.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.hostel.edit', $hostel->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.hostel.create') }}">
                            @lang('global.new')
                            <i class="fe fe-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-12">
                <div class="card custom-card main-content-body-profile">
                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('global.details')
                            </div>

                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <!-- Table -->
                                    <tbody class="p-0">
                                    <!-- Header -->
                                    <tr>
                                        <th><strong>#: </strong></th>
                                        <th><strong>@lang('pages.hostel.roomNumber'): </strong></th>
                                        <th><strong>@lang('pages.hostel.roomSection'): </strong></th>
                                        <th><strong>@lang('pages.hostel.numOfMembers'): </strong></th>
                                        <th><strong>@lang('global.extraInfo'): </strong></th>
                                    </tr>

                                    <!-- Body -->
                                    <tr>
                                        <td>{{ $hostel->id }}</td>
                                        <td>{{ $hostel->number }}</td>
                                        <td>{{ $hostel->section }}</td>
                                        <td>
                                            @php
                                                if (!$hostel->employees || $hostel->employees->count() == 0) {
                                                    $count_number = 0;
                                                } elseif ($hostel->employees->count() == 1) {
                                                    $count_number = 20;
                                                } elseif ($hostel->employees->count() == 2) {
                                                    $count_number = 40;
                                                } elseif ($hostel->employees->count() == 3) {
                                                    $count_number = 60;
                                                } elseif ($hostel->employees->count() == 4) {
                                                    $count_number = 80;
                                                } elseif ($hostel->employees->count() == 5) {
                                                    $count_number = 100;
                                                } else {
                                                    $count_number = 0;
                                                }
                                            @endphp
                                            <div class="progress mb-1">
                                                <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{ $count_number }}" class="progress-bar progress-bar-lg wd-{{ $count_number }}p bg-info" role="progressbar">{{ count($hostel->employees) }}</div>
                                            </div>
                                        </td>
                                        <td>{{ $hostel->info }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Table -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Row Content -->

        <!-- Employees -->
        <div class="card custom-card main-content-body-profile">
            <!-- Table Title -->
            <div class="nav main-nav-line mb-2">
                <a class="nav-link active" data-toggle="tab" href="javascript:void(0);">
                    @lang('admin.sidebar.employees')
                </a>
            </div>

            <div class="card-body tab-content h-100">
                <!-- Main Position Employees -->
                <div class="tab-pane active">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('form.photo')</th>
                                <th>@lang('form.idCard')</th>
                                <th>@lang('form.name')</th>
                                <th>@lang('form.fatherName')</th>
                                <th>@lang('form.position')</th>
                                <th>@lang('pages.positions.positionCode')</th>
                                <th>@lang('form.empNumber')</th>
                                <th>@lang('form.birthYear')</th>
                                <th>@lang('form.education')</th>
                                <th>@lang('form.phone')</th>
                                <th>@lang('form.mainProvince')</th>
                                <th>@lang('form.currentProvince')</th>
                                <th>@lang('form.onDuty')/@lang('pages.employees.mainPosition')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($hostel->employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>
                                        <a href="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                            <img src="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}" width="50" class="rounded-50">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $employee->taz ?? asset('assets/images/id-card-default.png') }}" target="_blank">
                                            <img src="{{ $employee->taz ?? asset('assets/images/id-card-default.png') }}" width="50" class="rounded-50">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->name }} {{ $employee->last_name }}</a>
                                    </td>
                                    <td>{{ $employee->father_name ?? '' }}</td>
                                    <td>{{ $employee->position->title ?? '' }} - {{ $employee->position->position_number ?? '' }}</td>
                                    <td>{{ $employee->position->code ?? '' }}</td>
                                    <td>{{ $employee->emp_number ?? '' }}</td>
                                    <td>{{ $employee->birth_year ?? '' }}</td>
                                    <td>{{ $employee->education ?? '' }}</td>
                                    <!-- Phone Number -->
                                    <td class="tx-sm-12-f">
                                        <a href="callto:{{ $employee->phone ?? '' }}" class="ctd">{{ $employee->phone ?? '' }}</a>
                                        <a href="callto:{{ $employee->phone2 ?? '' }}" class="ctd">{{ $employee->phone2 ?? '' }}</a>
                                    </td>
                                    <td>{{ $employee->main_province ?? '' }}</td>
                                    <td>{{ $employee->current_province ?? '' }}</td>
                                    <td>{{ $employee->on_duty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }} {{ $employee->duty_position ? ' - ' : '' }} {{ $employee->duty_position ?? '' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--/==/ End of Table -->
                </div>
                <!--/==/ End of Main Position Employees -->
            </div>
        </div>
        <!--/==/ End of Employees -->
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
    <script src="{{ asset('backend/assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
