@extends('layouts.admin.master')
<!-- Title -->
@section('title', $employee->name . ' ' . $employee->last_name)
<!-- Extra Styles -->
@section('extra_css')
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.employees.employeeInfo')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.employees.index') }}">@lang('admin.sidebar.employees')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.employees.employeeInfo')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $employee->id }}"
                           title="@lang('pages.employees.deleteEmployee')">
                            <i class="fe fe-trash"></i>
                            @lang('global.delete')
                        </a>

                        @include('admin.employees.delete')
                    </div>

                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm tx-white"
                           href="{{ route('admin.employees.edit', $employee->id) }}">
                            <i class="fe fe-edit"></i>
                            @lang('global.edit')
                        </a>
                    </div>

                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple bg-primary btn-sm tx-white"
                           href="{{ route('admin.employees.create') }}">
                            <i class="fe fe-plus-circle"></i>
                            @lang('global.add')
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
                                <img alt="avatar" src="{{ $employee->image ? $employee->image : asset('assets/images/avatar-default.jpeg') }}">
                            </div>
                        </div>

                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $employee->name }} {{ $employee->last_name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $employee->position->title ?? '' }}</p>
                            <!-- Employee Star -->
                            @if($employee->position)
                                <p class="user-info-rating">
                                    @for($i=1; $i<=$employee->position->position_number; $i++)
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
                                    <!-- First Row -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="6" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </td>
                                    </tr>

                                    <!-- Name, Last Name & Father Name -->
                                    <tr>
                                        <th><strong>@lang('form.name') :</strong></th>
                                        <th><strong>@lang('form.lastName') :</strong></th>
                                        <th><strong>@lang('form.fatherName') :</strong></th>
                                        <th><strong>@lang('form.gender') :</strong></th>
                                        <th><strong>@lang('form.birthYear') :</strong></th>
                                        <th><strong>@lang('form.empNumber') :</strong></th>
                                    </tr>

                                    <!-- Gender, Birth Year & Employee Number -->
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->last_name }}</td>
                                        <td>{{ $employee->father_name }}</td>
                                        <td>{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</td>
                                        <td>{{ $employee->birth_year }} ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }} ساله)</td>
                                        <td>{{ $employee->emp_number }}</td>
                                    </tr>
                                    </tbody>

                                    <!-- Second Row -->
                                    <tbody>
                                    <tr>
                                        <th><strong>@lang('form.email'): </strong></th>
                                        <th><strong>@lang('form.phone'): </strong></th>
                                        <th><strong>@lang('form.appointmentNumber'): </strong></th>
                                        <th><strong>@lang('form.appointmentDate'): </strong></th>
                                        <th><strong>@lang('form.lastDuty'): </strong></th>
                                        <th><strong>@lang('pages.hostel.hostel')/@lang('global.home'): </strong></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="mailto:{{ $employee->email }}"
                                               class="ctd">{{ $employee->email }}</a>
                                        </td>
                                        <td>
                                            <a href="callto:{{ $employee->phone }}"
                                               class="ctd">{{ $employee->phone }}</a>
                                            @if($employee->phone2)
                                                , <a href="callto:{{ $employee->phone2 }}"
                                                     class="ctd">{{ $employee->phone2 }}</a>
                                            @endif
                                        </td>
                                        <td>{{ $employee->appointment_number }}</td>
                                        <td>{{ $employee->appointment_date }}</td>
                                        <td>{{ $employee->last_duty }}</td>
                                        <td>
                                            @if($employee->hostel)
                                                @lang('pages.hostel.hostel') -
                                                @lang('pages.hostel.roomNumber')
                                                {{ $employee->hostel->number }}
                                                @lang('pages.hostel.section')
                                                {{ $employee->hostel->section }}
                                            @else
                                                @lang('global.home')
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>

                                    <!-- Third Row -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="6" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">2</span>
                                            @lang('pages.employees.generalInfo')
                                        </td>
                                    </tr>

                                    <!-- Education, Last Name & Father Name -->
                                    <tr>
                                        <th><strong>@lang('form.education') :</strong></th>
                                        <th><strong>PRR/NPR :</strong></th>
                                        <th><strong>PRR Date :</strong></th>
                                        <th><strong>@lang('form.mainAddress') :</strong></th>
                                        <th><strong>@lang('form.curAddress') :</strong></th>
                                        <th><strong>@lang('form.introducer') :</strong></th>
                                    </tr>

                                    <!-- Gender, Birth Year & Employee Number -->
                                    <tr>
                                        <td>{{ $employee->education }}</td>
                                        <td>{{ $employee->prr_npr }}</td>
                                        <td>{{ $employee->prr_date }}</td>
                                        <td>{{ $employee->main_province }}, {{ $employee->main_district }}</td>
                                        <td>{{ $employee->current_province }}, {{ $employee->current_district }}</td>
                                        <td>{{ $employee->introducer }}</td>
                                    </tr>
                                    </tbody>

                                    <!-- Fourth Row -->
                                    <tbody>
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="6" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">3</span>
                                            @lang('pages.employees.otherInfo')
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"><strong>@lang('form.status'): </strong></th>
                                        <th colspan="3"><strong>@lang('global.extraInfo'): </strong></th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <span class="acInText">
                                                <span id="acInText" >
                                                    {{ $employee->status == 1 ? 'کارمند برحال این ریاست' : 'تبدیل شده به اداره/ارگان دیگر' }}
                                                </span>
                                            </span>
                                        </td>
                                        <td colspan="3">{{ $employee->info }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->

                            <!-- Position and Background -->
                            <div class="row border m-2">
                                <div class="col-md-6 border-left">
                                    <h6 class="font-weight-bold">@lang('form.background')</h6>
                                    <div>
                                        شروع وظیفه از تاریخ {{ $employee->start_job }} <br> {!! $employee->background ?? '--' !!}

                                    @if($employee->position)
                                        {{--                                            <a class="modal-effect text-primary"--}}
                                        {{--                                               data-effect="effect-sign" data-toggle="modal"--}}
                                        {{--                                               href="#add_background{{ $employee->id }}"><span class="underline">@lang('global.add')</span></a>--}}

                                        <a aria-controls="collapseAddBackground" aria-expanded="false" class="text-danger" data-toggle="collapse" href="#collapseAddBackground">@lang('global.add')</a>

                                        <div class="collapse mg-t-5" id="collapseAddBackground">
                                            <div class="card card-body">
                                                <!-- Header -->
                                                <div class="">
                                                    <h6 class="">@lang('pages.employees.addBackground') <i class="fe fe-plus-circle"></i></h6>
                                                </div>

                                                <!-- Form -->
                                                <form method="post" action="{{ route('admin.employees.add_background', $employee->id) }}" class="background_form">
                                                    @csrf
                                                    <div class="">
                                                        <!-- From Date -->
                                                        <div class="form-group @error('from_date') has-danger @enderror">
                                                            <p class="mb-2">1) @lang('form.fromDate'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="from_date" class="form-control @error('from_date') form-control-danger @enderror" name="from_date" value="{{ old('from_date') }}" required>

                                                            @error('from_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- To Date -->
                                                        <div class="form-group @error('to_date') has-danger @enderror" id="to_date_div">
                                                            <p class="mb-2">2) @lang('form.toDate'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="to_date" class="form-control @error('to_date') form-control-danger @enderror" name="to_date" value="{{ old('to_date') }}" required>

                                                            @error('to_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Document Number -->
                                                        <div class="form-group @error('doc_number') has-danger @enderror">
                                                            <p class="mb-2">3) @lang('pages.employees.docNumber'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                                                            @error('doc_number')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Document Date -->
                                                        <div class="form-group @error('doc_date') has-danger @enderror">
                                                            <p class="mb-2">4) @lang('pages.employees.docDate'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="doc_date" class="form-control @error('doc_date') form-control-danger @enderror" name="doc_date" value="{{ old('doc_date') }}" required>

                                                            @error('doc_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <!-- Position -->
                                                        <div class="form-group @error('bg_position') has-danger @enderror">
                                                            <p class="mb-2">5) @lang('form.position'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="bg_position" class="form-control @error('bg_position') form-control-danger @enderror" name="bg_position" value="{{ old('bg_position') }}" required>

                                                            @error('bg_position')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button class="btn ripple btn-primary" type="submit">@lang('global.save')</button>
                                                    </div>
                                                </form>
                                                <!--/==/ End of Form -->
                                            </div>
                                        </div>
                                        {{--                                            @include('admin.employees.inc.add_background')--}}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="font-weight-bold">@lang('form.background')</h6>
                                    <div>
                                        @if($employee->position)
                                            {{ $employee->position->position_number }} -
                                            <a href="{{ route('admin.positions.show', $employee->position->id) }}">
                                                {{ $employee->position->title }}
                                            </a> ({{ $employee->position_code }})

                                            @if($employee->on_duty == 0)
                                                [<a class="modal-effect text-danger"
                                                    data-effect="effect-sign" data-toggle="modal"
                                                    href="#duty_position{{ $employee->id }}">@lang('pages.employees.onDuty'){{ app()->getLocale() == 'en' ? '?' : '؟' }}</a>]

                                                @include('admin.employees.inc.duty_position')
                                            @else
                                                [@lang('pages.employees.onDuty') - {{ $employee->duty_position }}]
                                                <a class="modal-effect text-danger"
                                                   data-effect="effect-sign" data-toggle="modal"
                                                   href="#reset_position{{ $employee->id }}">تبدیل به اصل بست</a>

                                                @include('admin.employees.inc.reset_position')
                                            @endif
                                            <hr>
                                            <a class="modal-effect text-danger mt-2"
                                               data-effect="effect-sign" data-toggle="modal"
                                               href="#change_position_ocustom{{ $employee->id }}" style="text-decoration: underline;">تغییر اصل بست؟</a>
                                            @include('admin.employees.inc.change_position_ocustom')
                                        @else
                                            تبدیل شده به اداره/ارگان دیگر
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- National ID Card & Custom Card -->
                            <div class="row border-top">
                                <div class="col-md-6">
                                    <!-- National ID Card -->
                                    <p>
                                        <strong>@lang('form.idCard'):</strong> <br>
                                        <img src="{{ $employee->taz ?? asset('assets/images/id-card-default.png') }}" class="img-thumbnail"
                                             alt="@lang('form.idCard')">
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <!-- Custom Card -->
                                    <p>
                                        <strong>@lang('form.customCard'):</strong> <br>
                                        <img src="{{ $employee->card ?? asset('assets/images/id-card-default.png') }}" class="img-thumbnail"
                                             alt="@lang('form.customCard')">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/==/ End of User Information Details -->
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
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
