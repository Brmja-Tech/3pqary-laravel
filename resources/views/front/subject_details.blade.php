@extends('front.layout.layout')

@section('front')


<div class="breadcumb-wrapper " style="background-image: url({{asset('assets/img/school/WhatsApp\ Image\ 2024-11-30\ at\ 4.33.11\ PM.jpeg')}}); background-size: cover; background-repeat: no-repeat;">
    <div class="container z-index-common">
        <div class="breadcumb-content" style="text-align: right;">
            <h1 class="breadcumb-title" style="color: #fff;">تفاصيل المادة</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>تفاصيل المادة</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--==============================
  Class Details  
    ==============================-->
<section class=" space">
    <div class="container">
        <div class="img-box7 mb-lg-5">
            <div class="mega-hover"><img src="{{ asset('storage/' . $courses->image) }}" style="width: 1220px; height: 507px; background-size: cover; background-repeat: no-repeat; background-position: center;" alt="class"></div>
        </div>
        <div class="row justify-content-between text-center text-md-start">
            <div class="col-md mb-4 mb-lg-0" style="text-align: right;">
                <h2 class="lession-title h1">{{ $courses->title}}</h2>
            </div>
        </div>
        <h2 style="text-align: right;">تفاصيل عن المادة</h2>
        <div class="title-divider1"></div>
        <p style="text-align: right;">{{ $courses->note}} </p>


        <div class="img-box4">
            @if(isset($courses->videos[0]) && $courses->videos[0]->isNotEmpty())
            @foreach ($courses->videos[0] as $item)
            <div class="img-1 mega-hover">
                <img src="{{ asset('storage/' . $item->image) }}" alt="Video Thumbnail" class="img-fluid">

                <a href="{{ asset('storage/' . $item->video) }}" class="play-btn popup-video position-center">
                    <i class="fas fa-play"></i>
                </a>
            </div>
            @endforeach
            @else
          
            @endif
        </div>
        @if(isset($courses->videos[0]) && $courses->videos[0]->isNotEmpty())
        <h2 class="pt-3 pt-lg-5 mt-3" style="text-align: right;">باقي الفيديوهات</h2>
        <div class="title-divider1"></div>
        <div class="row vs-carousel" data-slide-show="2" data-md-slide-show="2">
            
            <div class="col-md-6">
                <div class="img-box4">
                    <div class="img-1 mega-hover">
                        <img src="assets/img/about/ab-3-1.jpg" alt="about">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk"
                            class="play-btn popup-video position-center"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
</section>

@endsection