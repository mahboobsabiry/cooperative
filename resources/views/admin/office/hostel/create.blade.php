@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ثبت اتاق جدید')
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
                <h2 class="main-content-title tx-24 mg-b-5">ثبت اتاق جدید</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.hostel.index') }}">@lang('pages.hostel.hostel')</a></li>
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
                                <h6 class="card-title mb-1">ثبت اتاق</h6>
                                <p class="text-muted card-sub-title">You can add new record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.hostel.store') }}">
                                @csrf
                                <!-- Place -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Place -->
                                        <div class="form-group @error('place') has-danger @enderror">
                                            <p class="mb-2">موقعیت: <span class="tx-danger">*</span></p>
                                            <select name="place" id="place" class="form-control">
                                                <option value="محصولی">محصولی</option>
                                                <option value="سرحدی">سرحدی</option>
                                                <option value="پورت یکم">پورت یکم</option>
                                            </select>

                                            @error('select')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Place -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Capacity -->
                                        <div class="form-group @error('capacity') has-danger @enderror">
                                            <p class="mb-2">گنجایش تعداد نفر: <span class="tx-danger">*</span></p>
                                            <input type="number" id="capacity" class="form-control @error('capacity') form-control-danger @enderror" name="capacity" value="{{ '5' ?? old('capacity') }}" required>

                                            @error('capacity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Capacity -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Number -->
                                        <div class="form-group @error('number') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.hostel.roomNumber'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="number" class="form-control @error('number') form-control-danger @enderror" name="number" value="{{ old('number') }}" placeholder="@lang('pages.hostel.roomNumber')" required>

                                            @error('number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Number -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Section -->
                                        <div class="form-group @error('section') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.hostel.roomSection'): </p>

                                            <select name="section" id="section" class="form-control">
                                                <option value="" selected>@lang('form.chooseOne')</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                            </select>

                                            @error('section')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Section -->
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
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
