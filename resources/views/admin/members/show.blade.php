@extends('layouts.admin.master')
<!-- Title -->
@section('title', $member->name)
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
                        <a href="{{ route('admin.members.index') }}">{{ __('اعضاء') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $member->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.members.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.members.edit', $member->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.members.create') }}">
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
            <div class="col-md-4">
                <!-- Right Side -->
                <div class="">
                    <!-- Profile Main Info -->
                    <div class="card custom-card">
                        <div class="card-body text-center">
                            <div class="main-profile-overview widget-user-image text-center">
                                <div class="main-img-user">
                                    @if($member->avatar)
                                        <img alt="avatar" src="{{ $member->image }}">
                                    @else
                                        <img alt="avatar" src="{{ asset('assets/images/members/no-image.jpeg') }}">
                                    @endif
                                </div>
                            </div>

                            <!-- Main Info -->
                            <div class="item-user pro-user">
                                <h4 class="pro-user-username text-dark mt-2 mb-0">
                                    <span>{{ $member->name }}</span>
                                </h4>

                                <p class="pro-user-desc text-muted mb-1">{{ $member->position }}</p>

                                <!-- Employee Star -->
                                <p class="user-info-rating">
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                    <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                                </p>
                                <!--/==/ End of Employee Star -->
                            </div>
                        </div>
                    </div>
                    <!--/==/ End of Profile Main Info -->

                    <!-- Contact Information -->
                    <div class="card custom-card">
                        <div class="card-header custom-card-header">
                            <div>
                                <h6 class="card-title tx-15 tx-bold mb-0">
                                    اطلاعات لازم
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
                                            @if($member->status == 1)
                                                <span class="text-success">@lang('global.active')</span>
                                            @else
                                                <span class="text-danger">@lang('global.inactive')</span>
                                            @endif
                                        </div>
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
                                            <a href="callto:{{ $member->phone }}">{{ $member->phone }}</a>
                                            @if(!empty($member->phone2))
                                                , <a href="callto:{{ $member->phone2 }}">{{ $member->phone2 }}</a>
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
                                            <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                        </div>
                                    </div>
                                </div>
                                <!--/==/ End of Email Address -->
                            </div>
                        </div>
                    </div>
                    <!--/==/ End of Contact Information -->
                </div>
            </div>
            <div class="col-md-8">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $member->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fe fe-user"></i> {{ __('عضو') }}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i>
                            </div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($member->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header tx-15 font-weight-bold">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Global Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">{{ __('معلومات عمومی') }}</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                                    </div>
                                    <div class="col">ID-{{ $member->id }}</div>
                                </div>

                                <!-- Member Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.name'): </strong></p>
                                    </div>
                                    <div class="col">{{ $member->name }}</div>
                                </div>

                                <!-- Father Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.fatherName'): </strong></p>
                                    </div>
                                    <div class="col">{{ $member->father_name }}</div>
                                </div>

                                <!-- Position -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('وظیفه') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $member->position }}</div>
                                </div>

                                <!-- Phone Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.phone'): </strong></p>
                                    </div>
                                    <div class="col">
                                        <a href="callto:{{ $member->phone }}">{{ $member->phone }}</a>
                                        @if($member->phone2)
                                            , <a href="callto:{{ $member->phone2 }}">{{ $member->phone2 }}</a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.email'): </strong></p>
                                    </div>
                                    <div class="col">
                                        <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                                    </div>
                                </div>

                                <!-- Address -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.address'): </strong></p>
                                    </div>
                                    <div class="col">{{ $member->address }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'): </strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $member->info ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Global Information -->

                            <!-- Other Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">{{ __('معلومات سپرده‌ها') }}</h6>
                                <!-- Deposits -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('دفعات سپرده ها') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $member->deposits->count() }}</div>
                                </div>

                                <!-- Total Deposit -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('مجموع سپرده ها') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $member->deposit_amount }}</div>
                                </div>
                            </div>
                            <!--/==/ End of Other Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details -->
            </div>
        </div>
        <!--/==/ End of Row Content -->

        <!-- Deposits -->
        <div class="card mb-2">
            <!-- Card Header -->
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="font-weight-bold">{{ __('سپرده‌ها') }} ({{ $member->deposits->sum('amount') }})<sup>اف</sup></h5>
                    </div>

                    <div class="col-md-6 text-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.members.add.deposit', $member->id) }}">{{ __('ثبت سپرده جدید') }}</a>
                    </div>
                </div>
            </div>
            <!--/==/ End of Card Header -->

            <div class="card-body">
                <!-- Table -->
                <div class="table-responsive mt-2">
                    <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">{{ __('عنوان') }}</th>
                            <th class="text-center">{{ __('سال') }}</th>
                            <th class="text-center">{{ __('ماه') }}</th>
                            <th class="text-center">{{ __('مبلغ') }}</th>
                            <th class="text-center">{{ __('تاریخ پرداخت') }}</th>
                            <th class="text-center">{{ __('معلومات اضافی') }}</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($member->deposits as $deposit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $deposit->title }}</td>
                                <td>{{ $deposit->year }}</td>
                                <td>{{ $deposit->month }} ({{ $deposit->month_number }})</td>
                                <td>{{ $deposit->amount }}<sup>اف</sup><</td>
                                <!-- Created Date -->
                                <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($deposit->created_at)) }}</td>
                                <!-- Extra Info -->
                                <td>{{ str()->limit($deposit->info, 200, '...') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--/==/ End of Table -->
            </div>
        </div>
        <!--/==/ End of Deposits -->
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
