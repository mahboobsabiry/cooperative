@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'تضمین - ' . $assurance->good_name)
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.details')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.warehouse.assurances.index') }}">تضمین ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('warehouse_assurance_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $assurance->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.warehouse.assurances.delete')
                        </div>
                    @endcan

                    @can('warehouse_assurance_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.warehouse.assurances.edit', $assurance->id) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                    @endcan

                    @can('warehouse_assurance_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.warehouse.assurances.create') }}">
                                @lang('global.new')
                                <i class="fe fe-plus-circle"></i>
                            </a>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <div class="card">
                    <div class="card-header tx-15 tx-bold">
                        @lang('global.details')
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- General Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات عمومی</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $assurance->id }}</div>
                                </div>

                                <!-- Company Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">اسم شرکت:</p>
                                    </div>
                                    <div class="col">{{ $assurance->company->name }}</div>
                                </div>

                                <!-- Company TIN -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">نمبر تشخیصیه شرکت:</p>
                                    </div>
                                    <div class="col">{{ $assurance->company->tin }}</div>
                                </div>

                                <!-- Good Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">نوع جنس:</p>
                                    </div>
                                    <div class="col">{{ $assurance->good_name }}</div>
                                </div>

                                <!-- Assurance Amount -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">مقدار تضمین:</p>
                                    </div>
                                    <div class="col">{{ $assurance->assurance_total }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $assurance->reason ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of General Information -->

                            <!-- Assurance Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات تضمین</h6>

                                <!-- Inquiry Number -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">نمبر استعلام:</p>
                                    </div>
                                    <div class="col">{{ $assurance->inquiry_number }}</div>
                                </div>

                                <!-- Inquiry Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تاریخ استعلام:</p>
                                    </div>
                                    <div class="col">{{ $assurance->inquiry_date }}</div>
                                </div>

                                <!-- Bank TT Number -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">نمبر آویز بانکی:</p>
                                    </div>
                                    <div class="col">{{ $assurance->bank_tt_number }}</div>
                                </div>

                                <!-- Bank TT Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تاریخ آویز بانکی:</p>
                                    </div>
                                    <div class="col">{{ $assurance->bank_tt_date }}</div>
                                </div>

                                <!-- Expire Date -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تاریخ ختم:</p>
                                    </div>
                                    <div class="col">{{ $assurance->expire_date }}</div>
                                </div>

                                <!-- Number of Valid Days -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">اعتبار:</p>
                                    </div>
                                    <div class="col">
                                        @php
                                            $convert_inq_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->inquiry_date)->toCarbon();
                                            $convert_exp_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->expire_date)->toCarbon();
                                            echo $convert_inq_date->diffInDays($convert_exp_date) . ' روز';
                                        @endphp
                                    </div>
                                </div>

                                <!-- Number of Remaining Days -->
                                <div class="row">
                                    <div class="col-6 col-sm-5">
                                        <p class="fw-semi-bold mb-1">تعداد روز باقیمانده:</p>
                                    </div>
                                    <div class="col">
                                        @php
                                            $convert_exp_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->expire_date)->toCarbon();
                                            $diffInDays = today()->diffInDays($convert_exp_date);
                                            if ($diffInDays <= 10) {
                                                echo "<span class='text-danger'>" . $diffInDays . " روز </span>";
                                            } else {
                                                echo $diffInDays . " روز ";
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Assurance Information -->
                        </div>
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
    <script src="{{ asset('backend/assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
