@extends('layouts.admin.master')
<!-- Title -->
@section('title', $place->name)
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
                        <a href="{{ route('admin.places.index') }}">موقعیت ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @include('admin.places.ed')

                    @can('place_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $place->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>
                        </div>
                    @endcan

                    @can('place_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="modal-effect btn btn-sm ripple bg-dark text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#edit_record{{ $place->id }}"
                               title="@lang('global.edit')">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
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

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $place->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fa fa-map-marker"></i> موقعیت
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($place->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details Card -->
                <div class="card mb-2">
                    <div class="card-header tx-15 tx-bold mg-b-20">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Global Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات عمومی</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $place->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.name'):</p>
                                    </div>
                                    <div class="col">{{ $place->name }}</div>
                                </div>

                                <!-- Code -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.code'):</p>
                                    </div>
                                    <div class="col">{{ $place->code }}</div>
                                </div>

                                <!-- Custom Code -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> کد گمرکی:</p>
                                    </div>
                                    <div class="col">{{ $place->custom_code }}</div>
                                </div>

                                <!-- Status -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> @lang('form.status'):</p>
                                    </div>
                                    <div class="col">
                                        @if($place->status == 1)
                                            <span class="text-success">@lang('global.active')</span>
                                        @else
                                            <span class="text-warning">@lang('global.inactive')</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">
                                            دارای <span class="font-weight-bold">{{ $place->positions->count() }}</span> بست و دارای <span class="font-weight-bold">{{ $place->hostels->count() }}</span> اتاق لیلیه می باشد.
                                            <br>
                                            {{ $place->info }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Global Information -->

                            <!-- Other Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">معلومات دیگر</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $place->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.name'):</p>
                                    </div>
                                    <div class="col">{{ $place->name }}</div>
                                </div>

                                <!-- Code -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.code'):</p>
                                    </div>
                                    <div class="col">{{ $place->code }}</div>
                                </div>

                                <!-- Custom Code -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> کد گمرکی:</p>
                                    </div>
                                    <div class="col">{{ $place->custom_code }}</div>
                                </div>

                                <!-- Status -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> @lang('form.status'):</p>
                                    </div>
                                    <div class="col">
                                        @if($place->status == 1)
                                            <span class="text-success">@lang('global.active')</span>
                                        @else
                                            <span class="text-warning">@lang('global.inactive')</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">
                                            دارای <span class="font-weight-bold">{{ $place->positions->count() }}</span> بست و دارای <span class="font-weight-bold">{{ $place->hostels->count() }}</span> اتاق لیلیه می باشد.
                                            <br>
                                            {{ $place->info }}
                                        </p>
                                    </div>
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
