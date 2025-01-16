@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('admin.editProfile'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.editProfile')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.editProfile')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->

            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Main Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form Title -->
                            <div>
                                <h6 class="card-title mb-1">@lang('pages.users.editUser')</h6>
                                <p class="text-muted card-sub-title">You can add new record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.update.profile', $user->id) }}"
                                  data-parsley-validate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name"
                                                   class="form-control @error('name') form-control-danger @enderror"
                                                   name="name" value="{{ $user->name ?? old('name') }}"
                                                   placeholder="@lang('form.name')" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Username -->
                                        <div class="form-group @error('username') has-danger @enderror">
                                            <p class="mb-2">@lang('form.username'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="username"
                                                   class="form-control @error('username') form-control-danger @enderror"
                                                   name="username" value="{{ $user->username ?? old('username') }}"
                                                   placeholder="@lang('form.username')" required>

                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Phone Number -->
                                        <div class="form-group @error('phone') has-danger @enderror">
                                            <p class="mb-2">@lang('form.phone'):</p>
                                            <input type="text" id="phone"
                                                   class="form-control @error('phone') form-control-danger @enderror"
                                                   name="phone" value="{{ $user->phone ?? old('phone') }}"
                                                   placeholder="@lang('form.phone')">

                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Phone Number -->

                                        <!-- Email -->
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <p class="mb-2">@lang('form.email'):</p>
                                            <input type="email" id="email"
                                                   class="form-control @error('email') form-control-danger @enderror"
                                                   name="email" value="{{ $user->email ?? old('email') }}"
                                                   placeholder="@lang('form.email')">

                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Email -->

                                        <!-- Information -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('global.information'):</p>
                                            <textarea name="info"
                                                      class="form-control @error('info') form-control-danger @enderror"
                                                      placeholder="@lang('global.information')">{{ $user->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Information -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Avatar -->
                                        <div class="form-group @error('avatar') has-danger @enderror">
                                            <p class="mb-2">
                                                <!-- Delete Avatar -->
                                                @if($user->avatar)
                                                    <span class="caption">
                                                        <a href="{{ $user->image }}" target="_blank">
                                                            <img src="{{ $user->image }}" class="img-fluid float-left"
                                                                 style="height: 30px;">
                                                        </a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <!-- Delete -->
                                                        <a onclick="return confirm('{{ trans('global.areYouSure') }}');" class="text-danger float-left" href="{{ route('admin.users.delete.avatar', $user->id) }}" title="@lang('global.delete')">
                                                            <i class="fe fe-trash"></i>
                                                        </a>
                                                    </span>
                                                @endif
                                                @lang('form.avatar'):
                                            </p>
                                            <p></p>
                                            <input type="file" class="dropify" name="avatar" accept="image/*"
                                                   data-height="200" data-max-file="4M" data-show-errors="true"/>
                                            @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Avatar -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary rounded-2"
                                            type="submit">@lang('global.save')</button>
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


        <!-- Row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div class="alert alert-solid-success" role="alert" style="display: none;">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span></button>
                            @lang('pages.profile.updPwdMsg')
                        </div>

                        <div class="main-content-label tx-20 mg-b-20">
                            @lang('pages.profile.updatePassword')
                        </div>

                        <form method="post" action="{{ route('admin.profile.update.password') }}"
                              id="updatePasswordForm" name="updatePasswordForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Current Password -->
                                    <div class="form-group">
                                        <label for="cur_password" class="form-control-label">@lang('form.cur_password')
                                            <span class="text-danger">*</span></label>

                                        <input type="password" name="cur_password"
                                               class="form-control @error('cur_password') is-invalid state-invalid @enderror"
                                               id="cur_password" placeholder="@lang('form.cur_password')" required>

                                        @error('cur_password')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror

                                        <span id="checkPwdMsg"></span>
                                    </div>
                                    <!-- End of Current Password -->

                                    <!-- New Password -->
                                    <div class="form-group">
                                        <label for="new_password" class="form-control-label">@lang('form.new_password')
                                            <span class="text-danger">*</span></label>

                                        <input type="password" name="new_password"
                                               class="form-control @error('new_password') is-invalid state-invalid @enderror"
                                               id="new_password" placeholder="@lang('form.new_password')" required>

                                        @error('new_password')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- End of New Password -->

                                    <!-- Confirm Password -->
                                    <div class="form-group">
                                        <label for="confirm_password"
                                               class="form-control-label">@lang('form.confirm_password') <span
                                                class="text-danger">*</span></label>

                                        <input type="password" name="confirm_password"
                                               class="form-control @error('confirm_password') is-invalid state-invalid @enderror"
                                               id="confirm_password" placeholder="@lang('form.confirm_password')"
                                               required>

                                        @error('confirm_password')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- End of Confirm Password -->
                                </div>

                                <div class="col-md-6"></div>
                            </div>

                            <p>* (@lang('global.mandatory'))</p>

                            <button type="submit" class="btn btn-primary">@lang('global.update')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
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

    <!-- Profile Custom Scripts -->
    <script src="{{ asset('backend/assets/js/pages/profile.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
