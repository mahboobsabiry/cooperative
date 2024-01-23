@extends('layouts.admin.master')
<!-- Title -->
@section('title', $agent->title)
<!-- Extra Styles -->
@section('extra_css')

@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{ $agent->title }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.agents.index') }}">@lang('pages.companies.agents')</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    <div class="mr-2">
                        <!-- Delete -->
                        <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                           data-effect="effect-sign" data-toggle="modal"
                           href="#delete_record{{ $agent->id }}"
                           title="@lang('global.delete')">
                            @lang('global.delete')
                            <i class="fe fe-trash"></i>
                        </a>

                        @include('admin.agents.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.agents.edit', $agent->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.agents.create') }}">
                            @lang('global.new')
                            <i class="fe fe-plus-circle"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-12">
                <div class="card custom-card main-content-body-profile">
                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- User Information Details -->
                        <div class="p-2 bd">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('global.details')
                            </div>

                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table row table-borderless">
                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- ID -->
                                    <tr>
                                        <th class="font-weight-bold">نمبر مسلسل:</th>
                                        <td>AG-{{ $agent->id }}</td>
                                    </tr>

                                    <!-- Name -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.name'):</th>
                                        <td>{{ $agent->name }}</td>
                                    </tr>

                                    <!-- Companies -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('pages.companies.company'):</th>
                                        <td>{{ $agent->companies->count() }}</td>
                                    </tr>
                                    </tbody>

                                    <!-- Left Column -->
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                    <!-- Address -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('global.address'):</th>
                                        <td>{{ $agent->address ?? '' }}</td>
                                    </tr>

                                    <!-- Phone -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.phone'):</th>
                                        <td>{{ $agent->phone }} {{ $agent->phone2 ? ', ' : '' }} {{ $agent->phone2 }}</td>
                                    </tr>

                                    <!-- Date of creation -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('global.date'):</th>
                                        <td>{{ $agent->created_at->diffForHumans() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <hr>

                            <!-- Success Message -->
                            @include('admin.inc.alerts')

                            <!-- Table -->
                            <div class="table-responsive">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold">@lang('admin.sidebar.companies')</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-sm ripple float-left" href="{{ route('admin.agents.add_company', $agent->id) }}">
                                            @lang('global.new')
                                        </a>
                                    </div>
                                </div>

                                <table class="table table-striped table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>@lang('form.name')</th>
                                        <th>@lang('form.tin')</th>
                                        <th>@lang('global.type')</th>
                                        <th>@lang('form.fromDate')</th>
                                        <th>@lang('form.toDate')</th>
                                        <th>@lang('pages.employees.docNumber')</th>
                                        <th>@lang('global.validationStatus')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($agent->companies->count() > 0)
                                        @foreach($agent->companies as $company)
                                            <tr>
                                                <th scope="row">{{ $company->id }}</th>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->tin }}</td>
                                                <td>{{ $company->type == 0 ? trans('pages.companies.import') : trans('pages.companies.export') }}</td>
                                                <td>
                                                    {{ $company->agent->from_date ?? '' }}
                                                    {{ $company->agent->from_date2 ?? '' }}
                                                    {{ $company->agent->from_date3 ?? '' }}
                                                </td>
                                                <td>
                                                    {{ $company->agent->to_date }}
                                                    {{ $company->agent->to_date2 }}
                                                    {{ $company->agent->to_date3 }}
                                                </td>
                                                <td>
                                                    {{ $company->agent->doc_number }}
                                                    {{ $company->agent->doc_number2 }}
                                                    {{ $company->agent->doc_number3 }}
                                                </td>
                                                <td>
                                                    <!-- First Company -->
                                                    @if($agent->to_date)
                                                        <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date)->toCarbon();
                                                            $valid_days = \Carbon\Carbon::now()->diffInDays($to_date);
                                                        @endphp
                                                            {!! $valid_days < 0 ? "<span class='text-danger'>تاریخ ختم شده</span>" : $valid_days . "<span class='text-secondary'> روز باقیمانده</span>" !!}
                                                    </span> <br>
                                                    @endif
                                                    <!-- Second Company -->
                                                    @if($agent->to_date2)
                                                        <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date2)->toCarbon();
                                                            $valid_days = \Carbon\Carbon::now()->diffInDays($to_date);
                                                        @endphp
                                                            {!! $valid_days < 0 ? "<span class='text-danger'>تاریخ ختم شده</span>" : $valid_days . "<span class='text-secondary'> روز باقیمانده</span>" !!}
                                                    </span> <br>
                                                    @endif
                                                    <!-- Third Company -->
                                                    @if($agent->to_date3)
                                                        <span class="bd-b">
                                                        @php
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date3)->toCarbon();
                                                            $valid_days = \Carbon\Carbon::now()->diffInDays($to_date);
                                                        @endphp
                                                            {!! $valid_days < 0 ? "<span class='text-danger'>تاریخ ختم شده</span>" : $valid_days . "<span class='text-secondary'> روز باقیمانده</span>" !!}
                                                    </span> <br>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="8" class="text-center">شرکتی پیدا نشد!</th>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="main-content-label tx-13 mg-b-20 pt-2" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{{ $agent->info ?? '--' }}</p>
                        </div>
                        <!--/==/ End of User Information Details -->
                    </div>
                </div>
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')

@endsection
<!--/==/ End of Extra Scripts -->
