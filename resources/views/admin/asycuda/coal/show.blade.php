@extends('layouts.admin.master')
<!-- Title -->
@section('title', 'جواز فعالیت شرکت ' . $cal->company_name)
<!-- Extra Styles -->
@section('extra_css')
    @if(app()->getLocale() == 'en')
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/treeview.css') }}" rel="stylesheet">
    @endif
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">یوزر کارمند</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.asycuda.coal.index') }}">جواز فعالیت شرکت ها</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('global.details')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                @if($cal->status == 1)
                    <div class="d-flex">
                        @can('asy_coal_delete')
                            <div class="mr-2">
                                <!-- Delete -->
                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                   data-effect="effect-sign" data-toggle="modal"
                                   href="#delete_record{{ $cal->id }}">
                                    <i class="fe fe-trash"></i>
                                    @lang('global.delete')
                                </a>

                                @include('admin.asycuda.coal.delete')
                            </div>
                        @endcan

                        @can('asy_coal_edit')
                            <div class="mr-2">
                                <!-- Edit -->
                                <a class="btn ripple bg-dark btn-sm tx-white"
                                   href="{{ route('admin.asycuda.coal.edit', $cal->id) }}">
                                    <i class="fe fe-edit"></i>
                                    @lang('global.edit')
                                </a>
                            </div>
                        @endcan

                        @can('asy_coal_create')
                            <div class="mr-2">
                                <!-- Add -->
                                <a class="btn ripple bg-primary btn-sm tx-white"
                                   href="{{ route('admin.asycuda.coal.create') }}">
                                    <i class="fe fe-plus-circle"></i>
                                    @lang('global.add')
                                </a>
                            </div>
                        @endcan
                    </div>
                @endif
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Row Content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card main-content-body-profile">

                    <!-- Card Body -->
                    <div class="card-body tab-content h-100">
                        <!-- Success Message -->
                        @include('admin.inc.alerts')

                        <!-- User Information Details -->
                        <div class="p-2">
                            <!-- Personal Information -->
                            <div class="main-content-label tx-13 mg-b-20 bd-b tx-bold pb-2">
                                @lang('global.details')
                            </div>
                            <!-- Personal Information Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered">
                                    <!-- First Table -->
                                    <tbody class="p-0">
                                    <!-- Details -->
                                    <tr>
                                        <td colspan="8" class="font-weight-bold">
                                            معلومات
                                        </td>
                                    </tr>

                                    <tr>
                                        <th><strong>نمبر مسلسل</strong></th>
                                        <th><strong>نام شرکت</strong></th>
                                        <th><strong>نمبر تشخیصیه</strong></th>
                                        <th><strong>جواز فعالیت</strong></th>
                                        <th><strong>تاریخ صدور جواز</strong></th>
                                        <th><strong>تاریخ ختم جواز</strong></th>
                                        <th><strong>مدت اعتبار</strong></th>
                                        <th><strong>زمان باقیمانده</strong></th>
                                    </tr>

                                    <tr>
                                        <td>{{ $cal->id }}</td>
                                        <td>{{ $cal->company_name }}</td>
                                        <td>{{ $cal->company_tin }}</td>
                                        <td>{{ $cal->license_number }}</td>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->export_date)) }}</td>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->expire_date)) }}</td>
                                        <td>
                                            {{ now()->diffInDays($cal->export_date) + now()->diffInDays($cal->expire_date) + 1 }}
                                        </td>
                                        <td>
                                            @php
                                                $v_date = now()->diffInDays($cal->expire_date);
                                                if (today() < $cal->expire_date) {
                                                    echo $v_date . " روز باقیمانده";
                                                } else {
                                                    echo "تاریخ ختم شده";
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of First Table -->

                                    <!-- Second Table -->
                                    <tbody class="p-0">
                                    <tr>
                                        <th><strong>نام مالک/رئیس</strong></th>
                                        <th><strong>شماره تماس مالک/رئیس</strong></th>
                                        <th><strong>شماره تماس</strong></th>
                                        <th><strong>ایمیل</strong></th>
                                        <th><strong>آدرس</strong></th>
                                        <th><strong>@lang('form.status')</strong></th>
                                        <th colspan="2"><strong>@lang('global.extraInfo')</strong></th>
                                    </tr>

                                    <tr>
                                        <td>{{ $cal->owner_name }}</td>
                                        <td>{{ $cal->owner_phone }}</td>
                                        <td>{{ $cal->phone }}</td>
                                        <td>{{ $cal->email }}</td>
                                        <td>{{ $cal->address }}</td>
                                        <td>
                                            @if($cal->status == 1)
                                                <span class="text-success">@lang('global.active')</span>
                                            @else
                                                <span class="text-danger">@lang('global.inactive') - ختم جواز فعالیت</span>
                                            @endif
                                        </td>
                                        <td colspan="2">{{ $cal->info }}</td>
                                    </tr>
                                    </tbody>
                                    <!--/==/ End of Second Table -->
                                </table>
                            </div>
                            <!--/==/ End of Personal Information -->

                            @can('asy_coal_create')
                                <div class="row">
                                    <p class="m-2"><a href="{{ route('admin.asycuda.coal.reg_form', $cal->id) }}" target="_blank" class="btn btn-outline-success">فورمه ثبت جواز شرکت</a></p>

                                    <p class="m-2"><a href="{{ route('admin.asycuda.coal.refresh', $cal->id) }}" class="btn btn-outline-danger">تازه سازی</a></p>
                                </div>
                            @endcan
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
    <script src="{{ asset('backend/assets/js/pages/user-scripts.js') }}"></script>

    @include('admin.inc.status_scripts')
@endsection
<!--/==/ End of Extra Scripts -->
