@extends('layouts.admin.master')
@section('title', 'اعضاء')
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
                <h2 class="main-content-title tx-24 mg-b-5">{{ __('اعضاء') }}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a
                            href="{{ route('admin.dashboard') }}">@lang('admin.dashboard.dashboard')</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('اعضاء') }}</li>
                </ol>
            </div>

            <!-- Btn List -->
            <div class="btn btn-list">
                <!-- Add New -->
                <a class="btn ripple btn-primary" href="{{ route('admin.members.create') }}">
                    <i class="fe fe-plus-circle"></i> @lang('global.new')
                </a>
            </div>
        </div>
        <!--/==/ End of Page Header -->

        <!-- Data Table -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Table Card -->
                <div class="card custom-card overflow-hidden">
                    <!-- Table Title -->
                    <div class="card-header">
                        <h6 class="card-title font-weight-bold mb-1">{{ __('اعضاء') }} ({{ $members->count() }})</h6>
                    </div>

                    <!-- Table Card Body -->
                    <div class="card-body">
                        <!-- Messages -->
                        @include('admin.inc.alerts')

                        <!-- Table -->
                        <div class="table-responsive">
                            <table id="exportexample"
                                   class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('form.image')</th>
                                    <th>@lang('form.name')</th>
                                    <th>@lang('form.fatherName')</th>
                                    <th>{{ __('مجموع سپرده های موجود') }}</th>
                                    <th>@lang('global.extraInfo')</th>
                                    <th>@lang('global.createdDate')</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($members as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <!-- IMAGE -->
                                        <td>
                                            @if($member->avatar)
                                                <a href="{{ $member->image }}" target="_blank">
                                                    <img src="{{ $member->image }}" alt="" width="60">
                                                </a>
                                            @else
                                                <img src="{{ asset('assets/images/members/no-image.jpeg') }}" alt="" width="60">
                                            @endif
                                        </td>
                                        <!-- Name -->
                                        <td>
                                            <a href="{{ route('admin.members.show', $member->id) }}">
                                                {{ $member->name }}
                                            </a>
                                        </td>
                                        <td>{{ $member->father_name }}</td>
                                        <td>{{ $member->deposit_amount }}<sup>اف</sup></td>
                                        <!-- Info -->
                                        <td>{{ \Illuminate\Support\Str::limit($member->info, 200, '...') }}</td>
                                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($member->created_at)) }}</td>
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
    <script src="{{ asset('assets/js/datatable.js') }}"></script>
@endsection
