@extends('layouts.admin.master')
<!-- Title -->
@section('title', $company->name)
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
                        <a href="{{ route('admin.office.companies.index') }}">شرکت ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('office_company_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $company->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.office.companies.delete')
                        </div>
                    @endcan

                    @can('office_company_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="modal-effect btn btn-sm ripple btn-info"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#edit_record{{ $company->id }}"
                               title="@lang('global.edit')">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>

                            @include('admin.office.companies.edit')
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

                <!-- Details Card -->
                <div class="card mb-2">
                    <div class="card-header tx-15 tx-bold mg-b-20">
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
                                        <p class="font-weight-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $company->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">نام:</p>
                                    </div>
                                    <div class="col">{{ $company->name }}</div>
                                </div>

                                <!-- TIN -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">نمبر تشخیصیه:</p>
                                    </div>
                                    <div class="col">{{ $company->tin }}</div>
                                </div>

                                <!-- Type -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> نوع:</p>
                                    </div>
                                    <div class="col">@foreach(explode(',', $company->type) as $t) <span class="tag tag-sm tag-info">{{ $t }}</span> - @endforeach</div>
                                </div>

                                <!-- Background -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">رزومه:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $company->background ?? '--' }}</p>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $company->info ?? '--' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of General Information -->

                            <!-- Other Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات دیگر</h6>
                                <!-- Agent -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">نماینده:</p>
                                    </div>
                                    <div class="col">{{ $company->agent->name ?? '-' }}</div>
                                </div>
                            </div>
                            <!--/==/ End of Other Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details Card -->
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
