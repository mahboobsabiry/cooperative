@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.positions.addPosition'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.positions.addPosition')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.positions.index') }}">@lang('admin.sidebar.positions')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.positions.addPosition')</li>
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
                <div class="card mb-2">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title mb-1">@lang('pages.positions.addPosition')</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.positions.store') }}" data-parsley-validate="">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Under Hand -->
                                        <div class="form-group @error('parent_id') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.positions.underHand'): <span class="tx-danger">*</span></p>

                                            <select id="parent_id" name="parent_id" class="form-control select2 @error('parent_id') form-control-danger @enderror">
                                                <option value="" selected>@lang('form.chooseOne')</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}">{{ $position->title }} ({{ $position->place }})</option>
                                                @endforeach
                                            </select>

                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Under Hand -->

                                        <!-- Title -->
                                        <div class="form-group @error('title') has-danger @enderror">
                                            <p class="mb-2">@lang('form.title'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="title" class="form-control @error('title') form-control-danger @enderror" name="title" value="{{ old('title') }}" placeholder="@lang('form.title')" required>

                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Title -->

                                        <!-- Position Code -->
                                        <div class="form-group" id="codeDiv">
                                            <p class="mb-2">@lang('form.code'): <span class="tx-danger">*</span></p>
                                            <div class="input-group" id="codeInnerDiv">
                                                <input class="form-control" id="codeInput" type="text" name="code[0][code]" value="{{ old('code') }}" placeholder="@lang('form.code')">
                                                <span class="input-group-btn btn btn-primary" id="addInputBtn"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                        <!--/==/ End of Position Code -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Number of Positions -->
                                        <div class="form-group @error('num_of_pos') has-danger @enderror">
                                            <p class="mb-2">@lang('form.num_of_pos'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="num_of_pos" class="form-control @error('num_of_pos') form-control-danger @enderror" name="num_of_pos" value="1" placeholder="@lang('form.num_of_pos')" required>

                                            @error('num_of_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Number of Positions -->

                                        <!-- Position Number -->
                                        <div class="form-group @error('position_number') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.positions.positionNumber'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="position_number" class="form-control @error('position_number') form-control-danger @enderror" name="position_number" value="{{ old('position_number') }}" placeholder="@lang('pages.positions.positionNumber')" required>

                                            @error('position_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Position Number -->

                                        <!-- Place -->
                                        <div class="form-group @error('type') has-danger @enderror">
                                            <p class="mb-2">موقعیت: <span class="tx-danger">*</span></p>

                                            <select id="place" name="place" class="form-control select2 @error('place') form-control-danger @enderror">
                                                <option value="محصولی">محصولی</option>
                                                <option value="سرحدی">سرحدی</option>
                                                <option value="نایب آباد">نایب آباد</option>
                                                <option value="میدان هوایی">میدان هوایی</option>
                                                <option value="مراقبت سیار">مراقبت سیار</option>
                                            </select>

                                            @error('place')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Type -->

                                        <!-- Description -->
                                        <div class="form-group @error('desc') has-danger @enderror">
                                            <p class="mb-2">@lang('form.extraInfo'):</p>
                                            <textarea name="desc" class="form-control @error('desc') form-control-danger @enderror" placeholder="@lang('form.extraInfo')">{{ old('desc') }}</textarea>

                                            @error('desc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Description -->
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
    <script>
        $(document).ready(function (){
            var i = 0;
            $('#addInputBtn').click(function (){
                ++i;
                $('#codeInnerDiv').append(`<div class="input-group mb-1"><input class="form-control" id="codeInput" type="text" name="inputs[`+i+`][name]"><span class="input-group-btn btn btn-danger" id="removeInputBtn"><i class="fa fa-minus"></i></span></div>`);
            });

            $(document).on("click", "#removeInputBtn", function (){
                $(this).parent('div').remove();
            });
        });
    </script>
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
