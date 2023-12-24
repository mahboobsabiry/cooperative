<div class="tab-pane" id="onDuty">
    <div class="main-content-label tx-13 mg-b-20">
        @lang('pages.employees.onDutyEmps')
    </div>

    <!-- Table -->
    <div class="table-responsive mt-2">
        <table class="table table-bordered border-top key-buttons display text-nowrap w-100">
            <thead>
            <tr>
                <th rowspan="2" class="text-center tblBorder">#</th>
                <th colspan="4" class="text-center tblBorder">@lang('global.personalInfo')</th>
                <th colspan="4" class="text-center tblBorder">@lang('pages.employees.generalInfo')</th>
                <th rowspan="2" class="text-center tblBorder">@lang('global.action')</th>
            </tr>
            <tr>
                <th class="text-center">@lang('form.photo')</th>
                <th class="text-center">@lang('form.name')</th>
                <th class="text-center">@lang('form.phone')</th>
                <th class="text-center">@lang('form.email')</th>
                <th class="text-center">@lang('form.position')</th>
                <th class="text-center">@lang('pages.employees.mainPosition')</th>
                <th class="text-center">@lang('pages.positions.positionNumber')</th>
                <th class="text-center">@lang('pages.employees.positionNature')</th>
            </tr>
            </thead>

            <tbody>
            @foreach($onDuty as $employee)
                <tr>
                    <td>
                        @if(app()->getLocale() == 'en')
                            {{ $loop->iteration }}
                        @else
                            <span class="tx-bold">{{ \Morilog\Jalali\CalendarUtils::convertNumbers($loop->iteration) }}</span>
                        @endif
                    </td>
                    <td>
                        <img src="{{ $employee->image }}" class="card-img img-fluid w-50 rounded-50">
                    </td>
                    <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                    <!-- Email Address -->
                    <td class="tx-sm-12-f">
                        <a href="callto:{{ $employee->phone }}" class="ctd">{{ $employee->phone }}</a>
                    </td>
                    <!-- Email Address -->
                    <td><a href="mailto:{{ $employee->email }}" class="tx-sm-12-f ctd">{{ $employee->email }}</a></td>
                    <!-- Position -->
                    <td>
                        <a href="{{ route('admin.positions.show', $employee->position->id) }}" class="ctd">{{ $employee->position->title }}</a>
                    </td>
                    <!-- Main Position -->
                    <td>{{ $employee->main_position ?? '' }}</td>
                    <!-- Position -->
                    <td>{{ $employee->position->position_number }}</td>
                    <!-- Position Nature -->
                    <td>{{ $employee->on_duty == 1 ? trans('pages.employees.mainPosition') : trans('pages.employees.onDuty') }}</td>

                    <!-- Action -->
                    <td>
                        <!-- Show -->
                        <a class="btn btn-sm ripple btn-secondary" href="{{ route('admin.employees.show', $employee->id) }}"
                           title="@lang('pages.users.userProfile')">
                            <i class="fe fe-eye"></i>
                        </a>

                        <!-- Edit -->
                        @can('employee_update')
                            <a class="btn btn-sm ripple btn-info" href="{{ route('admin.employees.edit', $employee->id) }}"
                               title="@lang('pages.users.editUser')">
                                <i class="fe fe-edit"></i>
                            </a>
                        @endcan

                        <!-- Delete -->
                        @can('employee_delete')
                            <a class="modal-effect btn btn-sm ripple btn-danger"
                               data-effect="effect-sign" data-toggle="modal"
                               href="#delete_record{{ $employee->id }}"
                               title="@lang('pages.users.deleteUser')">
                                <i class="fe fe-delete"></i>
                            </a>

                            @include('admin.employees.delete')
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!--/==/ End of Table -->
</div>
