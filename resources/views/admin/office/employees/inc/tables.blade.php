<div class="row justify-content-center">
    <!-- Account Information -->
    <div class="col-md-5 p-2 bd bd-secondary m-1">
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

        <!-- Position -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.position'):</strong></p>
            </div>
            <div class="col">{{ $employee->position }}</div>
        </div>

        <!-- Name -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.name'):</strong></p>
            </div>
            <div class="col">{{ $employee->name }}</div>
        </div>

        <!-- Father Name -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.fatherName'):</strong></p>
            </div>
            <div class="col">{{ $employee->father_name }}</div>
        </div>

        <!-- Birth Date & Age -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>تاریخ تولد:</strong></p>
            </div>
            <div class="col">{{ $employee->birth_date }}</div>
        </div>

        <!-- Employee Code -->
        <div class="row">
            <div class="col-5 col-sm-4">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.code'):</strong></p>
            </div>
            <div class="col">
                <p class="fst-italic text-400 mb-1">{{ $employee->emp_code }}</p>
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
    </div>
    <!--/==/ End of Position Information -->

    <!-- General Information -->
    <div class="col-md-5 p-2 bd bd-secondary m-1">
        <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
            <span class="badge badge-primary badge-pill">2</span>
            @lang('pages.employees.generalInfo')
        </h5>

        <!-- Address -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('global.address'):</strong></p>
            </div>
            <div class="col">{{ $employee->address }}</div>
        </div>

        <!-- Status -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('form.status'):</strong></p>
            </div>
            <div class="col">{{ $employee->status == 1 ? trans('global.active') : trans('global.inactive') }}</div>
        </div>
    </div>
    <!--/==/ End of General Information -->

    <!-- User Information -->
    @if($employee->user)
        <div class="col-md-5 p-2 bd bd-secondary m-1">
            <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
                <span class="badge badge-primary badge-pill">3</span>
                معلومات حساب کاربری BEAM
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

    <!-- Other Information -->
    <div class="col-md-5 p-2 bd bd-secondary m-1">
        <h5 class="fw-semi-bold ls mb-3 text-uppercase font-weight-bold">
            <span class="badge badge-primary badge-pill">@if($employee->user) 4 @else 3 @endif</span>
            @lang('pages.employees.generalInfo')
        </h5>

        <!-- Extra Info -->
        <div class="row">
            <div class="col-6 col-sm-5">
                <p class="fw-semi-bold mb-1"><strong>@lang('global.extraInfo'):</strong></p>
            </div>
            <div class="col">{{ $employee->info }}</div>
        </div>
    </div>
    <!--/==/ End of Other Information -->
</div>
