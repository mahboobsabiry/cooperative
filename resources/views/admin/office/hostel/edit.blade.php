@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ویرایش اتاق نمبر ' . $hostel->number . ' بخش ' . $hostel->place)
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.edit')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.hostel.index') }}">@lang('pages.hostel.hostel')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.hostel.show', $hostel->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.edit')</li>
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
                <div class="card">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title mb-1">ویرایش اتاق</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.hostel.update', $hostel->id) }}">
                                @csrf
                                @method('PUT')
                                <!-- Place -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Place -->
                                        <div class="form-group @error('place_id') has-danger @enderror">
                                            <p class="mb-2">موقعیت: <span class="tx-danger">*</span></p>
                                            <select name="place_id" id="place_id" class="form-control">
                                                @foreach($places as $place)
                                                    <option value="{{ $place->id }}" {{ $hostel->place_id == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('place_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Place -->

                                        <!-- Capacity -->
                                        <div class="form-group @error('capacity') has-danger @enderror">
                                            <p class="mb-2">گنجایش تعداد نفر: <span class="tx-danger">*</span></p>
                                            <input type="number" id="capacity" class="form-control @error('capacity') form-control-danger @enderror" name="capacity" value="{{ $hostel->capacity ?? old('capacity') }}" required>

                                            @error('capacity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Capacity -->

                                        <!-- Number -->
                                        <div class="form-group @error('number') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.hostel.roomNumber'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="number" class="form-control @error('number') form-control-danger @enderror" name="number" value="{{ $hostel->number ?? old('number') }}" placeholder="@lang('pages.hostel.roomNumber')" required>

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
                                                <option value="A" {{ $hostel->section == 'A' ? 'selected' : '' }}>A</option>
                                                <option value="B" {{ $hostel->section == 'B' ? 'selected' : '' }}>B</option>
                                            </select>

                                            @error('section')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Section -->

                                        <!-- Info -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('global.extraInfo'):</p>
                                            <textarea name="info" id="info" class="form-control @error('info') form-control-danger @enderror" placeholder="@lang('global.extraInfo')">{{ $hostel->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Info -->

                                        <div class="form-group">
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
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
