@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت مکتوب جدید')
<!-- Extra Styles -->
@section('extra_css')

@endsection
<!--/==/ End of Extra Styles -->

<!-- Main Content of The Page -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">ثبت مکتوب جدید</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.documents.index') }}">مکاتیب</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ثبت مکتوب جدید</li>
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
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Errors Message -->
                        @include('admin.inc.alerts')

                        <!-- Form Title -->
                        <div>
                            <h6 class="card-title mb-1">ثبت مکتوب جدید</h6>
                            <p class="text-muted card-sub-title">You can add new record here.</p>
                        </div>

                        <!-- Form -->
                        <form method="post" action="{{ route('admin.office.documents.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('admin.inc.create_docs_form')

                            <div class="modal-footer">
                                <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                            </div>
                        </form>
                        <!--/==/ End of Form -->
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
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
