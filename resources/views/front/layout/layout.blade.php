<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>El-3abkary</title>
    <meta name="author" content="Vecuro">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="assets/img/logo/SVG/AlAbkariAlSaghier_Icon.svg" type="image/x-icon">
    <link rel="icon" href="assets/img/logo/SVG/AlAbkariAlSaghier_Icon.svg" type="image/x-icon">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Jost:wght@400;500&display=swap"
        rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}">
    <!-- Layerslider -->
    <link rel="stylesheet" href="{{ asset('assets/css/layerslider.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css')}}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.min.css')}}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

</head>

<body>

    <div class="preloader  ">
        <!-- <button class="vs-btn preloaderCls">Cancel Preloader </button> -->
        <div class="preloader-inner">
            <div class="loader"></div>
        </div>
    </div>
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('home')}}"><img src="{{ asset('assets/img/logo/SVG/AlAbkariAlSaghier_Logo_3.svg')}}"
                        alt="Kiddino"></a>
            </div>
            <div class="vs-mobile-menu">
                <ul>
                    <li class="">
                        <a href="{{ route('home')}}">الرئيسية</a>
                    </li>
                    <li>
                        <a href="{{ route('about-us')}}">نبذة عنا</a>
                    </li>
                    <li class="">
                        <a href="{{ route('subjects')}}">المواد</a>

                    </li>
                    <li class="">
                        <a href="{{ route('blogs')}}">الاخبار</a>

                    </li>

                    <li>
                        <a href="{{ route('gallary')}}">معرض الصور</a>
                    </li>
                    <li>
                        <a href="{{ route('contact-us')}}">تواصل معانا</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="popup-search-box d-none d-lg-block  ">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" class="border-theme" placeholder="What are you looking for">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <header class="vs-header header-layout1">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto d-none d-lg-block">
                        <div class="header-links style-white">
                            <ul>
                                @if (Auth::check())
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit"
                                                style="background: none; border: none; color: inherit; cursor: pointer;">
                                                <i class="fas fa-sign-out-alt"></i>تسجيل الخروج
                                            </button>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('user-login') }}"><i class="far fa-user-circle"></i>تسجيل
                                            الدخول</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-auto text-center">
                        <div class="header-links style2 style-white">
                            <ul>
                                @foreach($settings as $item)
                                                                <li> <a href="mailto:{{ $item->email ?? ''}}">{{ $item->email ?? ''}}</a>:الايميل<i
                                                                        class="fas fa-envelope"></i></li>
                                                                <!-- <li> <a href="tel:{{ $item->phone ?? ''}}">{{ $item->phone ?? ''}}</a> </i>:الهاتف<i
                                                                        class="fas fa-mobile-alt"></i></li> -->
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sticky-wrap">
                                            <div class="sticky-active">
                                                <div class="container">
                                                    <div class="row gx-3 align-items-center justify-content-between">
                                                        <div class="col text-end text-lg-center">
                                                            <nav class="main-menu menu-style1 d-none d-lg-block">
                                                                <ul style="
                                                                display: flex;
                                                                flex-direction: row-reverse;
                                                                justify-content: center;">
                                                                    <li>
                                                                        <a href="{{ route('home')}}">الرئيسية</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('about-us')}}">نبذة عنا</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('subjects')}}">المواد</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('blogs')}}">الاخبار</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="{{ route('gallary')}}">معرض الصور</a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="{{ route('contact-us')}}">تواصل معانا</a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                            <button class="vs-menu-toggle d-inline-block d-lg-none"><i class="fal fa-bars"></i></button>
                                                        </div>
                                                        <div class="col-8 col-sm-auto">
                                                            <div class="header-logo">
                                                                <a href="{{ route('home')}}">
                                                                    <img src="{{ asset('assets/img/logo/PNG/AlAbkariAlSaghier_Logo_3.png')}}"
                                                                        alt="logo">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header>


                                    @yield('front')



                                    <footer class="footer-wrapper footer-layout1" data-bg-src="{{ asset('assets/img/bg/footer-bg-1-1.png')}}">
                                        <div class="footer-top">
                                            <div class="container">
                                                <div class="row gx-60 gy-4 text-center text-lg-start justify-content-between align-items-center">
                                                    <div class="col-lg-auto"><a href="{{ route('registration')}}" class="vs-btn">سجل الان</a></div>
                                                    <div class="col-lg-auto">
                                                        <h3 class="h4 mb-0 text-white"><img src="{{ asset('assets/img/icon/check-list.svg')}}"
                                                                alt="icon" class="me-2">مدرسة سمسطا بنين 2 الجديدة
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg" style="text-align: right;"><a href="{{ route('home')}}"><img
                                                                src="{{ asset('assets/img/logo/PNG/AlAbkariAlsaghier_LogoWhite_4.png')}}" width="400px"
                                                                alt="logo"></a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-area">
                                            <div class="container">
                                                <div class="row justify-content-center gx-60">
                                                    <div class="col-lg-4">
                                                        <div class="widget footer-widget">
                                                            <div class="widget-about">
                                                                <h3 class="mt-n2" style="text-align: right;">اعطي لطفلك فرصة</h3>
                                                                <p class="map-link">مركز سمسطا,محافظة بني سويف<img
                                                                        src="{{ asset('assets/img/icon/map.svg')}}" alt="svg"></p>
                                                                <div class="sidebar-gallery">
                                                                    <div class="gallery-thumb">
                                                                        <img src="{{ asset('assets/img/school/gal-2-1.jpg')}}" alt="Gallery Image"
                                                                            class="w-100">
                                                                        <a href="assets/img/widget/gal-2-1.jpg" class="popup-image gal-btn"><i
                                                                                class="fal fa-plus"></i></a>
                                                                    </div>
                                                                    <div class="gallery-thumb">
                                                                        <img src="{{ asset('assets/img/school/gal-2-2.jpg')}}" alt="Gallery Image"
                                                                            class="w-100">
                                                                        <a href="assets/img/widget/gal-2-2.jpg" class="popup-image gal-btn"><i
                                                                                class="fal fa-plus"></i></a>
                                                                    </div>
                                                                    <div class="gallery-thumb">
                                                                        <img src="{{ asset('assets/img/school/gal-2-3.jpg')}}" alt="Gallery Image"
                                                                            class="w-100">
                                                                        <a href="assets/img/widget/gal-2-3.jpg" class="popup-image gal-btn"><i
                                                                                class="fal fa-plus"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="widget footer-widget">
                                                            <h3 class="widget_title">تواصل معانا</h3>
                                                            <div>
                                                                <p class="footer-info"><a href="{{ $item->email ?? ''}}">{{ $item->email ?? ''}}</a>
                                                                    :الايميل<i class="fal fa-envelope"></i></p>
                                                                <!-- <p class="footer-info"><a href="tel:{{ $item->phone ?? ''}}">{{ $item->phone ?? ''}}</a>
                                                                    :للتواصل
                                                                    <i class="fas fa-mobile-alt"></i> -->
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <div class="widget widget_nav_menu  footer-widget">
                                                            <h3 class="widget_title">الصفحات</h3>
                                                            <div class="menu-all-pages-container footer-menu" style="
                                                            text-align: right;
                                                            display: flex;
                                                            justify-content: end;">
                                                                <ul class="menu">
                                                                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                                                                    <li><a href="{{ route('about-us')}}">نبذة عنا</a></li>
                                                                    <li><a href="{{ route('subjects')}}">المواد</a></li>
                                                                    <li><a href="{{ route('blogs')}}">الاخبار</a></li>
                                                                    <li><a href="{{ route('gallary')}}">معرض الصور</a></li>
                                                                    <li><a href="{{ route('contact-us')}}">تواصل معانا</a></li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="copyright-wrap">
                                            <div class="container">
                                                <div class="row flex-row-reverse gy-3 justify-content-between align-items-center">
                                                    <div class="col-lg-auto">
                                                        <p class="copyright-text ">جميع الحقوق محفوظة لدي <a href="{{ route('home')}}">العبقري
                                                                الصغير</a> &copy;
                                                            2025. تم التصميم و التطوير بواسطة <a href="https://brmja.tech/">برمجة تك</a></p>
                                                    </div>
                                                    <div class="col-lg-auto">
                                                        <div class="footer-social">
                                                            <a href="{{ $item->socialLink1 ?? ''}}"><i class="fab fa-facebook-f"></i></a>
                                                            <a href="{{ $item->socialLink2 ?? ''}}"><i class="fab fa-twitter"></i></a>
                                                            <a href="{{ $item->socialLink3 ?? ''}}"><i class="fab fa-linkedin-in"></i></a>
                                                            <a href="{{ $item->socialLink4 ?? ''}}"><i class="fab fa-youtube"></i></a>
                                                        </div>
                                @endforeach

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll To Top -->
    <a href="#" class="scrollToTop scroll-btn"><i class="far fa-arrow-up"></i></a>

    <!--********************************
			Code End  Here 
	******************************** -->

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/js/slick.min.js')}}"></script>
    <!-- <script src="{{ asset('assets/js/app.min.js')}}"></script> -->
    <!-- Layerslider -->
    <script src="{{ asset('assets/js/layerslider.utils.js')}}"></script>
    <script src="{{ asset('assets/js/layerslider.transitions.js')}}"></script>
    <script src="{{ asset('assets/js/layerslider.kreaturamedia.jquery.js')}}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('assets/js/main.js')}}"></script>


</body>

</html>