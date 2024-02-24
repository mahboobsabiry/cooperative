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
            <th><strong>@lang('form.name') :</strong></th>
            <th><strong>@lang('form.lastName') :</strong></th>
            <th><strong>@lang('form.fatherName') :</strong></th>
            <th><strong>@lang('form.gender') :</strong></th>
            <th><strong>@lang('form.birthYear') :</strong></th>
            <th><strong>@lang('form.empNumber') :</strong></th>
        </tr>

        <!-- Gender, Birth Year & Employee Number -->
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->father_name }}</td>
            <td>{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</td>
            <td>{{ $employee->birth_year }}
                ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }}
                ساله)
            </td>
            <td>{{ $employee->emp_number }}</td>
        </tr>
        </tbody>
        <!--/==/ End of First Table -->

        <!-- Second Table -->
        <tbody>
        <tr>
            <th><strong>@lang('form.email'): </strong></th>
            <th><strong>@lang('form.phone'): </strong></th>
            <th><strong>@lang('form.appointmentNumber'): </strong></th>
            <th><strong>@lang('form.appointmentDate'): </strong></th>
            <th><strong>@lang('form.lastDuty'): </strong></th>
            <th><strong>@lang('pages.hostel.hostel')/@lang('global.home'): </strong></th>
        </tr>
        <tr>
            <td>
                <a href="mailto:{{ $employee->email }}"
                   class="ctd">{{ $employee->email }}</a>
            </td>
            <td>
                <a href="callto:{{ $employee->phone }}"
                   class="ctd">{{ $employee->phone }}</a>
                @if($employee->phone2)
                    , <a href="callto:{{ $employee->phone2 }}"
                         class="ctd">{{ $employee->phone2 }}</a>
                @endif
            </td>
            <td>{{ $employee->appointment_number }}</td>
            <td>{{ $employee->appointment_date }}</td>
            <td>{{ $employee->last_duty }}</td>
            <td>
                @if($employee->hostel)
                    @lang('pages.hostel.hostel') -
                    @lang('pages.hostel.roomNumber')
                    {{ $employee->hostel->number }}
                    @lang('pages.hostel.section')
                    {{ $employee->hostel->section }}
                @else
                    @lang('global.home')
                @endif
            </td>
        </tr>
        </tbody>
        <!--/==/ End of Second Table -->

        <!-- Third Table -->
        <tbody class="p-0">
        <!-- Details -->
        <tr>
            <td colspan="6" class="font-weight-bold">
                <span class="badge badge-primary badge-pill">2</span>
                @lang('pages.employees.generalInfo')
            </td>
        </tr>

        <!-- Education, Last Name & Father Name -->
        <tr>
            <th><strong>@lang('form.education') :</strong></th>
            <th><strong>PRR/NPR :</strong></th>
            <th><strong>PRR Date :</strong></th>
            <th><strong>@lang('form.mainAddress') :</strong></th>
            <th><strong>@lang('form.curAddress') :</strong></th>
            <th><strong>@lang('form.introducer') :</strong></th>
        </tr>

        <!-- Gender, Birth Year & Employee Number -->
        <tr>
            <td>{{ $employee->education }}</td>
            <td>{{ $employee->prr_npr }}</td>
            <td>{{ $employee->prr_date }}</td>
            <td>{{ $employee->main_province }}, {{ $employee->main_district }}</td>
            <td>{{ $employee->current_province }}, {{ $employee->current_district }}</td>
            <td>{{ $employee->introducer }}</td>
        </tr>
        </tbody>
        <!--/==/ End of Third Table -->

        <!-- Fourth Table -->
        <tbody class="p-0">
        <!-- Education, Last Name & Father Name -->
        <tr>
            <th colspan="2"><strong>وضعیت :</strong></th>
            <th colspan="2"><strong>کد گمرکی :</strong></th>
            <th colspan="2"><strong>موقعیت :</strong></th>
        </tr>

        <!-- Gender, Birth Year & Employee Number -->
        <tr>
            <td colspan="2">
                <span class="acInText">
                    @if($employee->status == 0)
                        <span class="text-success italic font-italic">
                            در اصل بست در حال انجام وظیفه می باشد
                        </span>
                    @elseif($employee->status == 1)
                        <span class="text-success italic font-italic">
                            در بست خدمتی در حال انجام وظیفه می باشد
                        </span>
                    @elseif($employee->status == 2)
                        <span class="text-info italic font-italic">
                            تقاعد نموده است
                        </span>
                    @elseif($employee->status == 3)
                        <span class="text-danger italic font-italic">
                            منفک گردیده است
                        </span>
                    @elseif($employee->status == 4)
                        <span class="text-secondary italic font-italic">
                            در اداره/ارگان دیگر تبدیل شده است
                        </span>
                    @elseif($employee->status == 5)
                        <span class="text-warning italic font-italic">
                            معلق می باشد
                        </span>
                    @endif
                </span>
            </td>
            <td colspan="2">{{ $employee->position->custom_code }}</td>
            <td colspan="2">{{ $employee->position->type }}</td>
        </tr>
        </tbody>
        <!--/==/ End of Fourth Table -->

        <!-- User Table -->
        @if($employee->user)
            <tbody class="p-0">
            <!-- Details -->
            <tr>
                <td colspan="6" class="font-weight-bold">
                    <span class="badge badge-primary badge-pill">3</span>
                    معلومات یوزر BCD-MIS
                </td>
            </tr>

            <!-- User Info -->
            <tr>
                <th><strong>ID</strong></th>
                <th><strong>یوزر</strong></th>
                <th><strong>@lang('form.status')</strong></th>
                <th><strong>@lang('global.createdDate')</strong></th>
                <th colspan="2"><strong>@lang('global.extraInfo')</strong></th>
            </tr>
            <tr>
                <td>{{ $employee->user->id }}</td>
                <td>{{ $employee->user->username }}</td>
                <td>{{ $employee->user->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($employee->user->created_at)) }}</td>
                <td colspan="2">{{ $employee->user->info }}</td>
            </tr>
            </tbody>
        @endif
        <!--/==/ End of User Table -->

        <!-- Asycuda User Table -->
        @if($employee->asycuda_user)
            <tbody class="p-0">
            <!-- Details -->
            <tr>
                <td colspan="6" class="font-weight-bold">
                    <span class="badge badge-primary badge-pill">{{ $employee->user ? '4' : '3' }}</span>
                    معلومات یوزر اسیکودا
                </td>
            </tr>

            <tr>
                <th><strong>@lang('admin.sidebar.roles')</strong></th>
                <th><strong>یوزر</strong></th>
                <th><strong>@lang('form.password')</strong></th>
                <th><strong>@lang('form.status')</strong></th>
                <th><strong>@lang('global.date')</strong></th>
                <th><strong>@lang('global.extraInfo')</strong></th>
            </tr>

            <tr>
                <td>{{ $employee->asycuda_user->roles }}</td>
                <td>{{ $employee->asycuda_user->user }}</td>
                <td>{{ $employee->asycuda_user->password }}</td>
                <td>{{ $employee->asycuda_user->status == 1 ? trans('global.active') : trans('global.inactive') }}</td>
                <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($employee->asycuda_user->created_at)) }}</td>
                <td>{{ $employee->asycuda_user->info }}</td>
            </tr>
            </tbody>
        @endif
        <!--/==/ End of User Table -->

        <!-- Fourth Table -->
        <tbody>
        <!-- Details -->
        <tr>
            <td colspan="6" class="font-weight-bold">
                <span class="badge badge-primary badge-pill">@if($employee->user && $employee->asycuda_user) 5 @elseif($employee->user || $employee->asycuda_user) 4 @else 3 @endif</span>
                @lang('pages.employees.otherInfo')
            </td>
        </tr>
        <tr>
            <th colspan="3"><strong>بست/@lang('form.status'): </strong></th>
            <th colspan="3"><strong>@lang('global.extraInfo'): </strong></th>
        </tr>
        <tr>
            <td colspan="3">
                @if($employee->position)
                    <strong>اصل بست: </strong>
                    {{ $employee->position->position_number }} -
                    @can('office_position_view')
                        <a href="{{ route('admin.office.positions.show', $employee->position->id) }}">
                            {{ $employee->position->title }}
                        </a> (کد - {{ $employee->position_code }})
                    @else
                        {{ $employee->position->title }} (کد - {{ $employee->position_code }})
                    @endcan
                    <br>

                    @if($employee->on_duty == 1)
                        <strong>خدمتی: </strong>
                        {{ $employee->duty_position }}
                    @endif
                @endif
            </td>
            <td colspan="3">{{ $employee->info }}</td>
        </tr>
        </tbody>
        <!--/==/ End of Fourth Table -->

        <!-- Fifth Table -->
        @if($employee->status == 1)
            @can('office_employee_edit')
                <tbody>
                <!-- Details -->
                <tr>
                    <td colspan="6" class="font-weight-bold">
                        تبدیل بست در این ریاست
                    </td>
                </tr>
                <tr>
                    <th colspan="3"><strong>بالمعاوضه: </strong></th>
                    <th colspan="3"><strong>تنزیل/ارتقا/تغییر: </strong></th>
                </tr>
                <tr>
                    <td colspan="3">
                        <form action="{{ route('admin.office.employees.in_return', $employee->id) }}"
                              method="post">
                            @csrf
                            <div class="form-group @error('position_id') @enderror">
                                <p><strong>@lang('pages.employees.employee'): </strong></p>
                                <select class="form-control select2" name="position_id">
                                    @foreach($active_employees as $emp)
                                        <option
                                            value="{{ $emp->position_id }}">{{ $emp->name }} {{ $emp->last_name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary btn-sm"
                                    type="submit">@lang('global.save')</button>
                        </form>
                    </td>

                    <td colspan="3">
                        <form
                            action="{{ route('admin.office.employees.duc_position', $employee->id) }}"
                            method="post">
                            @csrf
                            <!-- Position -->
                            <div class="form-group @error('position_id') @enderror">
                                <p><strong>@lang('form.position'): <span
                                            class="text-danger">*</span></strong></p>
                                <select class="form-control select2" name="position_id">
                                    @foreach(\App\Models\Office\Position::all()->where('id', '!=', $employee->position_id) as $position)
                                        <option
                                            value="{{ $position->id }}">{{ $position->title }}</option>
                                    @endforeach
                                </select>

                                @error('position_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Position Code -->
                            <div class="form-group @error('position_code') @enderror">
                                <p><strong>@lang('form.positionCode'): <span
                                            class="text-danger">*</span></strong></p>
                                <input type="text" name="position_code"
                                       class="form-control @error('position_code') form-control-danger @enderror"
                                       value="{{ old('position_code') }}" required>

                                @error('position_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Doc Number -->
                            <div class="form-group @error('doc_number') @enderror">
                                <p><strong>نمبر مکتوب: <span
                                            class="text-danger">*</span></strong></p>
                                <input type="text" name="doc_number"
                                       class="form-control @error('doc_number') form-control-danger @enderror"
                                       value="{{ old('doc_number') }}" required>

                                @error('doc_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-sm"
                                    type="submit">@lang('global.save')</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            @endcan
        @endif
        <!--/==/ End of Fifth Table -->
    </table>
</div>
