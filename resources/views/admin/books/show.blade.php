@extends('layouts.admin.master')
<!-- Title -->
@section('title', $book->name)
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
                        <a href="{{ route('admin.books.index') }}">{{ __('کتاب‌ها') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $book->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.books.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.books.edit', $book->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.books.create') }}">
                            @lang('global.new')
                            <i class="fe fe-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <!-- Profile Main Info -->
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="main-profile-overview widget-user-image text-center">
                            <div class="main-img-user">
                                <a href="{{ $book->image ?? asset('assets/images/books/no-image.png') }}" target="_blank">
                                    <img alt="image" src="{{ $book->image ?? asset('assets/images/books/no-image.png') }}">
                                </a>
                            </div>
                        </div>

                        <!-- Main Info -->
                        <div class="item-user pro-user">
                            <h4 class="pro-user-username text-dark mt-2 mb-0">
                                <span>{{ $book->name }}</span>
                            </h4>

                            {{ $book->subject->title ?? '' }}

                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                            <a href="javascript:void(0);"><i class="fa fa-star text-warning"> </i></a>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Profile Main Info -->
            </div>
            <div class="col-lg-9 col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $book->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fe fe-book-open"></i> کتاب
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($book->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header tx-15 tx-bold">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Global Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">{{ __('معلومات عمومی') }}</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                                    </div>
                                    <div class="col">ID-{{ $book->id }}</div>
                                </div>

                                <!-- Subject -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('مضمون') }}: </strong></p>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.subjects.show', $book->subject->id) }}">
                                            {{ $book->subject->title }}
                                        </a>
                                    </div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.name'): </strong></p>
                                    </div>
                                    <div class="col">{{ $book->name }}</div>
                                </div>

                                <!-- Author Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('نام مولف') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $book->author_name }}</div>
                                </div>
                            </div>
                            <!--/==/ End of Global Information -->

                            <!-- Other Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">{{ __('معلومات دیگر') }}</h6>
                                <!-- Closet Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('نمبر الماری') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $book->closet_number }}</div>
                                </div>

                                <!-- Shelf Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('نمبر قفسه') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $book->shelf_number }}</div>
                                </div>

                                <!-- Status -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
                                    </div>
                                    <div class="col">{{ $book->status == 1 ? trans('global.active') : trans('global.inactive') }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'): </strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $book->info ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Other Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details -->
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
