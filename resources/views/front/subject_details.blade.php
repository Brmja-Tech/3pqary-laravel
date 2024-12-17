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

@guest
    <div id="login-popup" class="popup">
            <div class="popup-content" >
                <p>أنت بحاجة إلى تسجيل الدخول للوصول إلى هذا المحتوى.</p>
                <button onclick="window.location.href='{{ route('user-login') }}'">تسجيل الدخول</button>
            </div>
    </div>
@endguest

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const isAuthenticated = @json(Auth::check());

        if (!isAuthenticated) {
            const popup = document.getElementById('login-popup');
            popup.style.display = 'block'; 
        }
    });
</script>

<style>
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .popup-content {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        margin: auto;
        text-align: center;
        width: 400px;
        height: 200px;
        max-width: 90%;
    }

    .popup button {
        padding: 10px 20px;
        margin: auto;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .popup button:hover {
        background-color: #0056b3;
    }
</style>

@endsection