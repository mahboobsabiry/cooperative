@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('pages.exitDoor.emptyVehicles'))
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.ed-empty.index') }}">@lang('pages.exitDoor.emptyVehicles')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.ed-empty.show', $item->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.edit')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ route('admin.ed-empty.index') }}">
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
                                <h6 class="card-title mb-1">@lang('global.edit')</h6>
                                <p class="text-muted card-sub-title">You can edit record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.ed-empty.update', $item->id) }}" data-parsley-validate="">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Company Name -->
                                        <div class="form-group @error('c_name') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.exitDoor.cName'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="c_name" class="form-control @error('c_name') form-control-danger @enderror" name="c_name" value="{{ $item->c_name ?? old('c_name') }}" placeholder="@lang('pages.exitDoor.cName')" required>

                                            @error('c_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Company Name -->

                                        <!-- Vehicle Plate & Trailer Number -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- Vehicle Plate Number -->
                                                <div class="form-group @error('vp_number') has-danger @enderror">
                                                    <p class="mb-2">@lang('pages.exitDoor.vpNumber'): <span class="tx-danger">*</span></p>

                                                    <input type="text" id="vp_number" class="form-control @error('vp_number') form-control-danger @enderror" name="vp_number" value="{{ $item->vp_number ?? old('vp_number') }}" placeholder="@lang('pages.exitDoor.vpNumber')" required>

                                                    @error('vp_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Vehicle Plate Number -->
                                            </div>

                                            <div class="col-md-6">
                                                <!-- Vehicle Trailer Plate Number -->
                                                <div class="form-group @error('vpt_number') has-danger @enderror">
                                                    <p class="mb-2">@lang('pages.exitDoor.vptNumber'):</p>

                                                    <input type="text" id="vpt_number" class="form-control @error('vpt_number') form-control-danger @enderror" name="vpt_number" value="{{ $item->vpt_number ?? old('vpt_number') }}" placeholder="@lang('pages.exitDoor.vptNumber')">

                                                    @error('vpt_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <!--/==/ End of Vehicle Trailer Plate Number -->
                                            </div>
                                        </div>
                                        <!--/==/ End of Vehicle Plate & Trailer Number -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- ENEX -->
                                        <div class="form-group @error('enex') has-danger @enderror">
                                            <p class="mb-2">EN-EX: <span class="tx-danger">*</span></p>

                                            <input type="number" id="enex" class="form-control @error('enex') form-control-danger @enderror" name="enex" value="{{ $item->enex ?? old('enex') }}" placeholder="EN-EX*" required>

                                            @error('enex')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of ENEX -->

                                        <!-- Description -->
                                        <div class="form-group @error('desc') has-danger @enderror">
                                            <p class="mb-2">@lang('form.description'):</p>
                                            <textarea name="desc" class="form-control @error('desc') form-control-danger @enderror" placeholder="@lang('form.description')">{{ $item->desc ?? old('desc') }}</textarea>

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
