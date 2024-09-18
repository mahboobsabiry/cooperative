@extends('layouts.admin.master')
<!-- Title -->
@section('title', $company->name)
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
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
                        <a href="{{ route('admin.office.companies.index') }}">شرکت ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('office_company_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $company->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.office.companies.delete')
                        </div>
                    @endcan

                    @can('office_company_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn btn-sm ripple btn-info" href="{{ route('admin.office.companies.edit', $company->id) }}"
                               title="@lang('global.edit')">
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
                <!-- Success Message -->
                @include('admin.inc.alerts')

                <!-- Header Card -->
                <div class="card mb-1">
                    <div class="card-header">
                        <!-- Heading -->
                        <div class="row font-weight-bold">
                            <div class="col-6">
                                {{ $company->name }}
                            </div>
                            <div class="col-6 {{ app()->getLocale() == 'en' ? 'text-right' : 'text-left' }}">
                                <i class="fa fa-building"></i> شرکت بازرگانی
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mr-1 ml-1">
                            <div class="{{ app()->getLocale() == 'en' ? 'pr-2' : 'pl-2' }}"><i class="far fa-clock"></i></div>
                            <div>
                                تاریخ ثبت
                                <br>
                                <p class="text-muted small">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d h:i a', strtotime($company->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Header Card -->

                <!-- Details Card -->
                <div class="card mb-2">
                    <div class="card-header tx-15 tx-bold mg-b-20">
                        @lang('global.details')
                    </div>

                    <!-- Card Body -->
                    <div class="card-body" style="background-color: #F7F9FCFF">
                        <div class="row">
                            <!-- General Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">@lang('pages.companies.company_info')</h6>
                                <!-- ID -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">ID:</p>
                                    </div>
                                    <div class="col">ID-{{ $company->id }}</div>
                                </div>

                                <!-- Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.name'):</p>
                                    </div>
                                    <div class="col">{{ $company->name }}</div>
                                </div>

                                <!-- TIN -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.tin'):</p>
                                    </div>
                                    <div class="col">{{ $company->tin }}</div>
                                </div>

                                <!-- Activity Sector -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1"> @lang('form.activity_sector'):</p>
                                    </div>
                                    <div class="col">@foreach(explode(',', $company->activity_sector) as $t) <span class="text-dark">{{ $t }}</span> - @endforeach</div>
                                </div>

                                <!-- Address -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('global.address'):</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{!! $company->address ?? '' !!}</p>
                                    </div>
                                </div>

                                <!-- Background -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">رزومه:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{!! $company->background ?? '' !!}</p>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">معلومات اضافی:</p>
                                    </div>
                                    <div class="col">
                                        <p class="fst-italic text-400 mb-1">{{ $company->info ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/==/ End of General Information -->

                            <!-- General Information -->
                            <div class="col-lg col-xxl-5">
                                <h6 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">@lang('global.general_info')</h6>
                                <!-- Agent -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('pages.companies.agent'):</p>
                                    </div>
                                    <div class="col">
                                        <a href="{{ route('admin.office.agents.show', $company->agent->id) }}" target="_blank">{{ $company->agent->name ?? '-' }}</a>
                                    </div>
                                </div>

                                <!-- Agent Colleagues -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('pages.companies.agent_cols'):</p>
                                    </div>
                                    <div class="col">
                                        @foreach($company->agent->colleagues as $colleague)
                                            <a href="{{ route('admin.office.agent-colleagues.show', $colleague->id) }}" target="_blank">{{ $colleague->name ?? '-' }}</a> -
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Owner Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.owner_name'):</p>
                                    </div>
                                    <div class="col">{{ $company->owner_name }}</div>
                                </div>

                                <!-- Deputy Name -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.deputy_name'):</p>
                                    </div>
                                    <div class="col">{{ $company->deputy_name }}</div>
                                </div>

                                <!-- Owner ID Card -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.owner_id_card'):</p>
                                    </div>
                                    <div class="col">{{ $company->owner_id_card }}</div>
                                </div>

                                <!-- Owner Phone -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.owner_phone'):</p>
                                    </div>
                                    <div class="col"><a href="tel:{{ $company->owner_phone }}">{{ $company->owner_phone }}</a></div>
                                </div>

                                <!-- Owner Main Address -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.owner_main_add'):</p>
                                    </div>
                                    <div class="col">{{ $company->owner_main_add }}</div>
                                </div>

                                <!-- Owner Current Address -->
                                <div class="row">
                                    <div class="col-5 col-sm-4">
                                        <p class="font-weight-bold mb-1">@lang('form.owner_cur_add'):</p>
                                    </div>
                                    <div class="col">{{ $company->owner_cur_add }}</div>
                                </div>
                            </div>
                            <!--/==/ End of General Information -->
                        </div>
                    </div>
                </div>
                <!--/==/ End of Details Card -->

                <!-- Form -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-2">
                            <div class="card-header font-weight-bold">@lang('global.other_info')</div>
                            <div class="card-body">
                                .//
                            </div>
                        </div>
                    </div>
                </div>
                <!--/==/ End of Form -->
            </div>
        </div>
        <!--/==/ End of Row Content -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <!-- Data Table js -->
    <script src="{{ asset('backend/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('backend/assets/js/datatable.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
