@extends('layouts.admin.master')
<!-- Title -->
@section('title', config('app.name') . ' ~ ' . trans('admin.sidebar.users'))
<!-- Extra Styles -->
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Select 2 -->
    <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Sumoselect css-->
    <link href="{{ asset('backend/assets/plugins/sumoselect/sumoselect.css') }}" rel="stylesheet">
@endsection
<!--/==/ End of Extra Styles -->

<!-- Page Content -->
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.sidebar.users')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.sidebar.users')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('user_create')
                    <a class="btn ripple btn-primary" href="{{ route('admin.users.create') }}" target="_blank">
                        <i class="fe fe-plus-circle"></i> @lang('global.new')
                    </a>
                @endcan
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Success Message -->
                        @if(session()->has('success'))
                            <div class="alert alert-success mg-b-2" role="alert">
                                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>@lang('global.wellDone')!</strong> {{ session()->get('success') }}
                            </div>
                        @endif

                        <!-- Table Title -->
                        <div>
                            <h6 class="card-title mb-1">@lang('admin.sidebar.users')</h6>
                            <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of
                                a complex application. The Buttons extension for DataTables provides three plug-ins that
                                provide overlapping functionality for data export:</p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="exportexample"
                                   class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.avatar')</th>
                                    <th>@lang('form.name')</th>
                                    <th>@lang('form.email')</th>
                                    <th>@lang('admin.sidebar.roles')</th>
                                    <th>@lang('global.information')</th>
                                    <th>@lang('global.createdDate')</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ $loop->iteration }}
                                            @else
                                                <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('backend/users', $user->avatar) }}" class="card-img rounded-50">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if(!empty($user->roles))
                                                @foreach($user->roles as $role)
                                                    <a class="modal-effect"
                                                       data-effect="effect-sign" data-toggle="modal"
                                                       href="#role_details{{ $role->id }}" style="text-decoration: underline; color: #0f0373">{{ $role->name }}</a>

                                                    @include('admin.users.role_details')
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($user->info, 100, '...') }}</td>
                                        <td>
                                            @if(app()->getLocale() == 'en')
                                                {{ date_format($user->created_at, 'Y-F-d / h:i A') }}
                                            @else
                                                <span class="tx-bold">
                                                @php
                                                     $date = \Morilog\Jalali\CalendarUtils::strftime('Y-m-d / h:i A - %A', strtotime($user->created_at)); // 1395-02-19
                                                     echo \Morilog\Jalali\CalendarUtils::convertNumbers($date);
                                                @endphp
                                                </span>
                                            @endif
                                            </td>
                                        <td>
                                            <!-- Edit -->
                                            @can('user_update')
                                                <a class="btn btn-sm ripple btn-info" href="{{ route('admin.users.edit', $user->id) }}"
                                                   title="@lang('pages.users.editUser')">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            @endcan

                                            <!-- Delete -->
                                            @can('user_delete')
                                                <a class="modal-effect btn btn-sm ripple btn-danger"
                                                   data-effect="effect-sign" data-toggle="modal"
                                                   href="#delete_record{{ $user->id }}"
                                                   title="@lang('pages.users.deleteUser')">
                                                    <i class="fe fe-delete"></i>
                                                </a>

                                                @include('admin.users.delete')
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--/==/ End of Table -->
                    </div>
                    <!--/==/ End of Table Card Body -->
                </div>
                <!--/==/ End of Table Card -->
            </div>
        </div>
        <!--/==/ End of Data Table -->
    </div>
@endsection
<!--/==/ End of Page Content -->

<!-- Extra Scripts -->
@section('extra_js')
    <!-- Data Table js -->
    <script src="{{ asset('backend/assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/table-data.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.colVis.min.js') }}"></script>
@endsection
<!--/==/ End of Extra Scripts -->
