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
        <title>@yield('title', config('app.name'))</title>

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
                height: 8.268in;
                width: 11.693in;
                /* to centre page on screen*/
                margin-left: auto;
                margin-right: auto;
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
        </style>
    </head>

    <body style="font-family: Calibri !important;">
        <!-- Page -->
        <div class="app" style="height: 11.693in; width: 8.268in; padding: 20px; background-color: white;">
            <!-- Header -->
            <div class="grid-container" style="position:relative; font-size: 16px; line-height: 5px; font-weight: bolder;">
                <div class="grid-item text-center align-content-center justify-content-center">
                    <img src="{{ asset('assets/images/emirate-logo.jpg') }}" width="90">
                    <div style="font-family: Calibri; margin-top: 20px;">
                        <p>د افغانستان اسلامی امارت</p>
                        <p>د مالیی وزارت</p>
                        <p>د گمرکونو او عوایدو معینیت</p>
                        <p>د گمرکونو لوی ریاست</p>
                    </div>
                </div>
                <div class="grid-item text-center align-content-center justify-content-center">
                    <div style="margin-top: 100px;">
                        <p style="font-family: 'Times New Roman';">Islamic Emirate of Afghanistan</p>
                        <p style="font-family: 'Times New Roman';">Ministry of Finance</p>
                        <p style="font-family: 'Times New Roman';">Afghan Customs Department</p>
                        <p style="font-family: Calibri;">د گمرکونو عملیاتی ریاست</p>
                    </div>
                </div>
                <div class="grid-item text-center align-content-center justify-content-center">
                    <img src="{{ asset('assets/images/logo.jpg') }}" width="90">
                    <div style="font-family: Calibri; margin-top: 20px;">
                        <p>امارت اسلامی افغانستان</p>
                        <p>وزارت مالیه</p>
                        <p>معینیت عواید و گمرکات</p>
                        <p>ریاست عمومی گمرکات</p>
                    </div>
                </div>
            </div>
            <!--/==/ End of Header -->

            <!-- Title -->
            <p class="text-center mt-2" style="font-size: 20px;">د اسیکودا په سیستم کی د جواز ثبتولو فورمه (<span style="font-family: 'Times New Roman';">C1</span>)</p>

            <!-- Table -->
            <div>
                <table class="table table-bordered p-0" style="border: 1px solid black !important; font-size: 15px;">
                    <tbody>
                    <!-- Company Name -->
                    <tr>
                        <th class="font-weight-bold">د شرکت نوم</th>
                        <td colspan="2">{{ $cal->company_name }}</td>
                    </tr>
                    <!-- Owner Details -->
                    <tr>
                        <th class="font-weight-bold">د جواز ثبتولو د غوښتونکی نوم:</th>
                        <td>{{ $cal->owner_name }}</td>
                        <td><strong>مبایل شمیره: </strong> {{ $cal->owner_phone }}</td>
                    </tr>
                    <!-- TIN & Export Date -->
                    <tr>
                        <th class="font-weight-bold">د <span style="font-family: 'Times New Roman';">TIN</span> شمیره</th>
                        <td>{{ $cal->company_tin }}</td>
                        <td><strong>د صادریدو  نیټه: </strong> {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->export_date)) }}</td>
                    </tr>
                    <!-- License Number & Expire Date -->
                    <tr>
                        <th class="font-weight-bold">د جواز نمبر</th>
                        <td>{{ $cal->license_number }}</td>
                        <td><strong>د ختمیدو  نیټه: </strong> {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->expire_date)) }}</td>
                    </tr>
                    <!-- Company Address -->
                    <tr>
                        <th class="font-weight-bold">د شرکت پته</th>
                        <td colspan="2">{{ $cal->address }}</td>
                    </tr>
                    <!-- Company Phone -->
                    <tr>
                        <th class="font-weight-bold">د آړیکو شمیره</th>
                        <td colspan="2">د SMS (لنډ پیغام) د لاسته راوړلو لپاره شمیره:  {{ $cal->phone }}</td>
                    </tr>
                    <!-- Company Phone -->
                    <tr>
                        <th colspan="3"><strong>بریښنالیک</strong> {{ $cal->email }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/==/ End of Table -->

            <!-- Verification -->
            <div>
                <p style="font-size: 16px;">د پورتنی معلوماتو تصدیق او د غوښتونکی لاسلیک او د شرکت ټاپه: -------------------------------------------------- نیته: {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime($cal->created_at)) }}</p>
            </div>

            <!-- Terms -->
            <div>
                <h5 class="font-weight-bold" style="text-decoration: underline;">نوټ:</h5>
                <ul style="font-size: 15px">
                    <li>مهربانی وکړی خپل جوازدمحمول د رسیدو نه لږترلږه یوه اونی مخکی ثبت لپاره اړونده ګمرک یا ګمرکونولوی ریاست
                        د اسیکوډا څانګی ته راوړی.</li>
                    <li>که غواړی چی جواز مو ژر یا په دقیقه توګه سیستم که ثبت شی بهتره ده چی خپل جواز دګمرکاتو لوی ریاست د اسیکوډا
                        امریت ته وړاندی کړی.</li>
                    <li>د جواز دثبتوتولو لپاره اصلی جواز او اصلی مالیاتی هویت نمبر اړین دی.</li>
                    <li>هغه جوازونه چی دختمیدونیټه پوره وی ثبتیدووړندی.</li>
                    <li> د جواز ثبتیدو لپاره دشرکت دریس او یا مرستیال او یا د هغوی قانونی استازی یا نماینده السلیک اړین دی.</li>
                    <li>هغه جوازونه چی نوم یا مالیاتی هویت شمیره د مالیاتی هویت پاڼی د نوم او مالیاتی هویت سره توپیر ولری دثبت وړ نه دی.</li>
                    <li>د شرکت نوم باید د هیواد په مالی ژبی لیکل شوی کچیری لیکل شوی نه وی د ثبت وړ نه دی</li>
                    <li>د خپل وارداتی او صادراتی اظهارنامود طی مراحلو په هکله لنډ پیغام (<span style="font-family: 'Times New Roman';">SMS</span>) له لاری معلوماتو لپاره خپل د تیلیفون دقیق
                        شمیره درج کړی. نوموړی پیغام تاسو سره مرسته کوی ترڅودهغه پیسودکچی په اړه چی ستاسو دمحمولی لپاره ستاسوپه
                        استازی توب ګمرک ته تحویلیږی و پوهیږی.</li>
                    <li>د اسیکوډا په سیستم کی تول جوازونه په جوازکی دلیکل شویاعتبارمودی پر بنسټ ثبتیږی.</li>
                    <li>د جواز دثبتولو په بدل کی په مرکز او والیاتو کی هیڅ ډول فیس نه اخیستل کیږی.</li>
                    <li>د اړتیا په وخت کی په الندی شمیرو اوپتو اړیکی و نیسی.</li>
                </ul>
            </div>
            <!--/==/ End of Terms -->

            <!-- Table 2 -->
            <div class="pl-5 pr-5" style="font-size: 15px;">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th>تلفون</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>بریښنالیک</th>
                        <td>asywaf.license@yahoo.com</td>
                    </tr>
                    <tr>
                        <th>ویبپانه</th>
                        <td>www.asycuda.gov.af</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!--/==/ End of Table 2 -->

            <div style="font-size: 15px;">
                <p>د ثبت کوونکی یا ایمیل کوونکی مامور لاسلیک: ---------------------------------------- نیټه: {{ \Morilog\Jalali\CalendarUtils::strftime('Y-m-d', strtotime(now())) }}</p>
            </div>

            <div class="text-center" style="font-size: 15px;">
                <p>د گمرک مهر</p>
            </div>
        </div>
        <!-- End Page -->
        <!-- Jquery js-->
        <script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap js-->
        <script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
