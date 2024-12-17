@extends('front.layout.layout')

@section('front')

<div class="breadcumb-wrapper " style="background-image: url(assets/img/school/rigesteration.jpeg);">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="text-align: right; color: #fff;">صفحة الدخول</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu" style="text-align: right;">
                    <li>التسجيل</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--==============================
    Contact Area
    ==============================-->
<section class=" space-top " data-bg-src="assets/img/bg/bg-con-1-1.png">
    <div class="container">
        <div class="row">
            <div class="col-xl-auto col-xxl-6">
                <div class="img-box6">
                    <div class="img-1 mega-hover"><img src="assets/img/school/rigesteration.jpeg" style="width:440px; height:330px;" alt="image"></div>
                    <div class="img-2 mega-hover"><img src="assets/img/school/rigsteration-2.jpeg" style="width:440px; height:330px;" alt="image"></div>
                </div>
            </div>
            <div class="col-xl col-xxl-6 align-self-center">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h2 class="sec-title mb-3" style="text-align: right;">للدخول</h2>

                <form action="{{ route('login') }}" method="POST" class="form-style3">
                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>كلمة المرور <span class="required">(مطلوب)</span></label>
                            <input name="password" required type="password">
                        </div>
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>الايميل <span class="required">(مطلوب)</span></label>
                            <input name="email" required type="email">
                        </div>
                        <div class="col-auto form-group">
                            <button class="vs-btn" type="submit">سجل الان</button>
                        </div>
                        <div class="col-md-12 form-group" style="text-align: right;">
                            <a href="{{route('registration')}}">ليس لدي حساب</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--==============================

    ==============================-->
<section class=" space-bottom">
    <div class="container">
        <div class="row vs-carousel gx-10" data-slide-show="5" data-ml-slide-show="4" data-lg-slide-show="3"
            data-md-slide-show="2" data-sm-slide-show="2">
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.36.12 PM.jpeg" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.58 PM.jpeg" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.58 PM.jpeg" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.56 PM.jpeg" alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.34 PM.jpeg  " alt="brand"></div>
            </div>
        </div>
    </div>
</section>
@endsection