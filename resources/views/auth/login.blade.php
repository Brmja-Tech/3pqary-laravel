<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>El-3abkary | login</title>
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

    <!--authentication-->

    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="section-authentication-cover">
        <div class="">
            <div class="row g-0">
                <div
                    class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex border-end bg-transparent">
                    <div class="card rounded-0 mb-0 border-0 shadow-none bg-transparent bg-none">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/img/logo/PNG/AlAbkariAlSaghier_Logo_3.png')}}"
                                class="img-fluid auth-img-cover-login " width="850" alt="">
                        </div>
                    </div>
                </div>
                <div
                    class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center border-top border-4 border-primary border-gradient-1">
                    <div class="card rounded-0 m-3 mb-0 border-0 shadow-none bg-none">
                        <div class="card-body p-sm-5">
                            <!-- <img src="{{ asset('assets/img/logo/PNG/AlAbkariAlSaghier_Logo_3.png')}}" class="mb-4 text-center" width="145" alt=""> -->

                            <form class="row g-3" method="POST" action="{{ route('login_store') }}">
                                @csrf

                                <h4 class="fw-bold text-center">تسجيل الدخول</h4>
                                <div class="form-body mt-4">
                                    <form class="row g-3">
                                        <div class="col-12 mb-3">
                                            <label for="inputEmailAddress" class="form-label">البريد الالكتروني</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                                value="admin@admin.com">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="col-12 mb-3">
                                            <label for="inputChoosePassword" class="form-label">كلمة السر</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control" name="password"
                                                    id="inputChoosePassword" value="1234567890"
                                                    placeholder="Enter Password">
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                        <div class="col-md-6 m-3">
                                            <div class="form-check form-switch md-2">
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Remember
                                                    Me</label>
                                            </div>

                                        </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
                                    </div>
                                </div>
                            </form>
                            <div class="col-12 m-4">
                                <div class="text-start">
                                    <p class="mb-0">Don't have an account yet? <a href="{{ route('register')}}">Sign up
                                            here</a>
                                    </p>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!--end row-->
    </div>

    <!--authentication-->

    <!--plugins-->
    <script src=" assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>