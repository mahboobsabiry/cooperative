@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت مکتوب جدید')
<!-- Extra Styles -->
@section('extra_css')

@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">ثبت مکتوب جدید</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.positions.show', $position->id) }}">مدیر عمومی سیستم</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.documents.index') }}">مکاتیب مدیریت عمومی سیستم</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت مکتوب جدید</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ url()->previous() }}">
                    @lang('global.back')
                    <i class="fe fe-arrow-left"></i>
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Main Row -->
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
                                <p class="pro-user-desc text-primary mb-1">({{ $position->place }})</p>
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
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Errors Message -->
                        @include('admin.inc.alerts')

                        <!-- Form Title -->
                        <div>
                            <h6 class="card-title mb-1">ثبت مکتوب جدید</h6>
                            <p class="text-muted card-sub-title">You can add new record here.</p>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{ route('admin.documents.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.inc.create_docs_form')

                            <div class="modal-footer">
                                <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                            </div>
                        </form>
                        <!--/==/ End of Form -->
                    </div>
                    <!--/==/ End of Card Body -->
                </div>
                <!--/==/ End of Card -->
            </div>
        </div>
        <!--/==/ End of Main Row -->
    </div>
@endsection
<!--/==/ End of Main Content of The Page -->

<!-- Extra Scripts -->
@section('extra_js')
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
