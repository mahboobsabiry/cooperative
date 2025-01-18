@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'ویرایش عضو ' . $member->name)
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.edit')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.members.index') }}">اعضاء</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('ویرایش عضو') }} {{ $member->name }}</li>
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
                <div class="card">
                    <!-- Form Title -->
                    <div class="card-header">
                        <h6 class="card-title font-weight-bold mb-1">{{ __('ویرایش عضو') }}</h6>
                        <p class="text-muted card-sub-title">{{ __('تعداد اعضای موجود') }}
                            ({{ \App\Models\Admin\Member::all()->count() }})</p>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Errors Message -->
                            @include('admin.inc.alerts')

                            <!-- Form -->
                            <form method="post" action="{{ route('admin.members.update', $member->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror" id="name_div">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="name"
                                                   class="form-control @error('name') form-control-danger @enderror"
                                                   name="name" value="{{ $member->name ?? old('name') }}" required>

                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Name -->

                                        <!-- Father Name -->
                                        <div class="form-group @error('father_name') has-danger @enderror"
                                             id="author_name">
                                            <p class="mb-2">@lang('form.fatherName'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="father_name"
                                                   class="form-control @error('father_name') form-control-danger @enderror"
                                                   name="father_name" value="{{ $member->father_name ?? old('father_name') }}" required>

                                            @error('father_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Father Name -->

                                        <!-- Position -->
                                        <div class="form-group @error('position') has-danger @enderror">
                                            <p class="mb-2">{{ __('وظیفه') }}:</p>
                                            <input type="text" id="position"
                                                   class="form-control @error('position') form-control-danger @enderror"
                                                   name="position" value="{{ $member->position ?? old('position') }}">

                                            @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Position -->

                                        <!-- Phone Number -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @error('phone') has-danger @enderror">
                                                    <p class="mb-2">{{ __('شماره تماس') }}: <span class="tx-danger">*</span></p>
                                                    <input type="text" id="phone"
                                                           class="form-control @error('phone') form-control-danger @enderror"
                                                           name="phone" value="{{ $member->phone ?? old('phone') }}" required>

                                                    @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @error('phone2') has-danger @enderror">
                                                    <p class="mb-2">{{ __('شماره تماس') }} 2:</p>
                                                    <input type="text" id="phone2"
                                                           class="form-control @error('phone2') form-control-danger @enderror"
                                                           name="phone2" value="{{ $member->phone2 ?? old('phone2') }}">

                                                    @error('phone2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!--/==/ End of Phone Number -->

                                        <!-- Email -->
                                        <div class="form-group @error('email') has-danger @enderror">
                                            <p class="mb-2">@lang('form.email'):</p>
                                            <input type="email" id="email"
                                                   class="form-control @error('email') form-control-danger @enderror"
                                                   name="email" value="{{ $member->email ?? old('email') }}">

                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Email -->
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Address -->
                                        <div class="form-group @error('address') has-danger @enderror">
                                            <p class="mb-2">@lang('global.address'):</p>
                                            <input type="text" id="address"
                                                   class="form-control @error('address') form-control-danger @enderror"
                                                   name="address" value="{{ $member->address ?? old('address') }}">

                                            @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Address -->

                                        <!-- Information -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('global.extraInfo'):</p>
                                            <textarea name="info"
                                                      class="form-control @error('info') form-control-danger @enderror"
                                                      placeholder="@lang('global.extraInfo')">{{ $member->info ?? old('info') }}</textarea>

                                            @error('info')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Information -->

                                        <!-- Avatar Image -->
                                        <div class="form-group @error('avatar') has-danger @enderror">
                                            <p class="mb-2">{{ __('عکس') }}:</p>
                                            <input type="file" class="dropify" name="avatar" accept="image/*"
                                                   data-height="200"/>

                                            <!-- Delete Avatar -->
                                            @if($member->avatar)
                                                <span class="caption">
                                                    <a href="{{ $member->image }}" target="_blank">
                                                        <img src="{{ $member->image }}" class="img-fluid float-left"
                                                             style="height: 30px;">
                                                    </a>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <!-- Delete -->
                                                    <a onclick="return confirm('{{ trans('global.areYouSure') }}');" class="text-danger float-left" href="{{ route('admin.members.delete.avatar', $member->id) }}" title="@lang('global.delete')">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </span>
                                            @endif
                                            @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!--/==/ End of Avatar Image -->

                                        <div class="form-group float-left">
                                            <button class="btn ripple btn-primary rounded-2"
                                                    type="submit">@lang('global.save')</button>
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
@endsection
<!--/==/ End of Extra Scripts -->
