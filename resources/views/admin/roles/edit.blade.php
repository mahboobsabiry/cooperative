@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('pages.roles.editRole'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('pages.roles.editRole')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">@lang('admin.sidebar.roles')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('pages.roles.editRole')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Back -->
                <a class="btn btn-orange btn-sm btn-with-icon" href="{{ route('admin.roles.index') }}">
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
                        <h6 class="card-title mb-1">@lang('pages.roles.editRole')</h6>
                        <p class="text-muted card-sub-title">You can add new record here.</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Row -->
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Form -->
                                <form method="post" action="{{ route('admin.roles.update', $role->id) }}" data-parsley-validate="">
                                    @csrf
                                    @method('PUT')
                                    <div class="">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name" class="form-control @error('name') form-control-danger @enderror" name="name" value="{{ $role->name ?? old('name') }}" placeholder="@lang('form.name')" required>
                                        </div>

                                        @error('name')
                                        <div class="form-control-feedback">{{ $message }}</div>
                                        @enderror

                                        <!-- Permissions -->
                                        <div class="form-group @error('permissions') has-danger @enderror checked1">
                                            <p class="mb-2">
                                                @lang('admin.sidebar.permissions'): <span class="tx-danger">*</span>
                                                <span class="btn btn-primary btn-sm deselect-all pl-1 pr-1" id="mybutton">@lang('global.deselectAll')</span>
                                                &nbsp;
                                                <span class="btn btn-success btn-sm select-all" id="mybutton">@lang('global.selectAll')</span>
                                            </p>
                                            <div class="selectgroup selectgroup-pills p-2" style="border: 1px solid gainsboro;">
                                                <div class="d-grid">
                                                    @foreach($permissions as $permission)
                                                        <label class="selectgroup-item checkboxes">
                                                            <input id="checkAll" type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="selectgroup-input"
                                                            @if($role) {{ $role->permissions->contains($permission->id) ? 'checked' : '' }} @endif>
                                                            <span class="selectgroup-button rounded-0">{{ $permission->name }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            @error('permissions[]')
                                            <div class="form-control-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-primary rounded-2" type="submit">@lang('global.save')</button>
                                    </div>
                                </form>
                                <!--/==/ End of Form -->
                            </div>
                        </div>
                        <!--/==/ End of Row -->
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
