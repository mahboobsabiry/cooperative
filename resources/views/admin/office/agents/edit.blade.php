@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.edit') . ' ~ ' . trans('pages.companies.agents'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.edit')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.agents.show', $agent->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.edit')</li>
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
            <div class="col-lg-12">
                <!-- Errors Message -->
                @include('admin.inc.alerts')

                <!-- Card -->
                <div class="card">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title tx-15 tx-bold mb-1">@lang('pages.companies.agents')</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.agents.update', $agent->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">1) @lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $agent->name ?? old('name') }}" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Phone -->
                                        <div class="form-group @error('phone') has-danger @enderror">
                                            <p class="mb-2">2) @lang('form.phone'): <span class="tx-danger">*</span></p>
                                            <input type="tel" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ $agent->phone ?? old('phone') }}" placeholder="@lang('form.phone')" required>

                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Phone2 -->
                                        <div class="form-group @error('phone2') has-danger @enderror">
                                            <p class="mb-2">3) @lang('form.phone') 2:</p>
                                            <input type="tel" id="phone2" class="form-control @error('phone2') form-control-danger @enderror" name="phone2" value="{{ $agent->phone2 ?? old('phone2') }}">

                                            @error('phone2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- ID Card Number -->
                                        <div class="form-group @error('id_number') has-danger @enderror">
                                            <p class="mb-2">4) نمبر تذکره: <span class="tx-danger">*</span></p>
                                            <input type="text" id="id_number" class="form-control @error('id_number') form-control-danger @enderror" name="id_number" value="{{ $agent->id_number ?? old('id_number') }}" required>

                                            @error('id_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="form-group @error('address') has-danger @enderror">
                                            <p class="mb-2">5) @lang('global.address'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="address" class="form-control @error('address') form-control-danger @enderror" name="address" value="{{ $agent->address ?? old('address') }}" required>

                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">6) @lang('form.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ $agent->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Description -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Photo -->
                                        <div class="form-group @error('photo') has-danger @enderror">
                                            <p class="mb-2">7) @lang('form.photo'):</p>
                                            @if($agent->image)
                                                <a href="{{ $agent->image }}" target="_blank">
                                                    <img src="{{ $agent->image ?? asset('assets/images/avatar-default.jpeg') }}" alt="{{ $agent->name }}" width="40">
                                                </a>
                                            @endif
                                            <input type="file" class="dropify" name="photo" accept="image/*" data-height="200" />
                                            @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Photo -->

                                        <!-- Signature -->
                                        <div class="form-group @error('signature') has-danger @enderror">
                                            <p class="mb-2">8) امضاء:</p>
                                            @if($agent->signature)
                                                <a href="{{ asset('storage/agents/signatures/' . $agent->signature) }}" target="_blank">
                                                    <img src="{{ asset('storage/agents/signatures/' . $agent->signature) ?? asset('assets/images/avatar-default.jpeg') }}" alt="{{ $agent->name }}" width="40">
                                                </a>
                                            @endif
                                            <input type="file" class="dropify" name="signature" accept="image/*" data-height="200" />
                                            @error('signature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Signature -->

                                        <div class="form-group float-left">
                                            <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
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

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
