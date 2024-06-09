@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.employees.editTitle') . ' - ' . $employee->name . ' ' . $employee->last_name)
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

    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }
    </style>
@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.employees.editTitle')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.index') }}">@lang('admin.sidebar.employees')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.employees.show', $employee->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.employees.editTitle')</li>
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
                <div class="card mb-2">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title mb-1 tx-bold">
                            @lang('pages.employees.editTitle')
                        </h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.employees.update', $employee->id) }}" data-parsley-validate="" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Position && Position Code -->
                                        <div class="row" style="background-color: #EFF1F9;">
                                            <!-- Position && Code -->
                                            <div class="col-md-12">
                                                <div class="form-group @error('ps_code_id') has-danger @enderror">
                                                    <p class="mb-2">1) @lang('form.position'):</p>

                                                    <select id="ps_code_id" name="ps_code_id" class="form-control select2 @error('ps_code_id') form-control-danger @enderror">
                                                        <option value="">@lang('form.chooseOne')</option>
                                                        @foreach($codes as $code)
                                                            @if($employee->position_code)
                                                                <option value="{{ $code->id }}" {{ $employee->position_code->id == $code->id ? 'selected' : '' }}>{{ $code->code }} ({{ $code->position->title . ' - ' . $code->position->place }})</option>
                                                            @else
                                                                <option value="{{ $code->id }}">{{ $code->code }} ({{ $code->position->title . ' - ' . $code->position->place }})</option>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                    @error('ps_code_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Start Duty and Education -->
                                        <div class="row" style="background-color: #EFF1F9;">
                                            <!-- Start Job -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('start_job') has-danger @enderror">
                                                    <p class="mb-2">3) @lang('form.startJob'): <span class="tx-danger">*</span></p>
                                                    <input data-jdp data-jdp-max-date="today" type="text" id="start_job" class="form-control @error('start_job') form-control-danger @enderror" name="start_job" value="{{ $employee->start_job ?? old('start_job') }}" required>

                                                    @error('start_job')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Education -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('education') has-danger @enderror">
                                                    <p class="mb-2">4) @lang('form.education'):</p>
                                                    <input type="text" id="education" class="form-control @error('education') form-control-danger @enderror" name="education" value="{{ $employee->education ?? old('education') }}">

                                                    @error('education')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Start Duty and Education-->

                                        <!-- Personal Information -->
                                        <p class="bd-b mb-2 tx-bold pb-2">
                                            <span class="badge badge-primary badge-pill">1</span>
                                            @lang('pages.employees.personalInfo')
                                        </p>

                                        <!-- Name & Last Name -->
                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('name') has-danger @enderror">
                                                    <p class="mb-2">5) @lang('form.name'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $employee->name ?? old('name') }}" required>

                                                    @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Last Name -->
                                            <div class="col-md-6">
                                                <div class="form-group @error('last_name') has-danger @enderror">
                                                    <p class="mb-2">6) @lang('form.lastName'):</p>
                                                    <input type="text" id="last_name" class="form-control @error('last_name') form-control-danger @enderror" name="last_name" value="{{ $employee->last_name ?? old('last_name') }}">

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
                                                    <input type="text" id="father_name" class="form-control @error('father_name') form-control-danger @enderror" name="father_name" value="{{ $employee->father_name ?? old('father_name') }}" required>

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
                                                        <option value="1" {{ $employee->gender == 1 ? 'selected' : '' }}>@lang('form.male')</option>
                                                        <option value="0" {{ $employee->gender == 0 ? 'selected' : '' }}>@lang('form.female')</option>
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
                                                    <p class="mb-2">9) @lang('form.lastDuty'):</p>
                                                    <input type="text" id="last_duty" class="form-control @error('last_duty') form-control-danger @enderror" name="last_duty" value="{{ $employee->last_duty ?? old('last_duty') }}">

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
                                                    <input type="number" id="birth_year" class="form-control @error('birth_year') form-control-danger @enderror" name="birth_year" value="{{ $employee->birth_year ?? old('birth_year') }}" required>

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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- Appointment Number -->
                                                        <div class="form-group @error('appointment_number') has-danger @enderror">
                                                            <p class="mb-2">11) @lang('form.appointmentNumber'): <span class="tx-danger">*</span></p>
                                                            <input type="text" id="appointment_number" class="form-control @error('appointment_number') form-control-danger @enderror" name="appointment_number" value="{{ $employee->appointment_number ?? old('appointment_number') }}" required>

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
                                                            <input type="text" id="appointment_date" class="form-control @error('appointment_date') form-control-danger @enderror" name="appointment_date" value="{{ $employee->appointment_date ?? old('appointment_date') }}" required>

                                                            @error('appointment_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <!--/==/ End of Appointment Date -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <!-- NID-Number -->
                                                <div class="form-group @error('nid_number') has-danger @enderror">
                                                    <p class="mb-2">13) نمبر تذکره: <span class="tx-danger">*</span></p>
                                                    <input type="text" id="nid_number" class="form-control @error('nid_number') form-control-danger @enderror" name="nid_number" value="{{ $employee->nid_number ?? old('nid_number') }}" required>

                                                    @error('nid_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of NID-Number -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Appointment Number and Date -->

                                        <!-- Employee Number and Email -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Employee Number -->
                                                <div class="form-group @error('emp_number') has-danger @enderror">
                                                    <p class="mb-2">14) @lang('form.empNumber'): <span class="tx-danger">*</span></p>
                                                    <input type="number" id="emp_number" class="form-control @error('emp_number') form-control-danger @enderror" name="emp_number" value="{{ $employee->emp_number ?? old('emp_number') }}">

                                                    @error('emp_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Employee Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Email Address -->
                                                <div class="form-group @error('email') has-danger @enderror">
                                                    <p class="mb-2">15) @lang('form.email'):</p>
                                                    <input type="email" id="email" class="form-control @error('email') form-control-danger @enderror" name="email" value="{{ $employee->email ?? old('email') }}">

                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Email Address -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Employee Number and Email Address -->

                                        <!-- Main Address -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Main Province -->
                                                <div class="form-group @error('main_province') has-danger @enderror">
                                                    <p class="mb-2">16) @lang('form.mainProvince'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="main_province" class="form-control @error('main_province') form-control-danger @enderror" name="main_province" value="{{ $employee->main_province ?? old('main_province') }}" required>

                                                    @error('main_province')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Main Province -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Main District -->
                                                <div class="form-group @error('main_district') has-danger @enderror">
                                                    <p class="mb-2">17) @lang('form.mainDistrict'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="main_district" class="form-control @error('main_district') form-control-danger @enderror" name="main_district" value="{{ $employee->main_district ?? old('main_district') }}" required>

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
                                                    <p class="mb-2">18) @lang('form.currentProvince'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="current_province" class="form-control @error('current_province') form-control-danger @enderror" name="current_province" value="{{ $employee->current_province ?? old('current_province') }}" required>

                                                    @error('current_province')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Current Province -->
                                            </div>
                                            <div class="col-md-6">
                                                <!-- Current District -->
                                                <div class="form-group @error('current_district') has-danger @enderror">
                                                    <p class="mb-2">19) @lang('form.currentDistrict'): <span class="tx-danger">*</span></p>
                                                    <input type="text" id="current_district" class="form-control @error('current_district') form-control-danger @enderror" name="current_district" value="{{ $employee->current_district ?? old('current_district') }}" required>

                                                    @error('current_district')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Current District -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Current Address -->

                                        <!-- Phone Number -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Phone Number -->
                                                <div class="form-group @error('phone') has-danger @enderror">
                                                    <p class="mb-2">20) @lang('form.phone'):</p>
                                                    <input type="text" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ $employee->phone ?? old('phone') }}">

                                                    @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Phone Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Phone Number 2 -->
                                                <div class="form-group @error('phone2') has-danger @enderror">
                                                    <p class="mb-2">21) @lang('form.phone') @lang('global.alternative'): </p>
                                                    <input type="text" id="phone2" class="form-control @error('phone2') form-control-danger @enderror" name="phone2" value="{{ $employee->phone2 ?? old('phone2') }}">

                                                    @error('phone2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Phone Number 2 -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Phone Number -->
                                        <!--/==/ End of General Information -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- PRR/NPR -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- PRR/NPR -->
                                                <div class="form-group @error('prr_npr') has-danger @enderror">
                                                    <p class="mb-2">22) PRR/NPR: <span class="tx-danger">*</span></p>

                                                    <select class="form-control" name="prr_npr" id="prr_npr">
                                                        <option value="NPR" {{ $employee->prr_npr == 'NPR' ? 'selected' : '' }}>NPR</option>
                                                        <option value="PRR" {{ $employee->prr_npr == 'PRR' ? 'selected' : '' }}>PRR</option>
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
                                                    <p class="mb-2">23) PRR Date:</p>
                                                    <input data-jdp data-jdp-max="today" type="text" id="email" class="form-control @error('prr_date') form-control-danger @enderror" name="prr_date" value="{{ $employee->prr_date ?? old('prr_date') }}">

                                                    @error('prr_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of PRR Date -->
                                            </div>
                                        </div>
                                        <!--/==/ End of PRR/NPR -->

                                        <!-- Introducer & Hostel -->
                                        <div class="row" style="background-color: #EFF1F9;">
                                            <div class="col-md-6">
                                                <!-- Hostel -->
                                                <div class="form-group @error('hostel_id') has-danger @enderror">
                                                    <p class="mb-2">24) @lang('pages.hostel.hostel'):</p>
                                                    <select class="form-control select2" name="hostel_id" id="hostel_id">
                                                        <option selected>@lang('global.home')</option>
                                                        @foreach($hostels as $hostel)
                                                            <option value="{{ $hostel->id }}" {{ $employee->hostel_id == $hostel->id ? 'selected' : '' }}>@lang('pages.hostel.roomNumber') {{ $hostel->number }} - {{ $hostel->section }} ({{ $hostel->place }})</option>
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
                                                    <p class="mb-2">25) @lang('form.introducer'):</p>
                                                    <input type="text" id="introducer" class="form-control @error('introducer') form-control-danger @enderror" name="introducer" value="{{ $employee->introducer ?? old('introducer') }}">

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
                                            <p class="mb-2">26) @lang('global.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ $employee->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Information -->

                                        <!-- Photo -->
                                        <div class="form-group @error('photo') has-danger @enderror">
                                            <p class="mb-2">27) @lang('form.photo'):</p>
                                            @if($employee->image)
                                                <img src="{{ $employee->image }}" width="30">
                                            @endif
                                            <input type="file" class="dropify" name="photo" accept="image/*" data-height="200" />
                                            @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Photo -->

                                        <!-- Signature -->
                                        <div class="form-group @error('signature') has-danger @enderror">
                                            <p class="mb-2">28) نمونه امضاء:</p>
                                            @if($employee->signature)
                                                <img src="{{ asset('storage/signatures/' . $employee->signature) }}" width="30">
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

        // If On Duty Checkbox has been checked
        if($('input[type="checkbox"]').parents('#onDutyParent')){
            $('#onDutyCheck').change(function() {
                if (this.checked) {
                    $('#mpText').show();
                    $('#on_duty').show();
                } else {
                    $('#on_duty').val("0");
                    $('#on_duty').hide();
                    $('#mpText').hide();
                }
            })
        }

        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#document').on('change', function() {
                $(".imgPreview").html("");
                multiImgPreview(this, 'div.imgPreview');
            });
        });
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
