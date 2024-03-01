@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'حساب کاربری سیستم اسیکودا - ' . $asycuda_user->employee->name . ' ' . $asycuda_user->employee->last_name)
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
                <h2 class="main-content-title tx-24 mg-b-5">حساب کاربری سیستم اسیکودا</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    @can('office_employee_view')
                        <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    @else
                        <li class="breadcrumb-item">@lang('admin.sidebar.employees')</li>
                    @endcan
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.asycuda.users.index') }}">حسابات کاربری سیستم اسیکودا</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                @if($asycuda_user->status == 1)
                    <div class="d-flex">
                        @can('asy_user_delete')
                            <div class="mr-2">
                                <!-- Delete -->
                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                   data-effect="effect-sign" data-toggle="modal"
                                   href="#delete_record{{ $asycuda_user->id }}">
                                    <i class="fe fe-trash"></i>
                                    @lang('global.delete')
                                </a>

                                @include('admin.asycuda.users.delete')
                            </div>
                        @endcan

                        @can('asy_user_edit')
                            <div class="mr-2">
                                <!-- Edit -->
                                <a class="btn ripple bg-dark btn-sm tx-white"
                                   href="{{ route('admin.asycuda.users.edit', $asycuda_user->id) }}">
                                    <i class="fe fe-edit"></i>
                                    @lang('global.edit')
                                </a>
                            </div>
                        @endcan

                        @can('asy_user_create')
                            <div class="mr-2">
                                <!-- Add -->
                                <a class="btn ripple bg-primary btn-sm tx-white"
                                   href="{{ route('admin.asycuda.users.create') }}">
                                    <i class="fe fe-plus-circle"></i>
                                    @lang('global.add')
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
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
                                <img alt="avatar"
                                     src="{{ $asycuda_user->employee->image ?? asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>

                        <!-- Main Info -->
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }}</span>
                            </h4>

                            <!-- Position -->
                            @can('office_position_view')
                                <a href="{{ route('admin.office.positions.show', $asycuda_user->employee->position->id) }}" target="_blank" class="pro-user-desc mb-1">{{ $asycuda_user->employee->position->title ?? '' }}</a>
                            @else
                                <p class="pro-user-desc text-muted mb-1">{{ $asycuda_user->employee->position->title ?? '' }}</p>
                            @endcan
                            @if($asycuda_user->employee->on_duty == 1)
                                <p class="pro-user-desc text-muted mb-1">{{ $asycuda_user->employee->duty_position ?? '' }}</p>
                            @endif

                            @if($asycuda_user->employee->position->position_number == 2 || $asycuda_user->employee->position->position_number == 3)
                            @else
                                <p class="pro-user-desc text-primary mb-1">({{ $asycuda_user->employee->position->type ?? '' }})</p>
                            @endif
                            <!-- Employee Star -->
                            @if($asycuda_user->employee->position)
                                <p class="user-info-rating">
                                    @for($i=1; $i<=$asycuda_user->employee->position->position_number; $i++)
                                        <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    @endfor
                                </p>
                            @endif
                            <!--/==/ End of Employee Star -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->

                <!-- Contact Information -->
                <div class="card custom-card">
                    <div class="card-header custom-card-header">
                        <div>
                            <h6 class="card-title mb-0">
                                اطلاعات
                            </h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="main-profile-contact-list main-profile-work-list">
                            <!-- Status -->
                            <div class="media">
                                <div class="media-logo bg-light text-dark">
                                    <i class="fe fe-message-square"></i>
                                </div>
                                <div class="media-body">
                                    <span>@lang('form.status')</span>
                                    <div>
                                        @if($asycuda_user->status == 1)
                                            <a class="updateAsyUserStatus" id="asy_user_status"
                                               asy_user_id="{{ $asycuda_user->id }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-on text-success" aria-hidden="true"
                                                   status="Active"></i>
                                            </a>
                                        @else
                                            <a class="updateAsyUserStatus" id="asy_user_status"
                                               asy_user_id="{{ $asycuda_user->id }}" href="javascript:void(0)">
                                                <i class="fa fa-toggle-off text-danger" aria-hidden="true"
                                                   status="Inactive"></i>
                                            </a>
                                        @endif
                                        <span id="update_status" style="display: none;">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </span>
                                    </div>

                                    @if($asycuda_user->status == 1)
                                        <span class="text-info">فعال</span>
                                    @else
                                        <span class="text-danger">غیرفعال</span>
                                    @endif
                                </div>
                            </div>
                            <!--/==/ End of Status -->

                            <!-- Phone Number -->
                            <div class="media">
                                <div class="media-logo bg-light text-dark">
                                    <i class="fe fe-smartphone"></i>
                                </div>
                                <div class="media-body">
                                    <span>@lang('form.phone')</span>
                                    <div>
                                        <a href="callto:{{ $asycuda_user->employee->phone }}" class="ctd">{{ $asycuda_user->employee->phone }}</a>
                                        @if(!empty($employee->phone2))
                                            , <a href="callto:{{ $asycuda_user->employee->phone2 }}"
                                                 class="ctd">{{ $asycuda_user->employee->phone2 }}</a>
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
                                        <a href="mailto:{{ $asycuda_user->employee->email }}" class="ctd">{{ $asycuda_user->employee->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Email Address -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Contact Information -->
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card custom-card main-content-body-profile">

                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2">
                            <!-- Personal Information -->
                            <div class="main-content-label tx-13 mg-b-20 bd-b tx-bold pb-2">
                                @lang('global.details')
                            </div>
                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <!-- First Table -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="5" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </td>
                                    </tr>

                                    <!-- First Row -->
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>@lang('form.name')</strong></th>
                                        <th><strong>تخلص</strong></th>
                                        <th><strong>نام پدر</strong></th>
                                        <th><strong>نمبر سوانح</strong></th>
                                    </tr>
                                    <tr>
                                        <td>{{ $asycuda_user->id }}</td>
                                        <td>
                                            @can('employee_view')
                                                <a href="{{ route('admin.office.employees.show', $asycuda_user->employee->id) }}">
                                                    {{ $asycuda_user->employee->name }}
                                                </a>
                                            @else
                                                {{ $asycuda_user->employee->name }}
                                            @endcan
                                        </td>
                                        <td>{{ $asycuda_user->employee->last_name }}</td>
                                        <td>{{ $asycuda_user->employee->father_name }}</td>
                                        <td>{{ $asycuda_user->employee->emp_number }}</td>
                                    </tr>

                                    <!-- Second Row -->
                                    <tr>
                                        <th><strong>@lang('form.phone')</strong></th>
                                        <th><strong>اصل بست</strong></th>
                                        <th><strong>بست خدمتی</strong></th>
                                        <th><strong>کد گمرک</strong></th>
                                        <th><strong>موقعیت</strong></th>
                                    </tr>
                                    <tr>
                                        <td>{{ $asycuda_user->employee->phone }}</td>
                                        <td>{{ $asycuda_user->employee->position->title }}</td>
                                        <td>{{ $asycuda_user->employee->duty_position }}</td>
                                        <td>{{ $asycuda_user->employee->position->custom_code }}</td>
                                        <td>{{ $asycuda_user->employee->position->type }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of First Table -->

                                    <!-- Second Table -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="5" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">2</span>
                                            معلومات یوزر
                                        </td>
                                    </tr>

                                    <!-- First Row -->
                                    <tr>
                                        <th><strong>تاریخ ایجاد</strong></th>
                                        <th><strong>یوزر</strong></th>
                                        <th><strong>رمز عبور</strong></th>
                                        <th><strong>صلاحیت ها</strong></th>
                                        <th><strong>وضعیت</strong></th>
                                    </tr>
                                    <tr>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($asycuda_user->created_at)) }}</td>
                                        <td>{{ $asycuda_user->user }}</td>
                                        <td>{{ $asycuda_user->password }}</td>
                                        <td>{{ $asycuda_user->roles }}</td>
                                        <td>{{ $asycuda_user->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Second Table -->
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->
                            <p>{{ $asycuda_user->info }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->

                        <h4>سابقه کاری کارمند</h4>
                        <br>

                        <!-- Experiences Table -->
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">وضعیت حساب کاربری</th>
                                    <th class="text-center">صلاحیت های حساب کاربری</th>
                                    <th class="text-center">بست</th>
                                    <th class="text-center">نوع بست</th>
                                    <th class="text-center">تاریخ شروع</th>
                                    <th class="text-center">تاریخ ختم</th>
                                    <th class="text-center">نمبر مکتوب</th>
                                    <th class="text-center">مکتوب</th>
                                    <th class="text-center">@lang('global.extraInfo')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($experiences as $exp)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $exp->asy_user_status == 1 ? 'فعال' : 'غیرفعال' }}</td>
                                        <td>{{ $exp->asy_user_roles }}</td>
                                        <td>{{ $exp->position }}</td>
                                        <td>{{ $exp->position_type == 1 ? 'خدمتی' : 'اصل بست' }}</td>
                                        <td>{{ $exp->start_date }}</td>
                                        <td>{{ $exp->end_date ?? 'در حال انجام وظیفه' }}</td>
                                        <td>{{ $exp->doc_number }}</td>
                                        <td>
                                            <a href="{{ asset('storage/employees/documents/' . $exp->document) }}" target="_blank">
                                                <img src="{{ asset('storage/employees/documents/' . $exp->document) }}" alt="{{ $exp->employee->name }}" width="80">
                                            </a>
                                        </td>
                                        <td>{{ $exp->info }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Experiences Table -->
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
