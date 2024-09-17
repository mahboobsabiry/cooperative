@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.edit') . ' ~ ' . $company->name)
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.companies.index') }}">@lang('admin.sidebar.companies')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.companies.show', $company->id) }}">@lang('global.details')</a></li>
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
                        <h6 class="card-title tx-15 tx-bold mb-1">@lang('global.edit') @lang('admin.sidebar.companies')</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.companies.update', $company->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">1) @lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $company->name ?? old('name') }}" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- TIN -->
                                        <div class="form-group @error('tin') has-danger @enderror">
                                            <p class="mb-2">2) @lang('form.tin'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="tin" class="form-control @error('tin') form-control-danger @enderror" name="tin" value="{{ $company->tin ?? old('tin') }}" required>

                                            @error('tin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Company Type -->
                                        <div class="form-group @error('type') has-danger @enderror">
                                            <p class="mb-2">3) @lang('global.type'): <span class="tx-danger">*</span></p>

                                            <select class="form-control select2" name="type[]" multiple>
                                                <option value="وارداتی" {{ str()->contains($company->type, 'وارداتی') ? 'selected' : '' }}>@lang('pages.companies.import')</option>
                                                <option value="صادراتی" {{ str()->contains($company->type, 'صادراتی') ? 'selected' : '' }}>@lang('pages.companies.export')</option>
                                                <option value="بارچالانی" {{ str()->contains($company->type, 'بارچالانی') ? 'selected' : '' }}>بارچالانی</option>
                                                <option value="TIR" {{ str()->contains($company->type, 'TIR') ? 'selected' : '' }}>TIR</option>
                                            </select>

                                            @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Activity Sector -->
                                        <div class="form-group @error('activity_sector') has-danger @enderror">
                                            <p class="mb-2">4) @lang('form.activity_sector'):</p>
                                            <input type="text" id="activity_sector" class="form-control @error('activity_sector') form-control-danger @enderror" name="activity_sector" value="{{ $company->activity_sector ?? old('activity_sector') }}">

                                            @error('activity_sector')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Owner & Deputy Name -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Owner Name -->
                                                <div class="form-group @error('owner_name') has-danger @enderror">
                                                    <p class="mb-2">5) @lang('form.owner_name'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="owner_name" class="form-control @error('owner_name') form-control-danger @enderror" name="owner_name" value="{{ $company->owner_name ?? old('owner_name') }}" placeholder="@lang('form.owner_name')" required>

                                                    @error('owner_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Deputy Name -->
                                                <div class="form-group @error('deputy_name') has-danger @enderror">
                                                    <p class="mb-2">6) @lang('form.deputy_name'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="deputy_name" class="form-control @error('deputy_name') form-control-danger @enderror" name="deputy_name" value="{{ $company->deputy_name ?? old('deputy_name') }}" placeholder="@lang('form.deputy_name')" required>

                                                    @error('deputy_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Owner & Deputy Name -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Owner ID Card & Phone Number -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Owner ID Card -->
                                                <div class="form-group @error('owner_id_card') has-danger @enderror">
                                                    <p class="mb-2">7) @lang('form.owner_id_card'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="owner_id_card" class="form-control @error('owner_id_card') form-control-danger @enderror" name="owner_id_card" value="{{ $company->owner_id_card ?? old('owner_id_card') }}" placeholder="@lang('form.owner_id_card')" required>

                                                    @error('owner_id_card')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Owner Phone -->
                                                <div class="form-group @error('owner_phone') has-danger @enderror">
                                                    <p class="mb-2">8) @lang('form.owner_phone'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="owner_phone" class="form-control @error('owner_phone') form-control-danger @enderror" name="owner_phone" value="{{ $company->owner_phone ?? old('owner_phone') }}" placeholder="@lang('form.owner_phone')" required>

                                                    @error('owner_phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Owner ID Card & Phone Number -->

                                        <!-- Owner Main & Current Address -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Owner Main Address -->
                                                <div class="form-group @error('owner_main_add') has-danger @enderror">
                                                    <p class="mb-2">9) @lang('form.owner_main_add'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="owner_main_add" class="form-control @error('owner_main_add') form-control-danger @enderror" name="owner_main_add" value="{{ $company->owner_main_add ?? old('owner_main_add') }}" placeholder="@lang('form.owner_main_add')" required>

                                                    @error('owner_main_add')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Owner Current Address -->
                                                <div class="form-group @error('owner_cur_add') has-danger @enderror">
                                                    <p class="mb-2">10) @lang('form.owner_cur_add'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="owner_cur_add" class="form-control @error('owner_cur_add') form-control-danger @enderror" name="owner_cur_add" value="{{ $company->owner_cur_add ?? old('owner_cur_add') }}" placeholder="@lang('form.owner_cur_add')" required>

                                                    @error('owner_cur_add')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Owner Main & Current Address -->

                                        <!-- Address -->
                                        <div class="form-group @error('address') has-danger @enderror">
                                            <p class="mb-2">11) @lang('global.address'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="address" class="form-control @error('address') form-control-danger @enderror" name="address" value="{{ $company->address ?? old('address') }}" required>

                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">12) @lang('form.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ $company->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Description -->

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
