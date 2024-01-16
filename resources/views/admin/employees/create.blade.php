@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.employees.addNewEmployee'))
<!-- Extra Styles -->
@section('extra_css')
    <!---Fileupload css-->
    <link href="{{ asset('backend/assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet">
    <!---Fancy uploader css-->
    <link href="{{ asset('backend/assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet">
    <!--Sumoselect css-->
    <link href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">

    <!---Datetimepicker css-->
    <link href="{{ asset('backend/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">

@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.employees.addNewEmployee')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.employees.addNewEmployee')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ route('admin.employees.index') }}">
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
                            <div class="mb-3">
                                <h6 class="card-title mb-1 tx-bold">
                                    @lang('pages.employees.addEmpInfo')
                                </h6>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.employees.store') }}" data-parsley-validate="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Personal Information -->
                                        <p class="bd-b mb-2 tx-bold pb-2">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </p>

                                        <!-- Position && Position Code -->
                                        <div class="row">
                                            <!-- Position -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('position_id') has-danger @enderror">
                                                    <p class="mb-2">1) @lang('form.position'): <span class="tx-danger">*</span></p>

                                                    <select id="position_id" name="position_id" class="form-control select2 @error('position_id') form-control-danger @enderror">
                                                        <option value="">@lang('form.chooseOne')</option>
                                                        @foreach($positions as $position)
                                                            <option value="{{ $position->id }}">{{ $position->title }}</option>
                                                            @foreach($position->children as $admin)
                                                                <option value="{{ $admin->id }}" class="text-secondary">- {{ $admin->title }}</option>
                                                                @foreach($admin->children as $mgmt)
                                                                    <option value="{{ $mgmt->id }}">-- {{ $mgmt->title }}</option>
                                                                    @foreach($mgmt->children as $mgr)
                                                                        <option value="{{ $mgr->id }}">--- {{ $mgr->title }}</option>
                                                                    @endforeach
                                                                @endforeach
                                                            @endforeach
                                                        @endforeach
                                                    </select>

                                                    @error('position_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Position Code -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('position_code') has-danger @enderror">
                                                    <p class="mb-2">2) @lang('form.positionCode'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="position_code" class="form-control @error('position_code') form-control-danger @enderror" name="position_code" value="{{ old('position_code') }}" required>

                                                    @error('position_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Position && Position Code -->

                                        <!-- Start Duty and Education -->
                                        <div class="row">
                                            <!-- Start Duty -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('start_duty') has-danger @enderror">
                                                    <p class="mb-2">3) @lang('form.startDuty'): <span class="tx-danger">*</span></p>
                                                    <input data-jdp data-jdp-max-date="today" type="text" id="start_duty" class="form-control @error('start_duty') form-control-danger @enderror" name="start_duty" value="{{ old('start_duty') }}" required>

                                                    @error('start_duty')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Education -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('education') has-danger @enderror">
                                                    <p class="mb-2">4) @lang('form.education'):</p>
                                                    <input type="text" id="education" class="form-control @error('education') form-control-danger @enderror" name="education" value="{{ old('education') }}">

                                                    @error('education')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Position Code and Education-->

                                        <!-- Name & Last Name -->
                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('name') has-danger @enderror">
                                                    <p class="mb-2">5) @lang('form.name'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ old('name') }}" required>

                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Last Name -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('last_name') has-danger @enderror">
                                                    <p class="mb-2">6) @lang('form.lastName'):</p>
                                                    <input type="text" id="last_name" class="form-control @error('last_name') form-control-danger @enderror" name="last_name" value="{{ old('last_name') }}">

                                                    @error('last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Name & Last Name -->

                                        <!-- Father and Gender -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Father Name -->
                                                <div class="form-group @error('father_name') has-danger @enderror">
                                                    <p class="mb-2">7) @lang('form.fatherName'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="father_name" class="form-control @error('father_name') form-control-danger @enderror" name="father_name" value="{{ old('father_name') }}" required>

                                                    @error('father_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Father Name -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Gender -->
                                                <div class="form-group @error('gender') has-danger @enderror">
                                                    <p class="mb-2">8) @lang('form.gender'): <span class="tx-danger">*</span></p>

                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="1">@lang('form.male')</option>
                                                        <option value="0">@lang('form.female')</option>
                                                    </select>

                                                    @error('gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Gender -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Father and Grand Father Name -->

                                        <!-- Birth Year & Last Duty -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Last Duty -->
                                                <div class="form-group @error('last_duty') has-danger @enderror">
                                                    <p class="mb-2">9) @lang('form.lastDuty'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="last_duty" class="form-control @error('last_duty') form-control-danger @enderror" name="last_duty" value="{{ old('last_duty') }}">

                                                    @error('last_duty')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Last Duty -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Birth Year -->
                                                <div class="form-group @error('birth_year') has-danger @enderror">
                                                    <p class="mb-2">10) @lang('form.birthYear'): <span class="tx-danger">*</span></p>
                                                    <input type="number" id="birth_year" class="form-control @error('birth_year') form-control-danger @enderror" name="birth_year" value="{{ old('birth_year') }}" required>

                                                    @error('birth_year')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Birth Year -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Birth Year & Last Duty -->
                                        <!--/==/ End of Personal Information -->

                                        <!-- General Information -->
                                        <p class="bd-b mb-2 tx-bold pb-2">
                                            <span class="badge badge-primary badge-pill">2</span>
                                            @lang('pages.employees.generalInfo')
                                        </p>

                                        <!-- Appointment Number & Date -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Appointment Number -->
                                                <div class="form-group @error('appointment_number') has-danger @enderror">
                                                    <p class="mb-2">11) @lang('form.appointmentNumber'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="appointment_number" class="form-control @error('appointment_number') form-control-danger @enderror" name="appointment_number" value="{{ old('appointment_number') }}" required>

                                                    @error('appointment_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Appointment Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Appointment Date -->
                                                <div class="form-group @error('appointment_date') has-danger @enderror">
                                                    <p class="mb-2">12) @lang('form.appointmentDate'): <span class="tx-danger">*</span></p>
                                                    <input data-jdp data-jdp-max-date="today" type="text" id="appointment_date" class="form-control @error('appointment_date') form-control-danger @enderror" name="appointment_date" value="{{ old('appointment_date') }}" required>

                                                    @error('appointment_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Appointment Date -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Appointment Numebr and Date -->

                                        <!-- Employee Number and Email -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Employee Number -->
                                                <div class="form-group @error('emp_number') has-danger @enderror">
                                                    <p class="mb-2">13) @lang('form.empNumber'): <span class="tx-danger">*</span></p>
                                                    <input type="number" id="emp_number" class="form-control @error('emp_number') form-control-danger @enderror" name="emp_number" value="{{ old('emp_number') }}">

                                                    @error('emp_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Employee Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Email Address -->
                                                <div class="form-group @error('email') has-danger @enderror">
                                                    <p class="mb-2">14) @lang('form.email'):</p>
                                                    <input type="email" id="email" class="form-control @error('email') form-control-danger @enderror" name="email" value="{{ old('email') }}">

                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Email Address -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Employee Number and Email Address -->

                                        <!-- Phone Number -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Phone Number -->
                                                <div class="form-group @error('phone') has-danger @enderror">
                                                    <p class="mb-2">15) @lang('form.phone'):</p>
                                                    <input type="text" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ old('phone') }}">

                                                    @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Phone Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Phone Number 2 -->
                                                <div class="form-group @error('phone2') has-danger @enderror">
                                                    <p class="mb-2">16) @lang('form.phone') @lang('global.alternative'): </p>
                                                    <input type="text" id="phone2" class="form-control @error('phone2') form-control-danger @enderror" name="phone2" value="{{ old('phone2') }}">

                                                    @error('phone2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Phone Number 2 -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Phone Number -->

                                        <!-- Main Address -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Main Province -->
                                                <div class="form-group @error('main_province') has-danger @enderror">
                                                    <p class="mb-2">17) @lang('form.mainProvince'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="main_province" class="form-control @error('main_province') form-control-danger @enderror" name="main_province" value="{{ old('main_province') }}" required>

                                                    @error('main_province')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Main Province -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Main District -->
                                                <div class="form-group @error('main_district') has-danger @enderror">
                                                    <p class="mb-2">18) @lang('form.mainDistrict'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="main_district" class="form-control @error('main_district') form-control-danger @enderror" name="main_district" value="{{ old('main_district') }}" required>

                                                    @error('main_district')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Main District -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Main Address -->

                                        <!-- Current Address -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Current Province -->
                                                <div class="form-group @error('current_province') has-danger @enderror">
                                                    <p class="mb-2">19) @lang('form.currentProvince'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="current_province" class="form-control @error('current_province') form-control-danger @enderror" name="current_province" value="{{ old('current_province') }}" required>

                                                    @error('current_province')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Current Province -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Current District -->
                                                <div class="form-group @error('current_district') has-danger @enderror">
                                                    <p class="mb-2">20) @lang('form.currentDistrict'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="current_district" class="form-control @error('current_district') form-control-danger @enderror" name="current_district" value="{{ old('current_district') }}" required>

                                                    @error('current_district')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Current District -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Current Address -->

                                        <!--/==/ End of General Information -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- PRR/NPR -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- PRR/NPR -->
                                                <div class="form-group @error('prr_npr') has-danger @enderror">
                                                    <p class="mb-2">21) PRR/NPR: <span class="tx-danger">*</span></p>

                                                    <select class="form-control" name="prr_npr" id="prr_npr">
                                                        <option value="NPR">NPR</option>
                                                        <option value="PRR">PRR</option>
                                                    </select>

                                                    @error('prr_npr')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of PRR/NPR -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- PRR Date -->
                                                <div class="form-group @error('prr_date') has-danger @enderror">
                                                    <p class="mb-2">22) PRR Date:</p>
                                                    <input data-jdp data-jdp-max="today" type="text" id="prr_date" class="form-control @error('prr_date') form-control-danger @enderror" name="prr_date" value="{{ old('prr_date') }}">

                                                    @error('prr_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of PRR Date -->
                                            </div>
                                        </div>
                                        <!--/==/ End of PRR/NPR -->

                                        <!-- Education & Hostel -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Hostel -->
                                                <div class="form-group @error('hostel_id') has-danger @enderror">
                                                    <p class="mb-2">23) @lang('pages.hostel.hostel'):</p>
                                                    <select class="form-control select2" name="hostel_id" id="hostel_id">
                                                        <option selected disabled>@lang('global.home')</option>
                                                        @foreach($hostels as $hostel)
                                                            <option value="{{ $hostel->id }}">@lang('pages.hostel.roomNumber') {{ $hostel->number }} - {{ $hostel->section }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('hostel_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Education -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Introducer -->
                                                <div class="form-group @error('info') has-danger @enderror">
                                                    <p class="mb-2">24) @lang('form.introducer'):</p>
                                                    <input type="text" id="introducer" class="form-control @error('introducer') form-control-danger @enderror" name="introducer" value="{{ old('introducer') }}">

                                                    @error('introducer')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Introducer -->
                                            </div>
                                        </div>
                                        <!-- End of Introducer and Hostel -->

                                        <!-- Other Information -->
                                        <p class="bd-b mb-2 tx-bold pb-2">
                                            <span class="badge badge-primary badge-pill">3</span>
                                            @lang('pages.employees.otherInfo')
                                        </p>

                                        <!-- Information -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">25) @lang('global.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Information -->>

                                        <!-- Photo -->
                                        <div class="form-group @error('photo') has-danger @enderror">
                                            <p class="mb-2">26) @lang('form.photo'):</p>
                                            <input type="file" class="dropify" name="photo" accept="image/*" data-height="200" />
                                            @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Photo] -->

                                        <!-- Tazkira -->
                                        <div class="form-group @error('tazkira') has-danger @enderror">
                                            <p class="mb-2">
                                                <!-- Tazkira -->
                                                27) @lang('form.idCard'): <br>
                                                <span class="caption bg-gray-300">نوت: اگر تذکره الکترونیکی دارید، آن را در یک فایل قرار داده و آپلود نمایید.</span>
                                            </p>

                                            <input type="file" class="dropify" name="tazkira" accept="image/*" data-height="200" />
                                            @error('tazkira')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Tazkira -->
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
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

    <!-- Jquery-Ui js-->
    <script src="{{ asset('backend/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Jquery.maskedinput js-->
    <script src="{{ asset('backend/assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!-- Datetimepicker js-->
    <script src="{{ asset('backend/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Simple-Datepicker js-->
    <script src="{{ asset('backend/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/pickerjs/picker.min.js') }}"></script>

    <!--Sumoselect js-->
    <script src="{{ asset('backend/assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>

    <script>
        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        if($('input[type="checkbox"]').parents('#onDutyParent')){
            $('#onDutyCheck').change(function() {
                if (this.checked) {
                    $('#mpText').show();
                    $('#duty_position_div').show();
                } else {
                    $('#duty_position').val("");
                    $('#duty_position_div').hide();
                    $('#mpText').hide();
                }
            })
        }
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
