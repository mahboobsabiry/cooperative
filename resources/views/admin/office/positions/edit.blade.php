@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.positions.editPosition'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.positions.editPosition')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.positions.index') }}">@lang('admin.sidebar.positions')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.positions.show', $position->id) }}">@lang('global.details')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.positions.editPosition')</li>
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
                        <h6 class="card-title font-weight-bold mb-1">@lang('pages.positions.editPosition')</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.positions.update', $position->id) }}" data-parsley-validate="">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Under Hand -->
                                        <div class="form-group @error('parent_id') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.positions.underHand'): <span class="tx-danger">*</span></p>

                                            <select id="parent_id" name="parent_id" class="form-control select2 @error('parent_id') form-control-danger @enderror">
                                                @if($position->parent_id == null)
                                                    <option value="" selected>@lang('pages.positions.afCustomsDep')</option>
                                                @endif

                                                @foreach($positions as $pos)
                                                    <option value="{{ $pos->id ?? '' }}" {{ $position->parent_id == $pos->id ? 'selected' : '' }}>{{ $pos->title }} ({{ $pos->place->name }})</option>
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
                                            <input type="text" id="title" class="form-control @error('title') form-control-danger @enderror" name="title" value="{{ $position->title ?? old('title') }}" placeholder="@lang('form.title')" required>

                                            @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Title -->

                                        <!-- Number of Positions -->
                                        <div class="form-group @error('num_of_pos') has-danger @enderror">
                                            <p class="mb-2">@lang('form.num_of_pos'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="num_of_pos" class="form-control @error('num_of_pos') form-control-danger @enderror" name="num_of_pos" value="{{ $position->num_of_pos ?? old('num_of_pos') }}" placeholder="@lang('form.num_of_pos')" required>

                                            @error('num_of_pos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Number of Positions -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Position Number -->
                                        <div class="form-group @error('position_number') has-danger @enderror">
                                            <p class="mb-2">@lang('form.position'): <span class="tx-danger">*</span></p>
                                            <input type="number" id="position_number" class="form-control @error('position_number') form-control-danger @enderror" name="position_number" value="{{ $position->position_number ?? old('position_number') }}" placeholder="@lang('form.position')" required>

                                            @error('position_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Position Number -->

                                        <!-- Place -->
                                        <div class="form-group @error('place') has-danger @enderror">
                                            <p class="mb-2">موقعیت: <span class="tx-danger">*</span></p>

                                            <select id="place" name="place" class="form-control select2 @error('place') form-control-danger @enderror">
                                                @foreach($places as $place)
                                                    <option value="{{ $place->id }}" {{ $position->place_id == $place->id ? 'selected' : '' }}>{{ $place->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('place')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Place -->

                                        <!-- Description -->
                                        <div class="form-group @error('desc') has-danger @enderror">
                                            <p class="mb-2">@lang('form.extraInfo'):</p>
                                            <textarea name="desc" class="form-control @error('desc') form-control-danger @enderror" placeholder="@lang('form.extraInfo')">{{ $position->desc ?? old('desc') }}</textarea>

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
    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/advanced-form-elements.js') }}"></script>

    <!-- Form-elements js-->
    <script src="{{ asset('backend/assets/js/form-elements.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
