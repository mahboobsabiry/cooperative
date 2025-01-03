@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.users.addNewUser'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.users.addNewUser')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">@lang('admin.sidebar.users')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.users.addNewUser')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ route('admin.users.index') }}">
                    @lang('global.back')
                    <i class="fe fe-arrow-left"></i>
                </a>
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
                                <h6 class="card-title mb-1">@lang('pages.users.addNewUser')</h6>
                                <p class="text-muted card-sub-title">You can add new record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.users.store') }}" data-parsley-validate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror" id="name_div">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ old('name') }}" placeholder="@lang('form.name')" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Username -->
                                        <div class="form-group @error('username') has-danger @enderror" id="username_div">
                                            <p class="mb-2">@lang('form.username'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="username" class="form-control @error('username') form-control-danger @enderror" name="username" value="{{ old('username') }}" placeholder="@lang('form.username')" required>

                                            @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Username -->

                                        <!-- Phone Number -->
                                        <div class="form-group @error('phone') has-danger @enderror" id="phone_div">
                                            <p class="mb-2">@lang('form.phone'):</p>
                                            <input type="text" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ old('phone') }}" placeholder="@lang('form.phone')">

                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Phone Number -->

                                        <!-- Email -->
                                        <div class="form-group @error('email') has-danger @enderror" id="email_div">
                                            <p class="mb-2">@lang('form.email'):</p>
                                            <input type="email" id="email" class="form-control @error('email') form-control-danger @enderror" name="email" value="{{ old('email') }}" placeholder="@lang('form.email')">

                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Email -->

                                        <!-- Password -->
                                        <div class="form-group @error('password') has-danger @enderror">
                                            <p class="mb-2">@lang('form.password'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="password" class="form-control @error('password') form-control-danger @enderror" name="password" value="{{ old('password') }}" placeholder="@lang('form.password')" required>

                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Password -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Information -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('global.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror" placeholder="@lang('global.extraInfo')">{{ old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Information -->

                                        <!-- Avatar -->
                                        <div class="form-group @error('avatar') has-danger @enderror" id="avatar_div">
                                            <p class="mb-2">@lang('form.avatar'):</p>
                                            <input type="file" class="dropify" name="avatar" accept="image/*" data-height="200" />
                                            @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Avatar -->

                                        <!-- Permissions -->
                                        <div class="form-group mb-lg-0">
                                            <label class="">@lang('admin.sidebar.permissions') :</label>
                                            <select multiple="multiple" class="group-filter" name="permissions[]">
                                                @foreach($permissions as $permission)
                                                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <!-- Roles -->
                                        <div class="form-group @error('roles') has-danger @enderror">
                                            <p class="mb-2">
                                                @lang('admin.sidebar.roles'):
                                                <span class="btn btn-primary btn-sm deselect-all pl-1 pr-1" id="mybutton">@lang('global.deselectAll')</span>
                                                &nbsp;
                                                <span class="btn btn-success btn-sm select-all" id="mybutton">@lang('global.selectAll')</span>
                                            </p>
                                            <div class="selectgroup selectgroup-pills p-2" style="border: 1px solid gainsboro;">
                                                <div class="">
                                                    @foreach($roles as $role)
                                                        <label class="selectgroup-item checkboxes">
                                                            <input id="checkAll" type="checkbox" name="roles[]" value="{{ $role->id }}" class="selectgroup-input">
                                                            <span class="selectgroup-button rounded-0 border-black">{{ $role->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Roles -->

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

    <!--Sumoselect js-->
    <script src="{{ asset('backend/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
    <script>
        $('.select-all').click(function () {
            if($('input[type="checkbox"]').parents('.checkboxes')){
                $('input[type="checkbox"]').prop('checked', 'checked')
            }
        });

        $('.deselect-all').click(function () {
            if($('input[type="checkbox"]').parents('.checkboxes')){
                $('input[type="checkbox"]').prop('checked', '')
            }
        });

        // Select Employee
        $(document).ready(function() {
            $(document).on('change', '#employee_id', function () {
                var employee_id = $(this).val();
                var a = $("#name").parent();
                var b = $("#username").parent();
                var c = $("#phone").parent();
                var d = $("#email").parent();

                if (!employee_id == '') {
                    $("#avatar_div").hide();
                    $.ajax({
                        type: 'get',
                        url: '{{ route('admin.users.select.employee') }}',
                        data: { 'employee_id': employee_id },
                        dataType: 'json',
                        success: function (data) {
                            a.find('#name').val(data.employee_name);
                            b.find('#username').val(data.employee_emp_code);
                            c.find('#phone').val(data.employee_phone);
                            d.find('#email').val(data.employee_email);
                        },
                        error: function () {
                            alert("ERROR");
                            $(".errorMsg").html(data.error);
                        }
                    });
                } else {
                    a.find('#name').val("");
                    b.find('#username').val("");
                    c.find('#phone').val("");
                    d.find('#email').val("");
                    $("#avatar_div").show();
                }
            });
        });
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
