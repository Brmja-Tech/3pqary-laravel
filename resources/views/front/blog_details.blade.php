@extends('front.layout.layout')

@section('front')

<div class="breadcumb-wrapper" style="background-image: url({{ asset('assets/img/school/WhatsApp\ Image\ 2024-11-30\ at\ 4.34.01\ PM.jpeg')}}); background-repeat: no-repeat; background-size: cover;">
        <div class="container z-index-common">
            <div class="breadcumb-content" style="text-align: right;">
                <h1 class="breadcumb-title" style="color: #000;">تفاصيل الخبر</h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                        <li>تفاصيل الخبر</li>
                        <li><a href="{{ route('home')}}">الرئيسية</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--==============================
    Blog Details Area
    ==============================-->
    <section class="vs-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row gx-40">
                <div class="col-lg-8">
                    <div class="vs-blog blog-single">
                        <div class="blog-img">
                            <img width="1300" style="height: 500px;" src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="blog.html"><i class="far fa-calendar-alt"></i>{{ $blog->created_at->format('d-m-Y') }}</a>
                                <!-- <span><i class="far fa-comment-alt-dots"></i>15</span> -->
                            </div>
                            <h2 class="blog-title">{{ $blog->title }}</h2>
                            <p style="text-align: right;">
                                {{ $blog->content }}
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget">
                        <h3 class="widget_title">اخر الاخبار</h3>
                        <div class="recent-post-wrap">
                            @foreach ($blogs as $item)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('blog-details', $item->id)}}"><img src="{{ asset('storage/' . $item->image) }}" style="width: 100px; height: 100px;"
                                            alt="Blog Image"></a>
                                </div>
                                <div class="media-body">
                                    <div class="recent-post-meta">
                                        <a href="{{ route('blogs')}}"><i class="far fa-calendar-alt"></i>{{ $item->created_at }}</a>
                                    </div>
                                    <h4 class="post-title"><a class="text-inherit" href="{{ route('blog-details', $item->id)}}">{{ $item->title }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget  ">
                        <h4 class="widget_title">معرض الصور</h4>
                        <div class="sidebar-gallery">
                            @foreach ($gallary as $item)
                            <div class="gallery-thumb">
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('assets/img/school/draw.jpeg') }}" style="width: 100px; height: 100px;"
                                    alt="Gallery Image" class="w-100">
                                <a href="{{ $item->file ? asset('storage/' . $item->file) : asset('assets/img/school/draw.jpeg') }}" class="popup-image gal-btn"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </aside>
            </div>
            </div>
        </div>
    </section>


@endsection