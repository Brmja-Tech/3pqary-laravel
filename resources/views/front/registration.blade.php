@extends('front.layout.layout')

@section('front')

<div class="breadcumb-wrapper " style="background-image: url(assets/img/school/rigesteration.jpeg);">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="text-align: right; color: #fff;">صفحة التسجيل</h1>
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
                    <div class="img-1 mega-hover"><img src="assets/img/school/rigesteration.jpeg"
                            style="width:440px; height:330px;" alt="image"></div>
                    <div class="img-2 mega-hover"><img src="assets/img/school/rigsteration-2.jpeg"
                            style="width:440px; height:330px;" alt="image"></div>
                </div>
            </div>
            <div class="col-xl col-xxl-6 align-self-center">
                <h2 class="sec-title mb-3" style="text-align: right;">سجل الان</h2>

                <form action="{{ route('user-register') }}" method="POST" class="form-style3">
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>اسم الطفل <span class="required">(مطلوب)</span></label>
                            <input type="text" name="child_name" required class="form-control">
                        </div>
                        @error('child_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>تاريخ الميلاد <span class="required">(مطلوب)</span></label>
                            <input type="date" name="birth_date" required class="form-control">
                        </div>
                        @error('birth_date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>اسم الوالد / الوالدة <span class="required">(مطلوب)</span></label>
                            <input type="text" name="parent_name" required class="form-control">
                        </div>
                        @error('parent_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>رقم الهاتف <span class="required">(مطلوب)</span></label>
                            <input type="number" name="phone" required class="form-control">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>كلمة المرور <span class="required">(مطلوب)</span></label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-6 form-group" style="text-align: right;">
                            <label>تاكيد كلمة المرور <span class="required">(مطلوب)</span></label>
                            <input type="password" name="password_confirmation" required class="form-control">
                        </div>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="col-md-12 form-group" style="text-align: right;">
                            <label>الايميل <span class="required">(مطلوب)</span></label>
                            <input type="email" name="email" required class="form-control">
                        </div> @error('email    ')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="col-md-12 form-group" style="text-align: right;">
                            <a href="{{ route('user-login') }}">لدي حساب بالفعل</a>
                        </div>

                        <div class="col-auto form-group">
                            <button class="vs-btn" type="submit">سجل الان</button>
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
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.36.12 PM.jpeg"
                        alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.58 PM.jpeg"
                        alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.58 PM.jpeg"
                        alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.56 PM.jpeg"
                        alt="brand"></div>
            </div>
            <div class="col-auto">
                <div class="brand-style1"><img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.34 PM.jpeg  "
                        alt="brand"></div>
            </div>
        </div>
    </div>
</section>

@endsection