@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت کتاب جدید')
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.new')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.books.index') }}">کتاب‌ها</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.new')</li>
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
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form Title -->
                            <div>
                                <h6 class="card-title font-weight-bold mb-1">ثبت کتاب جدید</h6>
                                <p class="text-muted card-sub-title">تعداد کتاب های موجود ({{ \App\Models\Admin\Book::all()->count() }})</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Subject  -->
                                        <div class="form-group @error('subject_id') has-danger @enderror">
                                            <p class="mb-2">{{ __('مضمون') }}: <span class="tx-danger">*</span></p>
                                            <select name="subject_id" class="form-control select2">
                                                <option value="">@lang('form.chooseOne')</option>
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->title }}</option>
                                                @endforeach
                                            </select>

                                            @error('subject_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Subject -->

                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror" id="name_div">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ old('name') }}" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Author Name -->
                                        <div class="form-group @error('author_name') has-danger @enderror" id="author_name">
                                            <p class="mb-2">{{ __('نام مولف') }}:</p>
                                            <input type="text" id="author_name" class="form-control @error('author_name') form-control-danger @enderror" name="author_name" value="{{ old('author_name') }}">

                                            @error('author_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Author Name -->

                                        <!-- Closet Number -->
                                        <div class="form-group @error('closet_number') has-danger @enderror">
                                            <p class="mb-2">{{ __('نمبر الماری') }}: <span class="tx-danger">*</span></p>
                                            <input type="number" id="closet_number" class="form-control @error('closet_number') form-control-danger @enderror" name="closet_number" value="{{ old('closet_number') }}" required>

                                            @error('closet_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Closet Number -->

                                        <!-- Shelf Number -->
                                        <div class="form-group @error('shelf_number') has-danger @enderror">
                                            <p class="mb-2">{{ __('نمبر قفسه') }}: <span class="tx-danger">*</span></p>
                                            <input type="number" id="shelf_number" class="form-control @error('shelf_number') form-control-danger @enderror" name="shelf_number" value="{{ old('shelf_number') }}" required>

                                            @error('shelf_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Shelf Number -->
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

                                        <!-- Image -->
                                        <div class="form-group @error('img') has-danger @enderror">
                                            <p class="mb-2">{{ __('تصویر پوش کتاب') }}:</p>
                                            <input type="file" class="dropify" name="img" accept="image/*" data-height="200" />
                                            @error('img')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Image -->

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
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
