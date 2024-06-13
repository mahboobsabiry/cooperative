@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'جواز فعالیت شرکت ' . $cal->company_name)
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
                <h2 class="main-content-title tx-24 mg-b-5">جواز فعالیت شرکت</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.asycuda.coal.index') }}">جواز فعالیت شرکت ها</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">جزئیات جواز فعالیت شرکت {{ $cal->company_name }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                @if($cal->status == 1)
                    <div class="d-flex">
                        @can('asy_coal_delete')
                            <div class="mr-2">
                                <!-- Delete -->
                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                   data-effect="effect-sign" data-toggle="modal"
                                   href="#delete_record{{ $cal->id }}">
                                    <i class="fe fe-trash"></i>
                                    @lang('global.delete')
                                </a>

                                @include('admin.asycuda.coal.delete')
                            </div>
                        @endcan

                        @can('asy_coal_edit')
                            <div class="mr-2">
                                <!-- Edit -->
                                <a class="btn ripple bg-dark btn-sm tx-white"
                                   href="{{ route('admin.asycuda.coal.edit', $cal->id) }}">
                                    <i class="fe fe-edit"></i>
                                    @lang('global.edit')
                                </a>
                            </div>
                        @endcan

                        @can('asy_coal_create')
                            <div class="mr-2">
                                <!-- Add -->
                                <a class="btn ripple bg-primary btn-sm tx-white"
                                   href="{{ route('admin.asycuda.coal.create') }}">
                                    <i class="fe fe-plus-circle"></i>
                                    @lang('global.add')
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Details Card -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header tx-15 tx-bold">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Company Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات شرکت</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                                    </div>
                                    <div class="col">ID-{{ $cal->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.name'):</strong></p>
                                    </div>
                                    <div class="col">{{ $cal->company_name }}</div>
                                </div>

                                <!-- TIN -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.tin'):</strong></p>
                                    </div>
                                    <div class="col">{{ $cal->company_tin }}</div>
                                </div>

                                <!-- Owner Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>نام مالک/رئیس:</strong></p>
                                    </div>
                                    <div class="col">{{ $cal->owner_name }}</div>
                                </div>

                                <!-- Owner Phone -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>شماره تماس مالک/رئیس:</strong></p>
                                    </div>
                                    <div class="col"><a href="callto:{{ $cal->owner_phone }}">{{ $cal->owner_phone }}</a></div>
                                </div>

                                <!-- Phone -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.phone'):</strong></p>
                                    </div>
                                    <div class="col"><a href="callto:{{ $cal->phone }}">{{ $cal->phone }}</a></div>
                                </div>

                                <!-- Email -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.email'):</strong></p>
                                    </div>
                                    <div class="col"><a href="mailto:{{ $cal->email }}">{{ $cal->email }}</a></div>
                                </div>

                                <!-- Address -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.address'):</strong></p>
                                    </div>
                                    <div class="col">{{ $cal->address }}</div>
                                </div>

                                <!-- Created Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.createdDate'):</strong></p>
                                    </div>
                                    <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($cal->created_at)) }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'): </strong>:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $cal->info ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Company Information -->

                            <!-- License Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات جواز</h6>
                                <!-- License Number -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>نمبر جواز:</strong></p>
                                    </div>
                                    <div class="col">{{ $cal->license_number }}</div>
                                </div>

                                <!-- License Export Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>تاریخ صدور جواز:</strong></p>
                                    </div>
                                    <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->export_date)) }}</div>
                                </div>

                                <!-- License Expire Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>تاریخ ختم جواز:</strong></p>
                                    </div>
                                    <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->expire_date)) }}</div>
                                </div>

                                <!-- Valid Days -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>مدت اعتبار:</strong></p>
                                    </div>
                                    <div class="col">{{ now()->diffInDays($cal->export_date) + now()->diffInDays($cal->expire_date) + 1 }} روز</div>
                                </div>

                                <!-- Valid Time -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>زمان باقیمانده:</strong></p>
                                    </div>
                                    <div class="col">
                                        @php
                                            $v_date = now()->diffInDays($cal->expire_date);
                                            if (today() < $cal->expire_date) {
                                                echo $v_date . " روز باقیمانده";
                                            } else {
                                                echo "تاریخ ختم شده";
                                            }
                                        @endphp
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.status')</strong></p>
                                    </div>
                                    <div class="col">
                                        @if($cal->status == 1)
                                            <span class="text-success">@lang('global.active')</span>
                                        @else
                                            <span class="text-danger">@lang('global.inactive') - ختم جواز فعالیت</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of License Information -->
                        </div>
                    </div>

                    <div class="card-footer">
                        <!-- Buttons -->
                        @can('asy_coal_create')
                            <div class="row">
                                <p class="m-2"><a href="{{ route('admin.asycuda.coal.reg_form', $cal->id) }}" target="_blank" class="btn btn-outline-success">فورمه ثبت جواز شرکت</a></p>

                                <p class="m-2"><a href="{{ route('admin.asycuda.coal.refresh', $cal->id) }}" class="btn btn-outline-danger">تازه سازی</a></p>
                            </div>
                        @endcan
                    </div>
                </div>
                <!--/==/ End of Details Card -->

                <!-- CAL Form Card -->
                <div class="card mb-2">
                    <div class="card-header">
                        <div class="">
                            <h5 class="font-weight-bold">فورم جواز فعالیت شرکت</h5>
                            <p class="text-muted">فورم جواز فعالیت شرکت پس از تایید مراجع ذیربط و تصدیق مقامات ذیصلاح و سایر اسناد مرتبط اینجا نمایش داده می‌شود.</p>
                        </div>
                    </div>

                    <div class="card-body">
                        <!-- User Information Details -->
                        <div class="">

                            <!-- File -->
                            <div class="col-md-12">
                                <!-- Form -->
                                <form method="post" action="{{ route('admin.asycuda.coal.upload_file', $cal->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <p class="mb-2">
                                        <span class="caption bg-gray-300">نوت: فایل آپلود شده باید از نوع عکس بوده باشد، فرمن های (.jpg .png .jpeg) مجاز می باشد.</span>
                                    </p>
                                    <div class="form-group row m-2">
                                        <div class="{{ app()->getLocale() == 'en' ? 'mr-1' : 'ml-1' }}">
                                            <input type="file" accept="image/*" class="form-control" name="file[]" multiple>
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-outline-primary" value="آپلود">
                                        </div>
                                    </div>
                                </form>

                                <div class="row bd">
                                    @foreach($cal->files as $file)
                                        <div class="bd m-1 p-1">
                                            <!-- Delete -->
                                            <a class="pos-absolute modal-effect btn btn-sm btn-danger"
                                               data-effect="effect-sign" data-toggle="modal"
                                               href="#delete_file{{ $file->id }}">
                                                <i class="fe fe-trash"></i>
                                            </a>

                                            @include('admin.asycuda.coal.delete_file')

                                            <a href="{{ asset('storage/coal/files/' . $file->path) ?? asset('assets/images/id-card-default.png') }}"
                                               target="_blank">
                                                <img src="{{ asset('storage/coal/files/' . $file->path) ?? asset('assets/images/id-card-default.png') }}" alt="اسناد" width="150">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--/==/ End of Information Details -->
                    </div>
                </div>
                <!--/==/ End of CAL Form Card -->

                @include('admin.asycuda.coal.resumes')
            </div>
        </div>
        <!--/==/ End of Row Content -->
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
