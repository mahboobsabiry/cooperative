<div class="row">
    <!-- Account Information -->
    <div class="col-lg col-xxl-5 bd">
        <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
            <span class="badge badge-primary badge-pill">1</span>
            @lang('pages.employees.personalInfo')
        </h5>
        <!-- ID -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
            </div>
            <div class="col">ID-{{ $employee->id }}</div>
        </div>

        <!-- Name & Last Name -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>نام و تخلص:</strong></p>
            </div>
            <div class="col">{{ $employee->name }} ({{ $employee->last_name }})</div>
        </div>

        <!-- Father Name -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.fatherName'):</strong></p>
            </div>
            <div class="col">{{ $employee->father_name }}</div>
        </div>

        <!-- Gender -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.gender'):</strong></p>
            </div>
            <div class="col">{{ $employee->gender == 1 ? trans('form.male') : trans('form.female') }}</div>
        </div>

        <!-- Birth Year & Age -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>سال تولد و عمر:</strong></p>
            </div>
            <div class="col">{{ $employee->birth_year }} ({{ \Morilog\Jalali\Jalalian::now()->getYear() - $employee->birth_year }})</div>
        </div>

        <!-- Employee Number -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.empNumber'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">{{ $employee->emp_number }}</p>
            </div>
        </div>

        <!-- Email -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.email'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">
                    <a href="mailto:{{ $employee->email }}">{{ $employee->email }}</a>
                </p>
            </div>
        </div>

        <!-- Phone -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.phone'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">
                    <a class="ctd" href="callto:{{ $employee->phone }}">{{ $employee->phone }}</a>
                    @if($employee->phone2)
                        , <a href="callto:{{ $employee->phone2 }}"
                             class="ctd">{{ $employee->phone2 }}</a>
                    @endif
                </p>
            </div>
        </div>

        <!-- Appointment Number -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.appointmentNumber'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">{{ $employee->appointment_number }}</p>
            </div>
        </div>

        <!-- Appointment Date -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.appointmentDate'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">{{ $employee->appointment_date }}</p>
            </div>
        </div>

        <!-- Last Duty -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.lastDuty'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">{{ $employee->last_duty }}</p>
            </div>
        </div>

        <!-- HOME/HOSTEL -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('pages.hostel.hostel')/@lang('global.home'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">
                    @if($employee->hostel)
                        @lang('pages.hostel.hostel') -
                        @lang('pages.hostel.roomNumber')
                        {{ $employee->hostel->number }}
                        @if($employee->hostel->place == 'محصولی')
                            @lang('pages.hostel.section')
                            {{ $employee->hostel->section }}
                        @endif
                        ({{ $employee->hostel->place }})
                    @else
                        @lang('global.home')
                    @endif
                </p>
            </div>
        </div>
    </div>
    <!--/==/ End of Position Information -->

    <!-- General Information -->
    <div class="col-lg col-xxl-5 bd mt-4 mt-lg-0 offset-xxl-1">
        <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
            <span class="badge badge-primary badge-pill">2</span>
            @lang('pages.employees.generalInfo')
        </h5>

        <!-- Education -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.education'):</strong></p>
            </div>
            <div class="col">{{ $employee->education }}</div>
        </div>

        <!-- PRR/NPR -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>PRR/NPR:</strong></p>
            </div>
            <div class="col">{{ $employee->prr_npr }}</div>
        </div>

        <!-- PRR/NPR -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>PRR Date:</strong></p>
            </div>
            <div class="col">{{ $employee->prr_date }}</div>
        </div>

        <!-- Main Address -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.mainAddress'):</strong></p>
            </div>
            <div class="col">{{ $employee->main_province }}, {{ $employee->main_district }}</div>
        </div>

        <!-- Current Address -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.curAddress'):</strong></p>
            </div>
            <div class="col">{{ $employee->current_province }}, {{ $employee->current_district }}</div>
        </div>

        <!-- Introducer -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.introducer'):</strong></p>
            </div>
            <div class="col">{{ $employee->introducer }}</div>
        </div>

        <!-- Status -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
            </div>
            <div class="col">
                <span class="acInText">
                    @if($employee->status == 0 && $employee->on_duty == 0)
                        <span class="text-success italic font-italic">
                            در اصل بست در حال انجام وظیفه می باشد
                        </span>
                    @elseif($employee->status == 0 && $employee->on_duty == 1)
                        <span class="text-success italic font-italic">
                            در بست خدمتی در حال انجام وظیفه می باشد
                        </span>
                    @elseif($employee->status == 1)
                        <span class="text-info italic font-italic">
                            تقاعد نموده است
                        </span>
                    @elseif($employee->status == 2)
                        <span class="text-danger italic font-italic">
                            منفک گردیده است
                        </span>
                    @elseif($employee->status == 3)
                        <span class="text-secondary italic font-italic">
                            در اداره/ارگان دیگر تبدیل شده است
                        </span>
                    @elseif($employee->status == 4)
                        <span class="text-warning italic font-italic">
                            معلق می باشد
                        </span>
                    @endif
                </span>
            </div>
        </div>

        <!-- Custom Code -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>کد گمرکی:</strong></p>
            </div>
            <div class="col">{{ $employee->position->custom_code }}</div>
        </div>

        <!-- Place -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>موقعیت:</strong></p>
            </div>
            <div class="col">{{ $employee->position->place }}</div>
        </div>

        <!-- All Leave Days -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>مجموع روز های رخصتی:</strong></p>
            </div>
            <div class="col">{{ $employee->leaves->sum('days') ?? '0' }}</div>
        </div>

        <!-- Number of Leaves -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>تعداد دفعات رخصتی:</strong></p>
            </div>
            <div class="col">{{ $employee->leaves->count() ?? '0' }}</div>
        </div>
    </div>
    <!--/==/ End of General Information -->

    <!-- User Information -->
    @if($employee->user)
        <div class="col-lg col-xxl-5 bd mt-4 mt-lg-0 offset-xxl-1">
            <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
                <span class="badge badge-primary badge-pill">3</span>
                معلومات حساب کاربری BCD-MIS
            </h5>

            <!-- ID -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                </div>
                <div class="col">{{ $employee->user->id }}</div>
            </div>

            <!-- USER -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>نمبر حساب کاربری:</strong></p>
                </div>
                <div class="col">{{ $employee->user->username }}</div>
            </div>

            <!-- Status -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
                </div>
                <div class="col">{{ $employee->user->status == 1 ? trans('global.active') : trans('global.inactive') }}</div>
            </div>

            <!-- Created Date -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('global.createdDate'):</strong></p>
                </div>
                <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($employee->user->created_at)) }}</div>
            </div>

            <!-- Extra Info -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'):</strong></p>
                </div>
                <div class="col">{{ $employee->user->info }}</div>
            </div>
        </div>
    @endif

    <!-- User Information -->
    @if($employee->asycuda_user)
        <div class="col-lg col-xxl-5 bd mt-4 mt-lg-0 offset-xxl-1">
            <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
                <span class="badge badge-primary badge-pill">@if($employee->user && !$employee->asycuda_user) 4 @elseif(!$employee->user && $employee->asycuda_user) 3 @else 3 @endif</span>
                معلومات حساب کاربری اسیکودا
            </h5>

            <!-- ID -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>ID:</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->id }}</div>
            </div>

            <!-- Roles -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('admin.sidebar.roles'):</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->roles }}</div>
            </div>

            <!-- USER -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>نمبر حساب کاربری:</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->username }}</div>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('form.password'):</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->password }}</div>
            </div>

            <!-- Status -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->status == 1 ? trans('global.active') : trans('global.inactive') }}</div>
            </div>

            <!-- Created Date -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('global.createdDate'):</strong></p>
                </div>
                <div class="col">{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($employee->asycuda_user->created_at)) }}</div>
            </div>

            <!-- Extra Info -->
            <div class="row">
                <div class="col-5 col-sm-4">
                    <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'):</strong></p>
                </div>
                <div class="col">{{ $employee->asycuda_user->info }}</div>
            </div>
        </div>
    @endif
</div>

<div class="table-responsive ">
    <table class="table table-bordered">
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
            <th colspan="3"><strong>بست/@lang('form.status')</strong></th>
            <th colspan="3"><strong>@lang('global.extraInfo')</strong></th>
        </tr>
        <tr>
            <td colspan="3">
                @if($employee->position)
                    <strong>اصل بست: </strong>
                    {{ $employee->position->position_number }} -
                    @can('office_position_view')
                        <a href="{{ route('admin.office.positions.show', $employee->position->id) }}">
                            {{ $employee->position->title }}
                        </a> (کد - {{ $employee->position_code->code }})
                    @else
                        {{ $employee->position->title }} (کد - {{ $employee->position_code->code }})
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
        @if($employee->status == 0)
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
