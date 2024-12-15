@extends('front.layout.layout')

@section('front')

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " style="background-image: url(assets/img/school/WhatsApp\ Image\ 2024-11-30\ at\ 4.33.12\ PM.jpeg); background-repeat: no-repeat; background-size: cover;">
        <div class="container z-index-common">
            <div class="breadcumb-content" style="text-align: right;">
                <h1 class="breadcumb-title" style="color: #fff;">تواصل معانا</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li>تواصل معانا</li>
                        <li><a href="{{ route('home')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--==============================
    Contact Area
    ==============================-->
    <section class=" space-top space-extra-bottom ">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="info-style2">
                        @foreach ($settings as $item)
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-1.svg" alt="icon"></div>
                        <h3 class="info-title">رقم الهاتف</h3>
                        <p class="info-text"><a href="tel:{{ $item->phone}}" class="text-inherit">{{ $item->phone}}</a>
                        </p>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-style2">
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-2.svg" alt="icon"></div>
                        <h3 class="info-title">من الاحد الي الخميس</h3>
                        <p class="info-text">8.30am – 02.00pm</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-style2">
                        <div class="info-icon"><img src="assets/img/icon/c-b-1-3.svg" alt="icon"></div>
                        <h3 class="info-title">الايميل</h3>
                        <p class="info-text"><a href="mailto:{{ $item->email}}"
                                class="text-inherit">{{ $item->email}}</a></p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!--==============================
    Contact Area
    ==============================-->
@endsection