@extends('layouts.admin.master')
<!-- Title -->
@section('title', $position->title)
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    @if(app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @endif
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ $position->title }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.positions.index') }}">@lang('pages.positions.positions')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{ $position->title }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <!-- Delete -->
                    @can('office_position_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $position->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.office.positions.delete')
                        </div>
                    @endcan

                    @can('office_position_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.office.positions.edit', $position->id) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                    @endcan

                    @can('office_position_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.office.positions.create') }}">
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
            <div class="col-lg-3 col-md-12">
                <!-- Profile Main Info -->
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user">
                                @if($position->num_of_pos == 1)
                                    <a href="{{ $position->employees->first()->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                        <img alt="avatar" src="{{ $position->employees->first()->image ?? asset('assets/images/avatar-default.jpeg') }}">
                                    </a>
                                @else
                                    <a href="{{ asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                        <img alt="avatar" src="{{ asset('assets/images/avatar-default.jpeg') }}">
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                @if($position->num_of_pos == 1)
                                    <span>{{ $position->employees->first()->name ?? trans('global.empty') }} {{ $position->employees->first()->last_name ?? '' }}</span>
                                @else
                                    <span>{{ $position->title }}</span>
                                @endif

                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $position->title }}</p>
                            @if($position->position_number == 2 || $position->position_number == 3)
                            @else
                                <p class="pro-user-desc text-primary mb-1">(@if($position->place == 0) محصولی  @elseif($position->place == 1) سرحدی @elseif($position->place == 2) نایب آباد@elseif($position->place == 3)  میدان هوایی  @elseif($position->place == 4) مراقبت سیار@endif)</p>
                            @endif
                            <!-- Position Star -->
                            <p class="user-info-rating">
                                @for($i=1; $i<=$position->position_number; $i++)
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                @endfor
                            </p>
                            <!--/==/ End of Position Star -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                @if($position->num_of_pos == 1)
                    <div class="card custom-card">
                        <div class="card-header custom-card-header">
                            <div>
                                <h6 class="card-title mb-0">
                                    @lang('pages.users.contactInfo')
                                </h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="main-profile-contact-list main-profile-work-list">
                                <!-- Phone Number -->
                                <div class="media">
                                    <div class="media-logo bg-light text-dark">
                                        <i class="fe fe-smartphone"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>@lang('form.phone')</span>
                                        <div>
                                            <a href="callto:{{ $position->employees->first()->phone ?? '' }}"
                                               class="ctd">{{ $position->employees->first()->phone ?? '--- ---- ---' }}</a>
                                            <a href="callto:{{ $position->employees->first()->phone2 ?? '' }}"
                                               class="ctd">{{ $position->employees->first()->phone2 ?? '' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/==/ End of Phone Number -->

                                <!-- Email Address -->
                                <div class="media">
                                    <div class="media-logo bg-light text-dark">
                                        <i class="fe fe-mail"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>@lang('form.email')</span>
                                        <div>
                                            <a href="mailto:{{ $position->employees->first()->email ?? '' }}"
                                               class="ctd">{{ $position->employees->first()->email ?? '----@---.--' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/==/ End of Email Address -->
                            </div>
                        </div>
                    </div>
                @endif
                <!--/==/ End of Contact Information -->
            </div>
            <div class="col-lg-9 col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Details Card -->
                <div class="card mb-2">
                    <div class="card-header">
                        <h4 class="card-title font-weight-bold">@lang('global.details')</h4>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Account Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات بست</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $position->id }}</div>
                                </div>

                                <!-- Parent -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">زیر دستٍ:</p>
                                    </div>
                                    <div class="col">{{ $position->parent->title ?? 'ریاست عمومی گمرکات' }}</div>
                                </div>

                                <!-- Position Title -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">عنوان بست:</p>
                                    </div>
                                    <div class="col">{{ $position->title }}</div>
                                </div>

                                <!-- Position Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">نمبر بست:</p>
                                    </div>
                                    <div class="col">{{ $position->position_number }}</div>
                                </div>

                                <!-- Number of Positions -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">تعداد بست:</p>
                                    </div>
                                    <div class="col">{{ $position->num_of_pos }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $position->info ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Position Information -->

                            <!-- General Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات عمومی</h6>
                                <!-- Place -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">موقعیت:</p>
                                    </div>
                                    <div class="col">
                                        @if($position->place == 0) محصولی  @elseif($position->place == 1) سرحدی @elseif($position->place == 2) نایب آباد@elseif($position->place == 3)  میدان هوایی  @elseif($position->place == 4) مراقبت سیار@endif
                                    </div>
                                </div>

                                <!-- Custom Code -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">کد گمرکی:</p>
                                    </div>
                                    <div class="col">{{ $position->custom_code }}</div>
                                </div>

                                <!-- Number of Underhand Positions -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تعداد بست های زیردست:</p>
                                    </div>
                                    <div class="col">{{ $position->children->count() }}</div>
                                </div>

                                <!-- Number of Employees -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تعداد کارمندان این بست:</p>
                                    </div>
                                    <div class="col">{{ $position->employees->count() }}</div>
                                </div>

                                <!-- Number of Empty Positions -->
                                @if($position->position_number > 4)
                                    <div class="row">
                                        <div class="col-6 col-sm-5">
                                            <p class="fw-semi-bold mb-1">تعداد بست خالی:</p>
                                        </div>
                                        <div class="col">
                                            {{ $position->num_of_pos }}
                                            @if($position->employees->count() < $position->num_of_pos)
                                                {<span class="text-danger small">@lang('global.empty')</span>}
                                            @elseif($position->employees->count() == $position->num_of_pos)

                                            @elseif($position->employees->count() > $position->num_of_pos)
                                                {<span class="text-danger small">{{ $position->employees->count() - $position->num_of_pos }} @lang('global.empty')</span>}
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!--/==/ End of General Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details Card -->

                <!-- Employees Card -->
                <div class="card mb-2">
                    <div class="card-header">
                        <h4 class="card-title font-weight-bold">@lang('admin.sidebar.employees')</h4>
                    </div>

                    <div class="card-body">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTable export-table border-top key-buttons display text-nowrap w-100" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.name')</th>
                                    <th>@lang('form.fatherName')</th>
                                    <th>@lang('form.position')</th>
                                    <th>@lang('form.positionCode')</th>
                                    <th>@lang('form.phone')</th>
                                    <th>@lang('form.currentProvince')</th>
                                    <th>@lang('form.currentDistrict')</th>
                                    <th>@lang('form.onDuty')/@lang('pages.employees.mainPosition')</th>
                                    <th>@lang('form.introducer')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($position->employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>
                                            @can('office_employee_view')
                                                <a href="{{ route('admin.office.employees.show', $employee->id) }}">{{ $employee->name }} {{ $employee->last_name }}</a>
                                            @else
                                                {{ $employee->name }} {{ $employee->last_name }}
                                            @endcan
                                        </td>
                                        <td>{{ $employee->father_name ?? '' }}</td>
                                        <td>{{ $employee->position->title ?? '' }} {{ $employee->position->position_number ?? '' }}</td>
                                        <td>{{ $employee->position_code ?? '' }}</td>
                                        <td class="tx-sm-12-f">
                                            <a href="callto:{{ $employee->phone ?? '' }}" class="ctd">{{ $employee->phone ?? '' }}</a>
                                        </td>
                                        <td>{{ $employee->current_province ?? '' }}</td>
                                        <td>{{ $employee->current_district ?? '' }}</td>
                                        <td>
                                            {{ $employee->on_duty == 0 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}
                                            {{ $employee->duty_position ? ' - ' : '' }}
                                            {{ $employee->duty_position ?? '' }}
                                        </td>
                                        <td>{{ $employee->introducer ?? '' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Table -->
                    </div>
                </div>
                <!--/==/ End of Employees Card -->
            </div>
        </div>
        <!--/==/ End of Row Content -->

        <!-- Organization -->
        <div class="card mb-2">
            <div class="card-header">
                <h4 class="card-title font-weight-bold">
                    @if(app()->getLocale() == 'en')
                        {{ $position->title }} @lang('pages.positions.organization')
                    @else
                        @lang('pages.positions.organization') {{ $position->title }}
                    @endif
                </h4>
            </div>
            <div class="card-body">
                <div class="p-2 bd">
                    <div class="container">
                        <div class="row">
                            <div class="tree m-2">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)"
                                           style="background: burlywood; color: black;">{{ $position->parent ? $position->parent->title : trans('pages.positions.afCustomsDep') }}</a>
                                        <ul>
                                            <a href="javascript:void(0);" target="_self">{{ $position->title }} ({{ $position->num_of_pos }})</a>
                                            <ul>
                                                @foreach($position->children as $child)
                                                    <li>
                                                        <a href="javascript:void(0)"
                                                           style="background: #ba8b00; color: beige">{{ $child->title }} ({{ $child->num_of_pos }})</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Organization -->
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

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
