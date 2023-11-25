@extends('layouts.admin.master')
@section('title', config('app.name') . ' ~ ' . trans('admin.sidebar.roles'))
@section('extra_css')
    <!---DataTables css-->
    <link href="{{ asset('backend/assets/plugins/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/responsivebootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <!-- Breadcrumb -->
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">@lang('admin.sidebar.roles')</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@lang('admin.sidebar.roles')</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                @can('permission_create')
                <a class="modal-effect btn ripple btn-primary" data-effect="effect-sign" data-toggle="modal" href="#new_record">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
                @endcan

                @include('admin.roles.create')
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
                        <!-- Errors Message -->
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mg-b-2" role="alert">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong@lang('global.oh')!</strong> {{ $error }}
                                </div>
                            @endforeach
                        @endif

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
                            <h6 class="card-title mb-1">@lang('admin.sidebar.roles')</h6>
                            <p class="text-muted card-sub-title">Exporting data from a table can often be a key part of a complex application. The Buttons extension for DataTables provides three plug-ins that provide overlapping functionality for data export:</p>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="exportexample" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.name')</th>
                                    <th>@lang('form.guardName')</th>
                                    <th>@lang('admin.sidebar.permissions')</th>
                                    <th>@lang('global.createdDate')</th>
                                    <th>@lang('global.action')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                <span>{{ $permission }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ date_format($role->created_at, 'Y-F-d / h:i A') }}</td>
                                        <td>
                                            <!-- Edit -->
                                            @can('role_edit')
                                                <a class="modal-effect btn btn-sm ripple btn-info" data-effect="effect-sign" data-toggle="modal" href="#edit_record{{ $role->id }}">
                                                    <i class="fe fe-edit"></i>
                                                </a>
                                            @endcan
                                            @include('admin.roles.edit')

                                            <!-- Delete -->
                                            @can('role_delete')
                                                <a class="modal-effect btn btn-sm ripple btn-danger" data-effect="effect-sign" data-toggle="modal" href="#delete_record{{ $role->id }}">
                                                    <i class="fe fe-delete"></i>
                                                </a>
                                            @endcan
                                            @include('admin.roles.delete')
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
