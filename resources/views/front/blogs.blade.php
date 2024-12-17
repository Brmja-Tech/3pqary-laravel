@extends('front.layout.layout')

@section('front')

<!--==============================
    Breadcumb
============================== -->
<div class="breadcumb-wrapper " style="background-image: url(assets/img/school/WhatsApp\ Image\ 2024-11-30\ at\ 4.34.25\ PM.jpeg); background-repeat: no-repeat; background-size: cover;">
    <div class="container z-index-common">
        <div class="breadcumb-content" style="text-align: right;">
            <h1 class="breadcumb-title" style="color: #000;">الاخبار</h1>
            <div class="breadcumb-menu-wrap">
                <ul class="breadcumb-menu">
                    <li>الاخبار</li>
                    <li><a href="{{ route('home')}}">الرئيسية</a></li>
                </ul>
            </div>
        </div>
    </div>
</div><!--==============================
    Blog Area
    ==============================-->
<section class="vs-blog-wrapper space-top space-extra-bottom">
    <div class="container">
        <div class="row gx-40">

            <div class="col-lg-8">
                @foreach ($blogs as $item)
                <div class="vs-blog blog-single has-post-thumbnail">
                    <div class="blog-img">
                        <a href="{{ route('blog-details', $item->id)}}"><img width="1300" style="height: 500px;" src="{{ asset('storage/' . $item->image) }}"
                                alt="Blog Image"></a>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <a href="{{ route('blogs')}}"><i class="far fa-calendar-alt"></i>{{ $item->created_at }}</a>
                        </div>
                        <h2 class="blog-title"><a href="{{ route('blog-details', $item->id)}}">{{ $item->title }}</a></h2>
                        <p class="blog-text">{{ $item->note }} </p>
                        <a href="{{ route('blog-details', $item->id)}}" class="vs-btn style2">اقراء المزيد</a>
                    </div>
                </div>
                @endforeach

                <!-- <div class="vs-pagination  ">
                        <a href="#" class="pagi-btn">السابق</a>
                        <ul>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">12</a></li>
                        </ul>
                        <a href="#" class="pagi-btn">التالي</a>
                    </div> -->
            </div>
            <div class="col-lg-4">
                <aside class="sidebar-area">
                    <div class="widget">
                        <h3 class="widget_title">اخر الاخبار</h3>
                        <div class="recent-post-wrap">
                            @foreach ($blogs as $item)
                            <div class="recent-post">
                                <div class="media-img">
                                    <a href="{{ route('blog-details', $item->id)}}"><img src="{{ asset('storage/' . $item->image) }} " style="width: 100px; height: 100px;"
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
                                <img src="{{ $item->file ? asset('storage/' . $item->file) : asset('assets/img/school/draw.jpeg') }} " style="width: 100px; height: 100px;"
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
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</section><!--==============================
			Footer Area
	==============================-->
@endsection