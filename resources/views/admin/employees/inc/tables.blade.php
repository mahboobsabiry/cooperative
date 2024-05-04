<div class="table-responsive ">
    <table class="table table-bordered">
        <!-- First Table -->
        <tbody class="p-0">
        <!-- Details -->
        <tr>
            <td colspan="6" class="font-weight-bold">
                <span class="badge badge-primary badge-pill">1</span>
                @lang('pages.employees.personalInfo')
            </td>
        </tr>

        <!-- Name, Last Name & Father Name -->
        <tr>
            <th><strong>@lang('form.name')</strong></th>
            <th><strong>نام کاربری</strong></th>
            <th><strong>@lang('form.fatherName')</strong></th>
            <th><strong>@lang('form.gender')</strong></th>
            <th><strong>@lang('form.birthYear')</strong></th>
            <th><strong>@lang('form.email')</strong></th>
        </tr>

        <!-- Gender, Birth Year & Employee Number -->
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->username }}</td>
            <td>{{ $employee->father_name }}</td>
            <td>{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</td>
            <td>{{ $employee->birth_year }}
                ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }}
                ساله)
            </td>
            <td><a href="mailto:{{ $employee->email }}"
                   class="ctd">{{ $employee->email }}</a></td>
        </tr>
        </tbody>
        <!--/==/ End of First Table -->

        <!-- Second Table -->
        <tbody>
        <tr>
            <th><strong>@lang('form.phone')</strong></th>
            <th><strong>@lang('form.education')</strong></th>
            <th><strong>آدرس اصلی</strong></th>
            <th><strong>آدرس فعلی</strong></th>
            <th colspan="2"><strong>@lang('global.extraInfo')</strong></th>
        </tr>
        <tr>
            <td>
                <a href="callto:{{ $employee->phone }}"
                   class="ctd">{{ $employee->phone }}</a>
                @if($employee->phone2)
                    , <a href="callto:{{ $employee->phone2 }}"
                         class="ctd">{{ $employee->phone2 }}</a>
                @endif
            </td>
            <td>{{ $employee->education }}</td>
            <td>{{ $employee->main_address }}</td>
            <td>{{ $employee->current_address }}</td>
            <td colspan="2">{{ $employee->info }}</td>
        </tr>
        </tbody>
        <!--/==/ End of Second Table -->
    </table>
</div>
