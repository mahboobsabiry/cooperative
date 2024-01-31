@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.edit') . ' ~ ' . trans('pages.companies.agents'))
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.agents.show', $agent->id) }}">@lang('global.details')</a></li>
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
                <!-- Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form Title -->
                            <div>
                                <h6 class="card-title mb-1">@lang('pages.companies.agents')</h6>
                                <p class="text-muted card-sub-title">You can add new record here.</p>
                            </div>

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.agents.update', $agent->id) }}" data-parsley-validate="">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Company -->
                                        <div class="form-group @error('company_id') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.companies.company'): <span class="tx-danger">*</span></p>

                                            <select id="company_id" name="company_id" class="form-control @error('company_id') form-control-danger @enderror">
                                                <option selected>Choose one</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $agent->company_id == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('company_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Company -->

                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $agent->name ?? old('name') }}" placeholder="@lang('form.name')" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Address -->
                                        <div class="form-group @error('address') has-danger @enderror">
                                            <p class="mb-2">@lang('global.address'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="address" class="form-control @error('address') form-control-danger @enderror" name="address" value="{{ $agent->address ?? old('address') }}" placeholder="@lang('global.address')" required>

                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Address -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Phone -->
                                        <div class="form-group @error('phone') has-danger @enderror">
                                            <p class="mb-2">@lang('form.phone'): <span class="tx-danger">*</span></p>
                                            <input type="tel" id="phone" class="form-control @error('phone') form-control-danger @enderror" name="phone" value="{{ $agent->phone ?? old('phone') }}" placeholder="@lang('form.phone')" required>

                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Phone -->

                                        <!-- Phone2 -->
                                        <div class="form-group @error('phone2') has-danger @enderror">
                                            <p class="mb-2">@lang('form.phone') 2:</p>
                                            <input type="tel" id="phone2" class="form-control @error('phone2') form-control-danger @enderror" name="phone2" value="{{ $agent->phone2 ?? old('phone2') }}" placeholder="@lang('form.phone')" required>

                                            @error('phone2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Phone2 -->

                                        <!-- Description -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('form.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror" placeholder="@lang('form.extraInfo')">{{ $agent->info ?? old('info') }}</textarea>

                                            @error('info')
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
