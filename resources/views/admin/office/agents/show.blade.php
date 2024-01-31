@extends('layouts.admin.master')
<!-- Title -->
@section('title', $agent->name)
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
                <h2 class="main-content-title tx-24 mg-b-5">{{ $agent->name }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a>
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

                        @include('admin.office.agents.delete')
                    </div>
                    <div class="mr-2">
                        <!-- Edit -->
                        <a class="btn ripple bg-dark btn-sm text-white"
                           href="{{ route('admin.office.agents.edit', $agent->id) }}">
                            @lang('global.edit')
                            <i class="fe fe-edit"></i>
                        </a>
                    </div>
                    <div class="mr-2">
                        <!-- Add -->
                        <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.office.agents.create') }}">
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
                                    <!-- Photo -->
                                    <tbody class="col-lg-12 col-xl-2 p-0">
                                    <!-- ID -->
                                    <tr>
                                        <td>
                                            <div class="main-profile-overview widget-user-image text-center">
                                                <div class="main-img-user">
                                                    <a href="{{ $agent->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                                        <img alt="avatar" src="{{ $agent->image ?? asset('assets/images/avatar-default.jpeg') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>

                                    <!-- Right Column -->
                                    <tbody class="col-lg-12 col-xl-5 p-0">
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
                                        <th class="font-weight-bold">تعداد شرکت ها و تعداد همکاران:</th>
                                        <td>{{ $agent->companies->count() }} - {{ $agent->colleagues->count() }}</td>
                                    </tr>
                                    </tbody>

                                    <!-- Left Column -->
                                    <tbody class="col-lg-12 col-xl-5 p-0">
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
                                        <td>{{ \Morilog\Jalali\CalendarUtils::date('Y-m-d', $agent->created_at) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <hr>
                            <!-- Success Message -->
                            @include('admin.inc.alerts')

                            <!-- Companies Table -->
                            <div class="table-responsive">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold">@lang('admin.sidebar.companies') ({{ $agent->companies->count() }})</h5>
                                    </div>
                                    <div class="col-md-6">
                                        @if($agent->companies->count() != 3)
                                            <a class="btn btn-primary btn-sm ripple float-left mr-2"
                                               href="{{ route('admin.office.agents.add_company', $agent->id) }}">
                                                @lang('global.new')
                                            </a>
                                        @endif
                                        <!-- Refresh Company -->
                                        <a class="modal-effect btn btn-sm ripple btn-info float-left"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#refresh_agent{{ $agent->id }}">
                                            تازه سازی
                                        </a>

                                        @include('admin.office.agents.refresh_agent')
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
                                        <th>مدت اعتبار</th>
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
                                                    @if($company->name == $agent->company_name)
                                                        {{ $company->agent->from_date }}
                                                    @elseif($company->name == $agent->company_name2)
                                                        {{ $company->agent->from_date2 }}
                                                    @else
                                                        {{ $company->agent->from_date3 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($company->name == $agent->company_name)
                                                        {{ $company->agent->to_date }}
                                                    @elseif($company->name == $agent->company_name2)
                                                        {{ $company->agent->to_date2 }}
                                                    @else
                                                        {{ $company->agent->to_date3 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($company->name == $agent->company_name)
                                                        {{ $company->agent->doc_number }}
                                                    @elseif($company->name == $agent->company_name2)
                                                        {{ $company->agent->doc_number2 }}
                                                    @else
                                                        {{ $company->agent->doc_number3 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- First Company -->
                                                    @if($company->name == $agent->company_name)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date)->toCarbon();
                                                            $valid_days = $to_date->diffInDays($from_date);
                                                            echo $valid_days;
                                                        @endphp
                                                    @endif

                                                    <!-- Second Company -->
                                                    @if($company->name == $agent->company_name2)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date2)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date2)->toCarbon();
                                                            $valid_days = $to_date->diffInDays($from_date);
                                                            echo $valid_days;
                                                        @endphp
                                                    @endif

                                                    <!-- Third Company -->
                                                    @if($company->name == $agent->company_name3)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date3)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date3)->toCarbon();
                                                            $valid_days = $to_date->diffInDays($from_date);
                                                            echo $valid_days;
                                                        @endphp
                                                    @endif
                                                </td>
                                                <td>
                                                    <!-- First Company -->
                                                    @if($company->name == $agent->company_name)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    @endif

                                                    <!-- Second Company -->
                                                    @if($company->name == $agent->company_name2)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date2)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date2)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    @endif

                                                    <!-- Third Company -->
                                                    @if($company->name == $agent->company_name3)
                                                        @php
                                                            $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->from_date3)->toCarbon();
                                                            $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $agent->to_date3)->toCarbon();

                                                            // $diff_days = $to_date->diffInDays($from_date);
                                                            $valid_days = now()->diffInDays($to_date);
                                                            if ($to_date > today()) {
                                                                echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                            } else {
                                                                echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                            }
                                                        @endphp
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="9" class="text-center">شرکتی پیدا نشد!</th>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Companies Table -->

                            <!-- Colleagues Table -->
                            <div class="table-responsive">
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <h5 class="font-weight-bold"> همکاران ({{ $agent->colleagues->count() }})</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <a class="btn btn-primary btn-sm ripple float-left mr-2"
                                           href="{{ route('admin.office.agents.add_colleague', $agent->id) }}">
                                            @lang('global.new')
                                        </a>

                                        <!-- Refresh Agent Colleague -->
                                        <a class="modal-effect btn btn-sm ripple btn-info float-left"
                                           data-effect="effect-sign" data-toggle="modal"
                                           href="#refresh_colleague{{ $agent->id }}">
                                            تازه سازی
                                        </a>

                                        @include('admin.office.agents.refresh_colleague')
                                    </div>
                                </div>

                                <table class="table table-striped table-bordered w-100">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th>@lang('form.name')</th>
                                        <th>مافوق</th>
                                        <th>@lang('form.phone')</th>
                                        <th>@lang('form.fromDate')</th>
                                        <th>@lang('form.toDate')</th>
                                        <th>@lang('pages.employees.docNumber')</th>
                                        <th>@lang('global.address')</th>
                                        <th>مدت اعتبار</th>
                                        <th>@lang('global.validationStatus')</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if($agent->colleagues->count() > 0)
                                        @foreach($agent->colleagues as $colleague)
                                            <tr>
                                                <th scope="row">{{ $colleague->id }}</th>
                                                <td>
                                                    <a href="{{ route('admin.office.agent-colleagues.show', $colleague->id) }}">{{ $colleague->name }}</a>
                                                </td>
                                                <td>{{ $colleague->agent->name }}</td>
                                                <td>{{ $colleague->phone ?? '' }} {{ $colleague->phone2? ', ' : '' }} {{ $colleague->phone2 ?? '' }}</td>
                                                <td>{{ $colleague->from_date }}</td>
                                                <td>{{ $colleague->to_date }}</td>
                                                <td>{{ $colleague->doc_number }}</td>
                                                <td>{{ $colleague->address }}</td>
                                                <!-- Validation Duration -->
                                                <td>
                                                    @php
                                                        $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->from_date)->toCarbon();
                                                        $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();
                                                        $valid_days = $to_date->diffInDays($from_date);
                                                        echo $valid_days;
                                                    @endphp
                                                </td>
                                                <!-- Validation Status -->
                                                <td>
                                                    @php
                                                        $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->from_date)->toCarbon();
                                                        $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();

                                                        $valid_days = now()->diffInDays($to_date);
                                                        if ($to_date > today()) {
                                                            echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                        } else {
                                                            echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th colspan="10" class="text-center">نماینده همکار ندارد!</th>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!--/==/ End of Colleagues Table -->

                            <div class="main-content-label tx-13 mg-b-20 pt-2" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{!! $agent->background !!}</p>
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
