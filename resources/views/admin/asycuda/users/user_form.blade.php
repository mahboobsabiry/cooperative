<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta name="description" content="Dashlead -  backend Panel HTML Dashboard Template">
        <meta name="author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="sales dashboard, backend dashboard, bootstrap 4 backend template, html backend template, backend panel design, backend panel design, bootstrap 4 dashboard, backend panel template, html dashboard template, bootstrap backend panel, sales dashboard design, best sales dashboards, sales performance dashboard, html5 template, dashboard template">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/x-icon"/>

        <!-- Title -->
        <title>@lang('pages.users.userForm') - {{ $asycuda_user->employee->name }} {{ $asycuda_user->employee->last_name }}</title>

        <!---Fontawesome css-->
        <link href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

        <!---Ionicons css-->
        <link href="{{ asset('backend/assets/plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

        <!---Typicons css-->
        <link href="{{ asset('backend/assets/plugins/typicons.font/typicons.css') }}" rel="stylesheet">

        <!---Feather css-->
        <link href="{{ asset('backend/assets/plugins/feather/feather.css') }}" rel="stylesheet">

        <!---Falg-icons css-->
        <link href="{{ asset('backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet">

        <!---Style css-->
        @if(app()->getLocale() == 'en')
            <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/custom-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/skins.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/dark-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css/custom-dark-style.css') }}" rel="stylesheet">

            <!---Select2 css-->
            <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
            <!--Mutipleselect css-->
            <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multipleselect/multiple-select.css') }}">
            <!---Jquery.mCustomScrollbar css-->
            <link href="{{ asset('backend/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

            <!---Sidebar css-->
            <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

            <!---Sidemenu css-->
            <link href="{{ asset('backend/assets/plugins/sidemenu/sidemenu.css') }}" rel="stylesheet">

            <!---Switcher css-->
            <link href="{{ asset('backend/assets/switcher/css/switcher.css') }}" rel="stylesheet">
        @else
            <link href="{{ asset('backend/assets/css-rtl/style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/custom-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/skins.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/dark-style.css') }}" rel="stylesheet">
            <link href="{{ asset('backend/assets/css-rtl/custom-dark-style.css') }}" rel="stylesheet">
            <!---Select2 css-->
            <link href="{{ asset('backend/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
            <!--Mutipleselect css-->
            <link rel="stylesheet" href="{{ asset('backend/assets/plugins/multipleselect/multiple-select-rtl.css') }}">
            <!---Jquery.mCustomScrollbar css-->
            <link href="{{ asset('backend/assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet">

            <!---Sidebar css-->
            <link href="{{ asset('backend/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

            <!---Sidemenu css-->
            <link href="{{ asset('backend/assets/plugins/sidemenu/sidemenu-rtl.css') }}" rel="stylesheet">

            <!---Switcher css-->
            <link href="{{ asset('backend/assets/switcher/css/switcher-rtl.css') }}" rel="stylesheet">
        @endif
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweet-alert/sweetalert.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">

        <link rel="stylesheet" href="{{ asset('backend/assets/plugins/jdatepicker/jalalidatepicker.min.css') }}">

        <link href="{{ asset('backend/assets/switcher/demo.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/new-style.css') }}" rel="stylesheet">

        <style>
            body {
                height: 11.69in;
                width: 8.27in;
                /* to centre page on screen*/
                margin: auto;
                background-color: #cccccc;
            }
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto;
                /*background-color: #2196F3;*/
                /*padding: 10px;*/
            }
            .grid-item {
                /*background-color: rgba(255, 255, 255, 0.8);*/
                /*border: 1px solid rgba(0, 0, 0, 0.8);*/
                padding: 20px;
                /*font-size: 30px;*/
                text-align: center;
            }
            .ff-times {
                font-family: "Times New Roman";
            }
        </style>
    </head>

    <body style="display: flex; font-family: Calibri !important;">
        <!-- Page -->
        <div style="width: 998px; height: 1510px; padding: 20px; background-color: white;">
            <!-- Header -->
            <div class="grid-container" style="position:relative; font-size: 18px; line-height: 5px; font-weight: bolder;">
                <div class="grid-item">
                    <img src="{{ asset('assets/images/emirate-logo.jpg') }}" width="90">
                    <div style="font-family: Calibri; margin-top: 20px;">
                        <p>د افغانستان اسلامی امارت</p>
                        <p>د مالیی وزارت</p>
                        <p>د گمرکونو او عوایدو معینیت</p>
                        <p>د گمرکونو لوی ریاست</p>
                    </div>
                </div>
                <div class="grid-item">
                    <div style="margin-top: 60px;">
                        <p class="ff-times">Islamic Emirate of Afghanistan</p>
                        <p class="ff-times">Ministry of Finance</p>
                        <p class="ff-times">Afghan Customs Department</p>
                        <p>ریاست عمومی گمرکات</p>
                        <p>معاونیت عملیاتی گمرکات</p>
                        <p>ریاست سیستم اسیکودا</p>
                    </div>
                </div>
                <div class="grid-item">
                    <img src="{{ asset('assets/images/logo.jpg') }}" width="90">
                    <div class="mt-4">
                        <p>امارت اسلامی افغانستان</p>
                        <p>وزارت مالیه</p>
                        <p>معینیت عواید و گمرکات</p>
                        <p>ریاست عمومی گمرکات</p>
                    </div>
                </div>
            </div>
            <!--/==/ End of Header -->

            <!-- Title -->
            <p class="mt-2" style="font-size: 18px;">فورم (<span style="font-family: 'Times New Roman'">P1</span>) تسلیم دهی یوزر و پسورد استفاده کنندگان سیستم اسیکودا و راپورگیری.</p>

            <!-- Sub-Title -->
            <p class="text-center" style="font-size: 15px;">خانه پری خانه ها با علامه (<span class="text-danger">*</span>) ضروری می باشد!</p>

            <!-- Table -->
            <div>
                <table class="table table-bordered p-0" style="border: 1px solid black !important; font-size: 18px;">
                    <tbody>
                    <!-- Company Name -->
                    <tr>
                        <th class="font-weight-bold">شماره مکتوب</th>
                        <td colspan="2" class="text-left" style="font-family: 'Times New Roman'">CUBKO</td>
                        <td class="font-weight-bold">تاریخ</td>
                        <td colspan="2" style="font-family: 'Times New Roman'">{{ \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($asycuda_user->created_at)) }}</td>
                    </tr>

                    <!-- Name -->
                    <tr>
                        <th class="font-weight-bold">اسم <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->employee->name }}</td>
                    </tr>

                    <!-- Last Name -->
                    <tr>
                        <th class="font-weight-bold">تخلص</th>
                        <td colspan="5">{{ $asycuda_user->employee->last_name }}</td>
                    </tr>

                    <!-- Father Name -->
                    <tr>
                        <th class="font-weight-bold">اسم پدر <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->employee->father_name }}</td>
                    </tr>

                    <!-- Position -->
                    <tr>
                        <th class="font-weight-bold">وظیفه <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->employee->position->title }}</td>
                    </tr>

                    <!-- Reyasat / Ameryat -->
                    <tr>
                        <th class="font-weight-bold">ریاست/آمریت <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->place && $asycuda_user->place->custom_code == 'AF152' ? 'آمریت گمرک سرحدی حیرتان' : 'ریاست گمرک بلخ' }}</td>
                    </tr>

                    <!-- Sawaneh Number -->
                    <tr>
                        <th class="font-weight-bold">نمبر سوانح <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->employee->emp_number }}</td>
                    </tr>

                    <!-- Email Address -->
                    <tr>
                        <th class="font-weight-bold">ایمیل آدرس</th>
                        <td colspan="5">{{ $asycuda_user->employee->email }}</td>
                    </tr>

                    <!-- Phone Number -->
                    <tr>
                        <th class="font-weight-bold">شماره تماس <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->employee->phone }}</td>
                    </tr>

                    <!-- Permanent Address -->
                    <tr>
                        <th class="font-weight-bold">آدرس دایمی</th>
                        <td colspan="5">ولایت {{ $asycuda_user->employee->main_province }} ولسوالی {{ $asycuda_user->employee->main_district }}</td>
                    </tr>

                    <!-- Custom Code -->
                    <tr>
                        <th class="font-weight-bold">کد گمرک مربوطه <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->place->custom_code ?? '' }}</td>
                    </tr>

                    <!-- Roles -->
                    <tr>
                        <th class="font-weight-bold">صلاحیت سیستمی <span class="text-danger">*</span></th>
                        <td colspan="5">{{ $asycuda_user->roles }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/==/ End of Table -->

            <!-- Terms -->
            <div>
                <p class="font-weight-bold" style="font-size: 22px; text-align: justify; text-justify: inter-word;">تعهد میدارم که معلومات فوق را درست درج نمودم و در صورت هر نوع مشکل مسئول میباشم. همچنان پسورد و صلاحیت خود را به اساس امر مقام بعد از تکمیل دوره آموزشی و بلدیت به سیستم اخذ نمودم؛ چون به تغییر کردن پسورد و مشخص کردن پسورد جدید برای خود بلدیت کامل دارم. بعد از تسلیم شدن یوزر و پسورد بزودترین فرصت پسورد یوزر خویش را تغییر داده و به هیچ شخص دیگر ارائه نمیکنم. در حصه حفظ اسرار اداره به اساس ماده 13 قانون گمرکات را جداً در نظر میگیرم. در صورت بروز شدن هرنوع تخلف، سوءاستفاده از بابت پسورد فوق مسئول و جوابگو میباشم و اگر به کدام مشکل تخنیکی روبرو گردیدم از بخش مربوطه خواهان کمک تخنیکی میگردم.</p>
            </div>
            <!--/==/ End of Terms -->

            <!-- Footer -->
            <div class="grid-container" style="position:relative; font-size: 18px; line-height: 5px; font-weight: bold;">
                <div class="grid-item">
                    <div style="font-family: Calibri; margin-top: 20px;">
                        <p>نام استفاده کننده یوزر: {{ $asycuda_user->employee->name . ' ' . $asycuda_user->employee->last_name }}</p>
                        <p><span class="text-danger">*</span> امضاء:</p>
                    </div>
                </div>
                <div class="grid-item">

                </div>
                <div class="grid-item">
                    <div class="mt-4">
                        <p>تائید مقام ذیصلاح: رئیس، آمر</p>
                        <p>نام و وظیفه: {{ $asycuda_user->place && $asycuda_user->place->custom_code == 'AF152' ? 'مفتی محمد نسیم محمدی' : 'مولوی عبدالله بلال' }}</p>
                        <p>{{ $asycuda_user->place && $asycuda_user->place->custom_code == 'AF152' ? 'آمر گمرک سرحدی حیرتان' : 'رئیس گمرک بلخ' }}</p>
                    </div>
                </div>
            </div>
            <!--/==/ End of Footer -->
        </div>
        <!-- End Page -->

        <!-- Jquery js-->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
