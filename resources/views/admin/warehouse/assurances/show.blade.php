@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'تضمین - ' . $assurance->good_name)
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
                        <a href="{{ route('admin.warehouse.assurances.index') }}">تضمین ها</a>
                    </li>
                    <li class="breadcrumb-item active"
                        aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <div class="d-flex">
                    @can('warehouse_assurance_delete')
                        <div class="mr-2">
                            <!-- Delete -->
                            <a class="modal-effect btn btn-sm ripple btn-danger text-white"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $assurance->id }}"
                               title="@lang('global.delete')">
                                @lang('global.delete')
                                <i class="fe fe-trash"></i>
                            </a>

                            @include('admin.warehouse.assurances.delete')
                        </div>
                    @endcan

                    @can('warehouse_assurance_edit')
                        <div class="mr-2">
                            <!-- Edit -->
                            <a class="btn ripple bg-dark btn-sm text-white"
                               href="{{ route('admin.warehouse.assurances.edit', $assurance->id) }}">
                                @lang('global.edit')
                                <i class="fe fe-edit"></i>
                            </a>
                        </div>
                    @endcan

                    @can('warehouse_assurance_create')
                        <div class="mr-2">
                            <!-- Add -->
                            <a class="btn ripple btn-primary btn-sm" href="{{ route('admin.warehouse.assurances.create') }}">
                                @lang('global.new')
                                <i class="fe fe-plus-circle"></i>
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
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2">
                            <div class="main-content-label tx-13 mg-b-20">
                                @lang('global.details')
                            </div>

                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <!-- Table 1 -->
                                    <tbody class="p-0">
                                    <!-- Header -->
                                    <tr>
                                        <th><strong># </strong></th>
                                        <th><strong>نام شرکت </strong></th>
                                        <th><strong>نوع جنس </strong></th>
                                        <th><strong>مقدار تضمین </strong></th>
                                        <th><strong>نمبر استعلام </strong></th>
                                        <th><strong>تاریخ استعلام </strong></th>
                                    </tr>

                                    <!-- Body -->
                                    <tr>
                                        <td>{{ $assurance->id }}</td>
                                        <td>{{ $assurance->company->name }}</td>
                                        <td>{{ $assurance->good_name }}</td>
                                        <td>{{ $assurance->assurance_total }}</td>
                                        <td>{{ $assurance->inquiry_number }}</td>
                                        <td>{{ $assurance->inquiry_date }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Table 1 -->

                                    <!-- Table 2 -->
                                    <tbody class="p-0">
                                    <!-- Header -->
                                    <tr>
                                        <th><strong>نمبر آویز بانکی </strong></th>
                                        <th><strong>تاریخ آویز بانکی </strong></th>
                                        <th><strong>تاریخ ختم </strong></th>
                                        <th><strong>تعداد روز </strong></th>
                                        <th><strong>تعداد روز های باقیمانده </strong></th>
                                        <th><strong>علت </strong></th>
                                    </tr>

                                    <!-- Body -->
                                    <tr>
                                        <td>{{ $assurance->bank_tt_number }}</td>
                                        <td>{{ $assurance->bank_tt_date }}</td>
                                        <td>{{ $assurance->expire_date }}</td>
                                        <td>
                                            @php
                                                $convert_inq_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->inquiry_date)->toCarbon();
                                                $convert_exp_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->expire_date)->toCarbon();
                                                echo $convert_inq_date->diffInDays($convert_exp_date) . ' روز';
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                $convert_exp_date = \Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $assurance->expire_date)->toCarbon();
                                                $diffInDays = today()->diffInDays($convert_exp_date);
                                                if ($diffInDays <= 10) {
                                                    echo "<span class='text-danger'>" . $diffInDays . " روز </span>";
                                                } else {
                                                    echo $diffInDays . " روز ";
                                                }
                                            @endphp
                                        </td>
                                        <td>{{ $assurance->reason }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Table 2 -->
                                </table>
                            </div>
                        </div>
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
