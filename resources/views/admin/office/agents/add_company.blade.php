@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.new') . ' ~ ' . trans('pages.companies.company'))
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
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.new')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.office.agents.show', $agent->id) }}">@lang('global.details')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.new')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">

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
                        <h6 class="card-title tx-15 tx-bold mb-1">ثبت شرکت - نماینده ({{ $agent->name }})</h6>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="">
                            <!-- Form -->
                            <form method="post" action="{{ route('admin.office.agents.add_agent_company', $agent->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Name -->
                                        <div class="form-group @error('name') has-danger @enderror">
                                            <p class="mb-2">@lang('form.name'): <span class="tx-danger">*</span></p>
                                            <p type="text" id="name" class="form-control bg-gray-300 text-dark">{{ $agent->name }}</p>
                                        </div>

                                        <!-- From Date -->
                                        <div class="form-group @error('from_date') has-danger @enderror">
                                            <p class="mb-2">@lang('form.fromDate'): <span class="tx-danger">*</span></p>
                                            <input data-jdp type="text" id="from_date" class="form-control @error('from_date') form-control-danger @enderror" name="from_date" value="{{ old('from_date') }}" required>

                                            @error('from_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- To Date -->
                                        <div class="form-group @error('to_date') has-danger @enderror">
                                            <p class="mb-2">@lang('form.toDate'): <span class="tx-danger">*</span></p>
                                            <input data-jdp type="text" id="to_date" class="form-control @error('to_date') form-control-danger @enderror" name="to_date" value="{{ old('to_date') }}" required>

                                            @error('to_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Document Number -->
                                        <div class="form-group @error('doc_number') has-danger @enderror">
                                            <p class="mb-2">@lang('pages.employees.docNumber'): <span class="tx-danger">*</span></p>
                                            <input type="text" id="doc_number" class="form-control @error('doc_number') form-control-danger @enderror" name="doc_number" value="{{ old('doc_number') }}" required>

                                            @error('doc_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <!-- Company -->
                                        <div class="form-group @error('company_id') has-danger @enderror" id="companyDiv">
                                            <p class="mb-2">شرکت:</p>

                                            <select id="company_id" name="company_id" class="form-control select2 @error('company_id') form-control-danger @enderror">
                                                <option value="">@lang('form.chooseOne')</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}">{{ $company->tin . ' - ' . $company->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Company -->
                                        <div class="form-group @error('company_name') has-danger @enderror" id="companyName">
                                            <p class="mb-2">نام شرکت: <span class="tx-danger">*</span></p>

                                            <input type="text" id="company_name" class="form-control @error('company_name') form-control-danger @enderror" name="company_name" value="{{ old('company_name') }}" required>

                                            @error('company_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- TIN -->
                                        <div class="form-group @error('tin') has-danger @enderror" id="companyTin">
                                            <p class="mb-2">@lang('form.tin'): <span class="tx-danger">*</span></p>

                                            <input type="number" id="tin" class="form-control @error('tin') form-control-danger @enderror" name="tin" value="{{ old('tin') }}" required>

                                            @error('tin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Company Activity Sector -->
                                        <div class="form-group @error('activity_sector') has-danger @enderror" id="as_div">
                                            <p class="mb-2">@lang('form.activity_sector'): <span class="tx-danger">*</span></p>

                                            <select class="form-control select2" name="activity_sector[]" multiple>
                                                <option value="واردات" selected>واردات</option>
                                                <option value="صادرات">صادرات</option>
                                                <option value="بارچالانی">بارچالانی</option>
                                                <option value="TIR">TIR</option>
                                            </select>

                                            @error('activity_sector')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description -->
                                        <div class="form-group @error('info') has-danger @enderror">
                                            <p class="mb-2">@lang('form.extraInfo'):</p>
                                            <textarea name="info" class="form-control @error('info') form-control-danger @enderror">{{ old('info') }}</textarea>

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

    <script>
        // Select Employee
        $(document).ready(function() {
            $(document).on('change', '#company_id', function () {
                var company_id = $(this).val();
                var a = $("#company_name").parent();
                var b = $("#tin").parent();
                var c = $("#as_div").parent();

                if (!company_id == '') {
                    c.find('#as_div').hide();
                    $.ajax({
                        type: 'get',
                        url: '{{ route('admin.office.agents.select.company') }}',
                        data: { 'company_id': company_id },
                        dataType: 'json',
                        success: function (data) {
                            a.find('#company_name').val(data.company_name);
                            b.find('#tin').val(data.tin);
                        },
                        error: function () {
                            alert("ERROR");
                            $(".errorMsg").html(data.error);
                        }
                    });
                } else {
                    a.find('#company_name').val("");
                    b.find('#tin').val("");
                    c.find('#as_div').show();
                }
            });
        });
    </script>
@endsection
<!--/==/ End of Extra Scripts -->
