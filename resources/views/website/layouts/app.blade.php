<!doctype html>
<html lang="en" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">

    <!--google fonts css-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">

    <!--font awesome css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="icon" href="{{ asset('website/assets/imgs/Icon.png') }}">

    <!--owl-carousel css-->
    <link rel="stylesheet" href="{{ asset('website/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/owl.theme.default.min.css') }}">

    <!--style css-->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">

    <title>Blood Bank</title>
</head>


<body class="{{  $bodyClass ?? '' }}">

    @include('website.layouts.sections._upper_bar')


    @include('website.layouts.sections._nav_bar')


    @yield('content')

    <!--footer-->
    <div class="footer">
        <div class="inside-footer">
            <div class="container">
                <div class="row">
                    <div class="details col-md-4">
                        <img src="{{ asset('website/assets/imgs/logo.png') }}">
                        <h4>بنك الدم</h4>
                        <p>
                            نحن في بنك الدم نهدف إلى إنقاذ الأرواح من خلال تسهيل عملية التبرع بالدم وربط المتبرعين بالمحتاجين في أسرع وقت ممكن.
                            نوفر منصة آمنة وسهلة الاستخدام لطلب الدم حسب الفصيلة والموقع، مع متابعة سريعة لحالات الطوارئ.

                            تبرعك بالدم قد ينقذ حياة إنسان، فكن سببًا في الأمل وشارك في إنقاذ الآخرين اليوم. 
                        </p>
                    </div>
                    <div class="pages col-md-4">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" href="index.html" role="tab" aria-controls="home">الرئيسية</a>
                            <a class="list-group-item list-group-item-action" id="list-profile-list" href="#" role="tab" aria-controls="profile">عن بنك الدم</a>
                            <a class="list-group-item list-group-item-action" id="list-messages-list" href="#" role="tab" aria-controls="messages">المقالات</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('website.donation-requests') }}" role="tab" aria-controls="settings">طلبات التبرع</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('website.who-are-us') }}" role="tab" aria-controls="settings">من نحن</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{ route('website.contact-us') }}" role="tab" aria-controls="settings">اتصل بنا</a>
                        </div>
                    </div>
                    <div class="stores col-md-4">
                        <div class="availabe">
                            <p>متوفر على</p>
                            <a href="#">
                                <img src="{{ asset('website/assets/imgs/google1.png') }}">
                            </a>
                            <a href="#">
                                <img src="{{ asset('website/assets/imgs/ios1.png') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="other">
            <div class="container">
                <div class="row">
                    <div class="social col-md-4">
                        <div class="icons">
                            <a href="{{ $settings->fb_url }}" class="facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{ $settings->instagram_url }}" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="{{ $settings->x_url }}" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{ 'https://wa.me/'.$settings->phone }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                    <div class="rights col-md-8">
                        <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="{{ asset('website/assets/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>

    <script src="{{ asset('website/assets/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('website/assets/js/main.js') }}"></script>


    @yield('scripts')

</body>


</html>