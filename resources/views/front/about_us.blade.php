@extends('front.layout.layout')

@section('front')

<div class="breadcumb-wrapper "
    style="background-image: url(assets/img/school/about-cover.jpeg); background-repeat: no-repeat; background-size: cover;">
    <div class="container z-index-common">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title" style="text-align: right; color: #fff;">نبذة عنا</h1>
            <div class="breadcumb-menu-wrap" style="text-align: right;">
                <ul class="breadcumb-menu">
                    <li>نبذة عنا</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class=" space-extra-bottom mt-5">
    <div class="container">
        <div class="row gx-70">
            <div class="col-lg-6 text-center text-lg-end">
                <div class="img-box2 style2">
                    <div class="transform-banner"><img src="assets/img/school/about-02.jpeg"
                            style="width: 618px; height: 618px;" alt="about"></div>
                    <div class="vs-circle jump"></div>
                </div>
            </div>
            <div class="col-lg-6 align-self-center" style="text-align: right;">
                <h2 class="sec-title pe-xxl-4">مدرسة سمسطا بنين 2 الجديدة </h2>
                <p class="sec-text mb-4 pb-2 col-xxl-10 fs-20">
                    هي واحدة من المؤسسات التعليمية المميزة التي تقع في مركز سمسطا في محافظة بني سويف. تسعى المدرسة
                    لتقديم تعليمًا عالي الجودة من خلال بيئة تعليمية ملائمة تهدف إلى تطوير مهارات الطلاب الأكاديمية
                    والشخصية. تتميز المدرسة بتقديم مناهج تعليمية متكاملة، وتهدف إلى إعداد جيل من الطلاب القادرين على
                    مواجهة تحديات المستقبل بروح الإبداع والتميز. بالإضافة إلى ذلك، توفر المدرسة مرافق حديثة تدعم
                    العملية التعليمية وتُشجع الطلاب على تحقيق أفضل النتائج
                </p>
            </div>
        </div>
    </div>
</section><!--==============================
    Team Area
    ==============================-->
<section class=" space-top space-extra-bottom bg-smoke">
    <div class="container">
        <div class="title-area text-center">
            <div class="sec-bubble">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>
            <h2 class="sec-title">المعلمين</h2>
        </div>
        <div class="row align-items-center">
            @foreach($first_teacher as $item)
            <div class="col-lg-6">
                <div class="team-style1">
                    <div class="team-img">
                        <a href=""><img src="{{ asset('storage/' . $item->image) }}" style="width: 300px; height: 310px;" alt="team"></a>
                    </div>
                    <div class="team-content">
                        <h3 class="team-name h2"><a href="" class="text-inherit">{{ $item->name }} </a>
                        </h3>
                        <p class="team-degi">{{ $item->note1 }}</p>
                        <p class="team-degi">{{ $item->note2 }}</p>
                        <p class="team-degi">{{ $item->note3 }}</p>
                        <p class="team-degi"> {{ $item->note4 }}</p>
                        <div class="vs-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @foreach ($teachers as $item)
            <div class="col-sm-6 col-lg-3">
                <div class="team-style2">
                    <div class="team-img"><a href=""><img src="{{ asset('storage/' . $item->image) }}" style="width: 300px; height: 310px;" alt="team"></a></div>
                    <h3 class="team-name"><a class="text-inherit" href="">{{ $item->name }}</a></h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!--==============================

    Instagram Posts
    ==============================-->
<section class="space-bottom pt-30">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">معرض الصور</h2>
        </div>
        <div class="row vs-carousel" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4"
            data-sm-slide-show="3" data-xs-slide-show="2">
            @foreach($gallary as $item)
            <div class="col-auto">
                <div class="gallery-style1">
                    <div class="gallery-img">
                        <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('assets/img/school/draw.jpeg') }}"
                            style="width: 200px; height: 200px;" alt="gallery">
                        <a href="{{ $item->file ? asset('storage/' . $item->file) : asset('assets/img/school/draw.jpeg') }}"
                            class="gallery-btn popup-image"><i class="far fa-plus"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection