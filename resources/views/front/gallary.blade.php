@extends('front.layout.layout')

@section('front')

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper "
    style="background-image: url(assets/img/school/gallaaarry.jpeg); background-repeat: no-repeat; background-size: cover;">
    <div class="container z-index-common">
        <div class="breadcumb-content" style="text-align: right;">
            <h1 class="breadcumb-title" style="color: #fff;">معرض الصور</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>معرض الصور</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class=" space-bottom mt-5">
    <div class="container-lg">
        <div class="title-area text-center">
            <div class="sec-bubble">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>
            <h2 class="sec-title">معرض الصور</h2>
        </div>
        <div class="row gx-40 gy-gx align-items-center">
            <div class="col-6 col-sm order-1">
                <div class="gallery-style1 layout2">
                    <div class="gallery-img">
                        <img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.00 PM.jpeg"
                            style="width: 220px; height: 541px;" alt="gallery">
                        <a href="assets/img/school/WhatsApp Image 2024-11-30 at 4.33.00 PM.jpeg"
                            class="gallery-btn popup-image"><i class="fal fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 col-md-8 col-xxl-auto order-3 order-sm-2">
                <div class="gallery-style1 layout2">
                    <div class="gallery-img">
                        <img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.15 PM.jpeg" alt="gallery">
                        <a href="assets/img/school/WhatsApp Image 2024-11-30 at 4.34.15 PM.jpeg"
                            class="gallery-btn popup-image"><i class="fal fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm  order-2 order-sm-3">
                <div class="gallery-style1 layout2">
                    <div class="gallery-img">
                        <img src="assets/img/school/WhatsApp Image 2024-11-30 at 4.32.48 PM.jpeg"
                            style="width: 220px; height: 541px;" alt="gallery">
                        <a href="assets/img/school/WhatsApp Image 2024-11-30 at 4.32.48 PM.jpeg"
                            class="gallery-btn popup-image"><i class="fal fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--==============================
    Gallery Area
    ==============================-->
<section class=" space-bottom">
    <div class="container">
        <div class="title-area text-center">
            <div class="sec-bubble">
                <div class="bubble"></div>
                <div class="bubble"></div>
                <div class="bubble"></div>
            </div>
            <h2 class="sec-title">معرض الفيديوهات</h2>
        </div>
        <div class="vs-carousel gal-slider5" data-asnavfor=".gal-slider5-thumb" data-fade="true">
            <div>
                @foreach ($videos as $item)
                    <div class="img-box7">
                        <div class="img-1 mega-hover">
                            <img src="{{ asset('storage/' . $item->file) }}"
                                style="width: 1300px; height: 503px; background-size: contain; background-position: center;"
                                alt="about">
                            <a href="{{ asset('storage/' . $item->video) }}" class="play-btn popup-video position-center"><i
                                    class="fas fa-play"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="row vs-carousel gal-slider5-thumb gx-20" data-asnavfor=".gal-slider5" data-center-mode="true"
            data-xl-center-mode="true" data-ml-center-mode="true" data-lg-center-mode="true" data-slide-show="6"
            data-ml-slide-show="5" data-lg-slide-show="5" data-md-slide-show="4" data-sm-slide-show="2">

            @foreach ($gallary as $item)
                <div class="col-auto">
                    <div class="thumb-style1">
                        <img src="{{ asset('storage/' . $item->file) }}" style="width: 195px; height: 128px" alt="gallery">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!--==============================
    Instagram Posts
    ==============================-->
<section class=" space-bottom">
    <div class="container">
        <div class="title-area text-center">
            <h2 class="sec-title">صور اكثر</h2>
        </div>
        <div class="row vs-carousel" data-slide-show="6" data-lg-slide-show="5" data-md-slide-show="4"
            data-sm-slide-show="3" data-xs-slide-show="2">
            @foreach ($gallary as $item)
                <div class="col-auto">
                    <div class="gallery-style1">
                        <div class="gallery-img">
                            <img src="{{ asset('storage/' . $item->file) }}" style="width: 195px; height: 128px"
                                alt="gallery">
                            <a href="{{ asset('storage/' . $item->file) }}" class="gallery-btn popup-image"><i
                                    class="far fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection