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
                        <a href="{{ route('admin.positions.index') }}">@lang('pages.positions.positions')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">{{ $position->title }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $position->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.positions.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.positions.edit', $position->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.positions.create') }}">
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
            <div class="col-lg-4 col-md-12">
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
            <div class="col-lg-8 col-md-12">
                <div class="card custom-card main-content-body-profile">

                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2 bd">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('pages.employees.generalInfo')
                            </div>

                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Title -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.title'):</th>
                                        <td>{{ $position->title }}</td>
                                    </tr>

                                    <!-- Manager -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.officials_emps'):</th>
                                        <td>
                                            {{ $position->employees()->count() == 0 ? trans('global.empty') : '' }}
                                            @foreach($position->employees as $employee)
                                                <a href="{{ route('admin.employees.show', $employee->id) }}" class="">
                                                    {{ $employee->name }} {{ $employee->last_name }}
                                                    {{ $position->num_of_pos > 1 ? ', ' : '' }}
                                                </a>
                                            @endforeach
                                        </td>
                                    </tr>

                                    <!-- Under Hand -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.underHand'):</th>
                                        <td>{{ $position->parent->title ?? trans('pages.positions.afCustomsDep') }}</td>
                                    </tr>

                                    <!-- Status -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.status'):</th>
                                        <td>
                                            <span class="acInText">
                                                <span id="acInText"
                                                      class="{{ $position->status == 1 ? 'text-success' : 'text-danger' }}">
                                                    {{ $position->status == 1 ? trans('global.active') : trans('global.inactive') }}
                                                </span>
                                            </span>
                                            ----
                                            @if($position->status == 1)
                                                <a class="updatePositionStatus" id="position_status"
                                                   position_id="{{ $position->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                       status="Active"></i>
                                                </a>
                                            @else
                                                <a class="updatePositionStatus" id="position_status"
                                                   position_id="{{ $position->id }}" href="javascript:void(0)">
                                                    <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                       status="Inactive"></i>
                                                </a>
                                            @endif
                                            <span id="update_status" style="display: none;">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </span>
                                        </td>
                                    </tr>

                                    </tbody>

                                    <!-- Left Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Number of Positions -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.num_of_pos'):</th>
                                        <td>{{ $position->num_of_pos }}</td>
                                    </tr>

                                    <!-- Position Number -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.positionNumber'):</th>
                                        <td>{{ $position->position_number }}</td>
                                    </tr>

                                    <!-- Number of empty positions -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.positions.num_of_empty_pos'):</th>
                                        <td>
                                            {{ $position->num_of_pos - $position->employees()->count() }}
                                        </td>
                                    </tr>

                                    <!-- Date of creation -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('global.date'):</th>
                                        <td>{{ $position->created_at->diffForHumans() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <div class="main-content-label tx-13 mg-b-20 pt-2" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{{ $position->desc ?? '--' }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->
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
                                        <a href="{{ route('admin.employees.show', $employee->id) }}">{{ $employee->name }} {{ $employee->last_name }}</a>
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
                <!--/==/ End of Main Position Employees -->
            </div>
        </div>
        <!--/==/ End of Employees -->

        <!-- Organization -->
        <div class="card custom-card">
            <div class="card-body">
                <div class="p-2 bd">
                    <div class="main-content-label tx-13 mg-b-20">
                        @if(app()->getLocale() == 'en')
                            {{ $position->title }} @lang('pages.positions.organization')
                        @else
                            @lang('pages.positions.organization') {{ $position->title }}
                        @endif
                    </div>

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
