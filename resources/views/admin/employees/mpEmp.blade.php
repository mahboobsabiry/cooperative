<div class="tab-pane" id="mpEmp">
    <div class="main-content-label tx-13 mg-b-20">
        @lang('pages.employees.mpEmps')
    </div>

    <!-- Table -->
    <div class="table-responsive mt-2">
        <table class="table table-bordered border-top key-buttons display text-nowrap w-100">
            <thead>
            <tr>
                <th>#</th>
                <th>@lang('form.photo')</th>
                <th>@lang('form.name')</th>
                <th>@lang('form.fatherName')</th>
                <th>@lang('form.empNumber')</th>
                <th>@lang('form.education')</th>
                <th>@lang('form.phone')</th>
                <th>@lang('form.email')</th>
            </tr>
            </thead>

            <tbody>
            @foreach($mpEmp as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>
                        <img src="{{ $employee->image ? $employee->image : asset('assets/images/avatar-default.jpeg') }}" width="50" class="rounded-50">
                    </td>
                    <td>{{ $employee->name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->father_name ?? '' }}</td>
                    <td>{{ $employee->education ?? '' }}</td>
                    <!-- Email Address -->
                    <td class="tx-sm-12-f">
                        <a href="callto:{{ $employee->phone ?? '' }}" class="ctd">{{ $employee->phone ?? '' }}</a>
                        <a href="callto:{{ $employee->phone2 ?? '' }}" class="ctd">{{ $employee->phone2 ?? '' }}</a>
                    </td>
                    <!-- Email Address -->
                    <td><a href="mailto:{{ $employee->email ?? '' }}" class="tx-sm-12-f ctd">{{ $employee->email ?? '' }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!--/==/ End of Table -->
</div>
