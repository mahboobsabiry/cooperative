@extends('layouts.admin.master')
<!-- Title -->
@section('title', trans('global.details') . ' ' . $budget->title)
<!-- Extra Styles -->
@section('extra_css')
    @if(app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @endif
    <style>
        .emp-profile-img {
            width: 190px;
            height: 190px;
            position: absolute;
            z-index: 1;
            margin-top: 80px;
            margin-right: 80px;
            border-radius: 70%;
            padding-left: 8px;
            padding-bottom: 0;
            padding-right: 8px;
        }
        .id-card-img {
            width: 360px; height: 590px;
            -webkit-border-radius: 10px;
            -webkit-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -moz-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -ms-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -o-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
        }
        .id-card-back-img {
            -webkit-border-radius: 10px;
            -webkit-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -moz-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -ms-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            -o-filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
            filter: drop-shadow(0px 16px 10px rgba(0,0,225,0.6));
        }
        .emp-name {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 386px;
            font-size: xx-large;
            color: blue;
            font-weight: bold;
        }
        .emp-pos-title {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 437px;
            font-size: large;
            color: black;
            font-weight: bolder;
        }
        .emp-id {
            position: absolute;
            z-index: 1;
            margin-top: 468px;
            margin-right: 108px;
            font-family: "Times New Roman";
            font-size: 23px;
            color: black;
            font-weight: 500;
        }
        .emp-phone {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 1;
            margin-top: 494px;
            font-family: "Times New Roman";
            font-size: 23px;
            color: black;
            font-weight: bolder;
        }
    </style>
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('global.details')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.finance.budgets.index') }}">@lang('admin.sidebar.budgets')</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('finance_budget_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $budget->id }}"
                               title="@lang('global.details')">
                                <i class="fe fe-trash"></i>
                                @lang('global.delete')
                            </a>

                            @include('admin.finance.budgets.delete')
                        </div>
                    @endcan

                    @can('finance_budget_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm tx-white"
                               href="{{ route('admin.finance.budgets.edit', $budget->id) }}">
                                <i class="fe fe-edit"></i>
                                @lang('global.edit')
                            </a>
                        </div>
                    @endcan

                    @can('finance_budget_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple bg-primary btn-sm tx-white"
                               href="{{ route('admin.finance.budgets.create') }}">
                                <i class="fe fe-plus-circle"></i>
                                @lang('global.add')
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
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $budget->title }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fas fa-dollar-sign"></i> بودجه
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($budget->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details Card -->
                <div class="card mb-2">
                    <!-- Personal Information -->
                    <div class="card-header">
                        <h4 class="card-title font-weight-bold">@lang('global.details')</h4>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- Information -->
                            <div class="col-md-6 p-2 m-1">
                                <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
                                    <span class="badge badge-primary badge-pill">1</span>
                                    @lang('pages.employees.personalInfo')
                                </h5>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                                    </div>
                                    <div class="col">ID-{{ $budget->id }}</div>
                                </div>

                                <!-- Title -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.title'):</strong></p>
                                    </div>
                                    <div class="col">{{ $budget->title }}</div>
                                </div>

                                <!-- Code -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.code'):</strong></p>
                                    </div>
                                    <div class="col">{{ $budget->code }}</div>
                                </div>

                                <!-- Amount -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('form.amount'):</strong></p>
                                    </div>
                                    <div class="col">{{ $budget->amount }}</div>
                                </div>

                                <!-- Extra INFO -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'):</strong></p>
                                    </div>
                                    <div class="col">{{ $budget->info }}</div>
                                </div>
                            </div>
                            <!--/==/ End of Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details Card -->
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>
    <script>
        function printDiv()
        {

            var divToPrint=document.getElementById('printIdCardBack');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},10);

        }
    </script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
