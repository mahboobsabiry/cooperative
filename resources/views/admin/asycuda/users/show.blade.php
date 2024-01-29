@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'یوزر ' . $asycuda_user->employee->name . ' ' . $asycuda_user->employee->last_name)
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
                <h2 class="main-content-title tx-24 mg-b-5">یوزر کارمند</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.employees.index') }}">@lang('admin.sidebar.employees')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.asycuda.users.index') }}">یوزر کارمندان</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                @if($asycuda_user->status == 1)
                    <div class="d-flex">
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

                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm tx-white"
                               href="{{ route('admin.asycuda.users.edit', $asycuda_user->id) }}">
                                <i class="fe fe-edit"></i>
                                @lang('global.edit')
                            </a>
                        </div>

                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple bg-primary btn-sm tx-white"
                               href="{{ route('admin.asycuda.users.create') }}">
                                <i class="fe fe-plus-circle"></i>
                                @lang('global.add')
                            </a>
                        </div>
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

                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }}</span>
                            </h4>

                            <p class="pro-user-desc text-muted mb-1">{{ $asycuda_user->employee->position->title ?? '' }}</p>
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
                                        <td colspan="7" class="font-weight-bold">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </td>
                                    </tr>

                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>@lang('form.name')</strong></th>
                                        <th><strong>@lang('admin.sidebar.roles')</strong></th>
                                        <th><strong>یوزر</strong></th>
                                        <th><strong>@lang('form.password')</strong></th>
                                        <th><strong>@lang('form.status')</strong></th>
                                        <th><strong>@lang('global.date')</strong></th>
                                    </tr>

                                    <tr>
                                        <td>{{ $asycuda_user->id }}</td>
                                        <td>{{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }}</td>
                                        <td>{{ $asycuda_user->roles }}</td>
                                        <td>{{ $asycuda_user->user }}</td>
                                        <td>{{ $asycuda_user->password }}</td>
                                        <td>{{ $asycuda_user->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($asycuda_user->created_at)) }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of First Table -->
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->
                            <p>{{ $asycuda_user->info }}</p>
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
