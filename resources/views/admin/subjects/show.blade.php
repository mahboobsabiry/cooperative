@extends('layouts.admin.master')
<!-- Title -->
@section('title', $subject->title)
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
                        <a href="{{ route('admin.subjects.index') }}">{{ __('مضامین') }}</a>
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
                           href="#delete_record{{ $subject->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.subjects.ed')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.subjects.edit', $subject->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.subjects.create') }}">
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
            <div class="col-md-12">
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $subject->title }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fe fe-book-open"></i> مضمون
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($subject->created_at)) }}</p>
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
                                    <div class="col">ID-{{ $subject->id }}</div>
                                </div>

                                <!-- Member -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('عنوان مضمون') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $subject->title }}</div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'): </strong></p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $subject->info ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of Global Information -->

                            <!-- Other Information -->
                            <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">{{ __('معلومات دیگر') }}</h6>
                                <!-- Books Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('تعداد کتب') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $subject->books->count() }}</div>
                                </div>

                                <!-- Books Closets Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('تعداد الماری کتب') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $subject->books()->distinct('closet_number')->count() }}</div>
                                </div>

                                <!-- Books Shelves Number -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>{{ __('تعداد قفسه کتب') }}: </strong></p>
                                    </div>
                                    <div class="col">{{ $subject->books()->distinct('shelf_number')->count() }}</div>
                                </div>
                            </div>
                            <!--/==/ End of Other Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details -->

                <!-- Table Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Table Title -->
                        <div>
                            <h6 class="card-title font-weight-bold mb-1">{{ __('تعداد کتب این مضمون') }} ({{ count($subject->books) }})</h6>
                            <p class="text-muted card-sub-title"></p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive mt-2">
                            <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">{{ __('تصویر پوش کتاب') }}</th>
                                    <th class="text-center">@lang('form.name')</th>
                                    <th class="text-center">{{ __('مولف') }}</th>
                                    <th class="text-center">نمبر الماری</th>
                                    <th class="text-center">نمبر قفسه</th>
                                    <th class="text-center">@lang('global.createdDate')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($subject->books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- Image -->
                                        <td><img src="{{ $user->image ?? asset('assets/images/books/no-image.png') }}" width="50" class="rounded-1"></td>
                                        <!-- Name -->
                                        <td><a href="{{ route('admin.books.show', $book->id) }}">{{ $book->name }}</a></td>
                                        <td>{{ $book->author_name }}</td>
                                        <!-- Closet Number -->
                                        <td class="tx-sm-12-f">{{ $book->closet_number }}</td>
                                        <!-- Shelf Number -->
                                        <td class="tx-sm-12-f">{{ $book->shelf_number }}</td>
                                        <!-- Created Date -->
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($book->created_at)) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Table -->
                    </div>
                    <!--/==/ End of Table Card Body -->
                </div>
                <!--/==/ End of Table Card -->
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
