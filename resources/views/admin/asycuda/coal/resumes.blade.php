<!-- CAL Resumes -->
<div class="card mb-2">
    <!-- Table TITLE -->
    <div class="card-header row">
        <div class="col-md-6">
            <h5 class="font-weight-bold">سابقه فعالیت جواز فعالیت شرکت {{ $cal->company_name }}</h5>
        </div>

        <div class="col-md-6 text-left">
            @if(auth()->user()->isEmployee())
                <a href="{{ route('admin.asycuda.coal.add_cal_resume', $cal->id) }}" class="btn btn-outline-primary">ثبت</a>
            @endif
        </div>
    </div>

    <div class="card-body">
        <!-- Experiences Table -->
        <div class="table-responsive mt-2">
            <table class="table table-bordered export-table border-top key-buttons display text-nowrap w-100">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">اسم شرکت</th>
                    <th class="text-center">نمبر تشخیصیه</th>
                    <th class="text-center">نمبر جواز</th>
                    <th class="text-center">نام مالک/رئیس</th>
                    <th class="text-center">شماره تماس مالک/رئیس</th>
                    <th class="text-center">تاریخ صدور</th>
                    <th class="text-center">تاریخ ختم</th>
                    <th class="text-center">مدت اعتبار</th>
                    <th class="text-center">جواز</th>
                    <th class="text-center">آدرس</th>
                    <th class="text-center">تاریخ</th>
                    <th class="text-center">@lang('global.extraInfo')</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cal->resumes as $resume)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $resume->cal->company_name }}</td>
                        <td>{{ $resume->cal->company_tin }}</td>
                        <td>{{ $resume->license_number }}</td>
                        <td>{{ $resume->owner_name }}</td>
                        <td>{{ $resume->owner_phone }}</td>
                        <td>{{ $resume->export_date }}</td>
                        <td>{{ $resume->expire_date }}</td>
                        <td>{{ now()->diffInDays(\Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $resume->export_date)->toCarbon()) + now()->diffInDays(\Morilog\Jalali\Jalalian::fromFormat('Y-m-d', $resume->expire_date)->toCarbon()) + 1 }} روز</td>
                        <td>
                            <a href="{{ $resume->image ?? asset('assets/images/id-card-default.png') }}" target="_blank">
                                <img src="{{ $resume->image ?? asset('assets/images/id-card-default.png') }}" alt="{{ $resume->cal->company_name }}" width="80">
                            </a>
                        </td>

                        <td>{{ $resume->address }}</td>
                        <td>{{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($resume->created_at)) }}</td>
                        <td>{{ $resume->info }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!--/==/ End of Experiences Table -->
    </div>
</div>
<!--/==/ End of CAL Resumes -->
