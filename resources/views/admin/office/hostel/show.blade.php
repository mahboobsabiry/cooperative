@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'اتاق نمبر ' . $hostel->number . ' بخش ' . $hostel->place->name)
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
                        <a href="{{ route('admin.office.hostel.index') }}">@lang('pages.hostel.hostel')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('office_hostel_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $hostel->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.office.hostel.delete')
                        </div>
                    @endcan

                    @can('office_hostel_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.office.hostel.edit', $hostel->id) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                    @endcan

                    @can('office_hostel_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.office.hostel.create') }}">
                                @lang('global.new')
                                <i class="fe fe-plus-circle"></i>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $hostel->number . ' ' . $hostel->section }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fa fa-building"></i> لیلیه
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($hostel->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details Card -->
                <div class="card mb-2">
                    <div class="card-header tx-15 tx-bold mg-b-20">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Hostel Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات عمومی</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $hostel->id }}</div>
                                </div>

                                <!-- Place -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">موقعیت:</p>
                                    </div>
                                    <div class="col">{{ $hostel->place->name }}</div>
                                </div>

                                <!-- Room Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">نمبر اتاق:</p>
                                    </div>
                                    <div class="col">{{ $hostel->number }}</div>
                                </div>

                                <!-- Room Section -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"> سکشن:</p>
                                    </div>
                                    <div class="col">{{ $hostel->section }}</div>
                                </div>

                                <!-- Number of Employees In the room -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">تعداد اعضای اتاق:</p>
                                    </div>
                                    <div class="col">
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
                                            <div aria-valuemax="100" aria-valuemin="0"
                                                 aria-valuenow="{{ $count_number }}"
                                                 class="progress-bar progress-bar-lg wd-{{ $count_number }}p bg-info"
                                                 role="progressbar">{{ count($hostel->employees) }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $hostel->info ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Position Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details Card -->

                <!-- Employees -->
                <div class="card mb-2">
                    <!-- Table Title -->
                    <div class="card-header">
                        <h5 class="card-title tx-15 tx-bold">
                            @lang('admin.sidebar.employees')
                        </h5>
                    </div>

                    <div class="card-body tab-content h-100">
                        <!-- Main Position Employees -->
                        <div class="tab-pane active">
                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100"
                                       style="width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>اتاق</th>
                                        <th>@lang('form.photo')</th>
                                        <th>@lang('form.name')</th>
                                        <th>@lang('form.fatherName')</th>
                                        <th>@lang('form.position')</th>
                                        <th>@lang('pages.positions.positionCode')</th>
                                        <th>@lang('form.empNumber')</th>
                                        <th>@lang('form.education')</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('form.currentProvince')</th>
                                        <th>@lang('form.onDuty')/@lang('pages.employees.mainPosition')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($hostel->employees as $employee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $hostel->section . $hostel->number . ' - ' . $hostel->place }}</td>
                                            <!-- Avatar -->
                                            <td>
                                                <a href="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}"
                                                   target="_blank">
                                                    <img src="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}"
                                                         width="50" class="rounded-50">
                                                </a>
                                            </td>
                                            <!-- Full Name -->
                                            <td>
                                                @can('office_employee_view')
                                                    <a href="{{ route('admin.office.employees.show', $employee->id) }}">{{ $employee->name }} {{ $employee->last_name }}</a>
                                                @else
                                                    {{ $employee->name }} {{ $employee->last_name }}
                                                @endcan
                                            </td>
                                            <td>{{ $employee->father_name ?? '' }}</td>
                                            <td>{{ $employee->position->title ?? '' }}
                                                - {{ $employee->position->position_number ?? '' }}</td>
                                            <td>{{ $employee->position_code->code ?? '' }}</td>
                                            <td>{{ $employee->emp_number ?? '' }}</td>
                                            <td>{{ $employee->education ?? '' }}</td>
                                            <!-- Phone Number -->
                                            <td class="tx-sm-12-f">
                                                <a href="callto:{{ $employee->phone ?? '' }}"
                                                   class="ctd">{{ $employee->phone ?? '' }}</a>
                                                <a href="callto:{{ $employee->phone2 ?? '' }}"
                                                   class="ctd">{{ $employee->phone2 ?? '' }}</a>
                                            </td>
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
        </div>
        <!--/==/ End of Row Content -->
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
