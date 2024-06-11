@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'سوابق کاری ' . $employee->name . ' ' . $employee->last_name)
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.employees.employeeInfo')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.employees.show', $employee->id) }}">@lang('pages.employees.employeeInfo')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">سوابق کارمند</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

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
                                <img alt="avatar"
                                     src="{{ $employee->image ?? asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>

                        <!-- Main Info -->
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $employee->name }} {{ $employee->last_name }}</span>
                            </h4>

                            @if($employee->status == 0)
                                <!-- Position -->
                                @can('office_position_view')
                                    <a href="{{ route('admin.office.positions.show', $employee->position->id) }}" target="_blank" class="pro-user-desc mb-1">{{ $employee->position->title }} ({{ $employee->position->place }})</a>
                                @else
                                    <p class="pro-user-desc text-muted mb-1">{{ $employee->position->title ?? '' }} ({{ $employee->position->place }})</p>
                                @endcan
                                @if($employee->on_duty == 1)
                                    <p class="pro-user-desc text-muted mb-1">{{ $employee->duty_position ?? '' }}</p>
                                @endif
                                <!-- Employee Star -->
                                <p class="user-info-rating">
                                    @for($i=1; $i<=$employee->position->position_number; $i++)
                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    @endfor
                                </p>
                                <!--/==/ End of Employee Star -->
                            @else
                                <span class="text-danger">
                                    @if($employee->status == 1)
                                        تقاعد نموده است
                                    @elseif($employee->status == 2)
                                        منفک گردیده است
                                    @elseif($employee->status == 3)
                                        تبدیل گردیده است
                                    @elseif($employee->status == 4)
                                        معلق
                                    @elseif($employee->status == 5)
                                        از اداره/ارگان دیگر طور خدمتی آمده است.
                                        <br>
                                        @if($employee->on_duty == 1)
                                            <p class="pro-user-desc text-muted mb-1">{{ $employee->duty_position ?? '' }}</p>
                                        @endif
                                    @endif
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div>
                            <h6 class="card-title mb-0">
                                اطلاعات لازم
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
                                        <a href="callto:{{ $employee->phone }}" class="ctd">{{ $employee->phone }}</a>
                                        @if(!empty($employee->phone2))
                                            , <a href="callto:{{ $employee->phone2 }}"
                                                 class="ctd">{{ $employee->phone2 }}</a>
                                        @endif
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
                                        <a href="mailto:{{ $employee->email }}" class="ctd">{{ $employee->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Email Address -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Contact Information -->

                <!-- BUTTONS -->
                <div class="card custom-card">
                    <div class="overflow-auto justify-content-center p-2">
                        <!-- Action Buttons -->
                        <h5>دکمه های کاربردی</h5>
                        <div class="row m-2">
                            <!-- Duty Position -->
                            @if($employee->status == 0 || $employee->status == 5)
                                <!-- Change to main/duty position -->
                                @can('office_employee_edit')
                                    <a class="btn btn-outline-info m-1"
                                       href="{{ route('admin.office.employees.add_duty_position', $employee->id) }}">@lang('pages.employees.onDuty')</a>
                                    @if($employee->status == 0)
                                        @if($employee->on_duty == 1)
                                            <a class="btn btn-outline-success m-1" href="{{ route('admin.office.employees.change_to_main_position', $employee->id) }}">تبدیل به اصل بست</a>
                                        @endif

                                        <!-- Retire Employee -->
                                        @if($age >= 65)
                                            <a class="btn btn-outline-success m-1" href="{{ route('admin.office.employees.retire_position', $employee->id) }}">تقاعد</a>
                                        @endif

                                        <!-- Fire Employee -->
                                        <a class="modal-effect btn btn-outline-danger m-1" data-effect="effect-sign" data-toggle="modal"
                                           href="#fire_employee{{ $employee->id }}">منفک</a>

                                        <!-- Change Position Employee -->
                                        <a class="btn btn-outline-dark m-1" href="{{ route('admin.office.employees.position_conversion', $employee->id) }}">تبدیل بست</a>
                                    @endif
                                @endcan

                                @include('admin.office.employees.inc.modals')
                            @else
                            @endif
                        </div>
                        <!--/==/ End of Action Buttons -->
                    </div>
                </div>
                <!--/==/ End of BUTTONS -->
            </div>

            <div class="col-lg-9 col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <div class="card">
                    <!-- Header -->
                    <div class="card-header row">
                        <div class="col-md-6">
                            <div class="font-weight-bold">سوابق کاری کارمند (<span class="text-info">شروع وظیفه در این ریاست از تاریخ {{ $employee->start_job }}</span>)</div>
                        </div>
                        <div class="col-md-6 text-left">

                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">بست</th>
                                    <th class="text-center">نوع بست</th>
                                    <th class="text-center">تاریخ شروع</th>
                                    <th class="text-center">تاریخ ختم</th>
                                    <th class="text-center">نمبر مکتوب</th>
                                    <th class="text-center"> مکتوب</th>
                                    <th class="text-center">@lang('global.extraInfo')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($employee->resumes as $resume)
                                    <tr>
                                        <td>{{ $resume->id }}</td>
                                        <td>{{ $resume->position }}</td>
                                        <td>{{ $resume->position_type == 1 ? 'خدمتی' : 'اصل بست' }}</td>
                                        <td>{{ $resume->start_date }}</td>
                                        <td>{{ $resume->end_date ?? 'در حال انجام وظیفه' }}</td>
                                        <td>{{ $resume->doc_number }}</td>
                                        <td>
                                            <a href="{{ $resume->image ?? asset('assets/images/id-card-default.png') }}" target="_blank">
                                                <img src="{{ $resume->image ?? asset('assets/images/id-card-default.png') }}" alt="{{ $resume->employee->name }}" width="80">
                                            </a>
                                        </td>
                                        <td>{{ $resume->info }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('assets/js/datatable.js') }}"></script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
