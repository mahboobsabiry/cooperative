@extends('layouts.admin.master')
<!-- Title -->
@section('title', $colleague->name . ' -  همکار نماینده')
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
                <h2 class="main-content-title tx-24 mg-b-5">{{ $colleague->name }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.agents.index') }}">@lang('pages.companies.agents')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.office.agent-colleagues.index') }}">همکاران نماینده ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('office_agent_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $colleague->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.office.agent-colleagues.delete')
                        </div>
                    @endcan

                    @can('office_agent_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.office.agent-colleagues.edit', $colleague->id) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                    @endcan
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
                        <!-- Information Details -->
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
                                                    <a href="{{ $colleague->image ?? asset('assets/images/avatar-default.jpeg') }}" target="_blank">
                                                        <img alt="avatar" src="{{ $colleague->image ?? asset('assets/images/avatar-default.jpeg') }}">
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
                                        <td>AGC-{{ $colleague->id }}</td>
                                    </tr>

                                    <!-- Name -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.name'):</th>
                                        <td>{{ $colleague->name }}</td>
                                    </tr>

                                    <!-- Agent -->
                                    <tr>
                                        <th class="font-weight-bold">مافوق:</th>
                                        <td>{{ $colleague->agent->name ?? trans('global.empty') }}</td>
                                    </tr>

                                    <!-- Address -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('global.address'):</th>
                                        <td>{{ $colleague->address ?? '' }}</td>
                                    </tr>

                                    <!-- Phone -->
                                    <tr>
                                        <th class="font-weight-bold">@lang('form.phone'):</th>
                                        <td>{{ $colleague->phone }} {{ $colleague->phone2 ? ', ' : '' }} {{ $colleague->phone2 }}</td>
                                    </tr>
                                    </tbody>

                                    <!-- Left Column -->
                                    @if($colleague->agent)
                                        <tbody class="col-lg-12 col-xl-5 p-0">
                                        <!-- From Date -->
                                        <tr>
                                            <th class="font-weight-bold">@lang('form.fromDate'):</th>
                                            <td>{{ $colleague->from_date }}</td>
                                        </tr>

                                        <!-- To Date -->
                                        <tr>
                                            <th class="font-weight-bold">@lang('form.toDate'):</th>
                                            <td>{{ $colleague->to_date }}</td>
                                        </tr>

                                        <!-- Document Number -->
                                        <tr>
                                            <th class="font-weight-bold">@lang('pages.employees.docNumber'):</th>
                                            <td>{{ $colleague->doc_number }}</td>
                                        </tr>

                                        <!-- Validation Duration -->
                                        <tr>
                                            <th class="font-weight-bold">مدت اعتبار:</th>

                                            <!-- Validation Date Status -->
                                            <td>
                                                @php
                                                    $from_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->from_date)->toCarbon();
                                                    $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();
                                                    $valid_days = $from_date->diffInDays($to_date);
                                                    echo $valid_days . ' روز';
                                                @endphp
                                            </td>
                                        </tr>

                                        <!-- Validation Status -->
                                        <tr>
                                            <th class="font-weight-bold">@lang('global.validationStatus'):</th>

                                            <!-- Validation Date Status -->
                                            <td>
                                                @php
                                                    $to_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $colleague->to_date)->toCarbon();

                                                    // $diff_days = $to_date->diffInDays($from_date);
                                                    $valid_days = now()->diffInDays($to_date);
                                                    if ($to_date > today()) {
                                                        echo "<span class='text-secondary'>$valid_days روز باقیمانده</span>";
                                                    } else {
                                                        echo "<span class='text-danger'>تاریخ ختم شده</span>";
                                                    }
                                                @endphp
                                            </td>
                                            <!--/==/ End of Validation Date Status -->
                                        </tr>
                                        </tbody>
                                    @endif
                                </table>
                            </div>
                            <!--/==/ End of Personal Information Table -->

                            <hr>
                            <!-- Success Message -->
                            @include('admin.inc.alerts')

                            <div class="main-content-label tx-13 mg-b-20 pt-2" style="border-top: 1px solid #ddd;">
                                @lang('global.extraInfo')
                            </div>
                            <p>{!! $colleague->background !!}</p>
                            <p>{{ $colleague->info ?? '--' }}</p>
                        </div>
                        <!--/==/ End of Information Details -->
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
