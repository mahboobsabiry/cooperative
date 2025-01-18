@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت سپرده جدید')
<!-- Extra Styles -->
@section('extra_css')
    <!---Fileupload css-->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet">
    <!---Fancy uploader css-->
    <link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet">
    <!--Sumoselect css-->
    <link href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.new')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}">اعضاء</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.members.show', $member->id) }}">{{ $member->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('ثبت سپرده جدید') }}</li>
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
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form Title -->
                            <div>
                                <h6 class="card-title font-weight-bold mb-1">{{ __('ثبت سپرده جدید') }}</h6>
                                <p class="text-muted card-sub-title">{{ __('مجموع سپرده موجود') }}
                                    ({{ $member->deposit_amount }})</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.members.add.deposit', $member->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Title -->
                                        <div class="form-group @error('title') has-danger @enderror" id="title_div">
                                            <p class="mb-2">@lang('form.title'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="title"
                                                   class="form-control @error('title') form-control-danger @enderror"
                                                   name="title" value="{{ old('title') }}" required>

                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Title -->

                                        <!-- Year -->
                                        <div class="form-group @error('year') has-danger @enderror" id="year_div">
                                            <p class="mb-2">{{ __('سال') }}: <span class="tx-danger">*</span></p>
                                            <select class="form-control select2" name="year">
                                                @foreach($member->years() as $year)
                                                    <option value="{{ $year }}" {{ \Morilog\Jalali\Jalalian::now()->getYear() == $year ? 'selected' : '' }}>{{ $year }}</option>
                                                @endforeach
                                            </select>

                                            @error('year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Year -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Month -->
                                        <div class="form-group @error('month') has-danger @enderror" id="year_div">
                                            <p class="mb-2">{{ __('ماه') }}: <span class="tx-danger">*</span></p>
                                            <select class="form-control select2" name="month">
                                                @foreach($member->months() as $month)
                                                    <option value="{{ $month }}" {{ \Morilog\Jalali\Jalalian::now()->getMonth() == $month ? 'selected' : '' }}>{{ $month }}</option>
                                                @endforeach
                                            </select>

                                            @error('month')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Year -->

                                        <!-- Info -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('global.extraInfo'):</p>
                                            <textarea type="text" id="info" class="form-control @error('info') form-control-danger @enderror" name="info">{{ old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Info -->

                                        <div class="form-group float-left">
                                            <button class="btn ripple btn-primary rounded-2"
                                                    type="submit">@lang('global.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/==/ End of Form -->
                        </div>
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
    <!--Fileuploads js-->
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Fancy uploader js-->
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!--Sumoselect js-->
    <script src="{{ asset('backend/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
