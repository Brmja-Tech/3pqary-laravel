@extends('front.layout.layout')

@section('front')

<div class="breadcumb-wrapper " style="background-image: url(assets/img/school/subjects.jpeg); background-repeat: no-repeat; background-size: cover;">
    <div class="container z-index-common">
        <div class="breadcumb-content" style="text-align: right;">
            <h1 class="breadcumb-title" style="color: #fff;">جميع المواد</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>جميع المواد</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class=" space-top space-extra-bottom">
    <div class="container">
        <div class="row justify-content-center" style="text-align: right;">
            @foreach ($courses as $item)
            <div class="col-sm-6 col-lg-4 col-xl-3">
                <div class="class-style2">
                    <h3 class="class-title h5"><a class="text-inherit" href="{{ route('subject-details', $item->id)}}">{{ $item->title }}</a></h3>
                    <div class="class-img">
                        <div class="img"><a href="{{ route('subject-details', $item->id) }}"><img src="{{ asset('storage/' . $item->image) }}" style="width: 220; height: 220px"
                                    alt="class"></a></div>
                        <span class="class-number">01</span>
                    </div>
                    <p class="class-info">السن: <span class="info">{{ $item->note}}</span></p>
                </div>
            </div>
            @endforeach
        </div>
        <!-- <div class="text-center">
            <div class="vs-pagination pt-md-3">
                <a href="#" class="pagi-btn">السابق</a>
                <ul>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">12</a></li>
                </ul>
                <a href="#" class="pagi-btn">التالي</a>
            </div>
        </div> -->
    </div>
</section>
@endsection