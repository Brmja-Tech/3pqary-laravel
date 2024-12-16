@extends('dashboard.layout.layout')

@section('title', isset($gallery) ? 'Edit gallery' : 'Create gallery')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">معرض الصور</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($gallery) ? 'تعديل الصورة' : 'انشاء صورة جديدة' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('gallery.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->
    <form
      action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @if(isset($gallery))
      @method('PUT')
      @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-4">
                <h5 class="mb-3">عنوان الصورة (اختياري)</h5>
                <input
                  type="text"
                  name="title"
                  class="form-control"
                  placeholder="ادخل عنوان الصورة...."
                  value="{{ isset($gallery) ? $gallery->title : old('title') }}">
              </div>
              <div class="row">
                <div class="mb-4 col-6">
                  <h5 class="mb-3"> الصورة </h5>
                  @if(isset($gallery) && $gallery->file)
                  <div class="mb-3">
                    <img
                      src="{{ asset('path_to_images/' . $gallery->file) }}"
                      alt="معاينة الصورة"
                      class="img-fluid rounded"
                      style="max-height: 200px;">
                  </div>
                  @endif
                  <input
                    type="file"
                    name="file"
                    class="form-control">
                </div>
                <div class="mb-4 col-6">
                  <h5 class="mb-3"> الفيديو (اختياري)</h5>
                  @if(isset($gallery) && $gallery->video)
                  <div class="mb-3">
                    <video
                      controls
                      class="w-100 rounded">
                      <source
                        src="{{ asset('path_to_videos/' . $gallery->video) }}"
                        type="video/mp4">
                      <p>متصفحك لا يدعم تشغيل الفيديو.</p>
                    </video>
                  </div>
                  @endif
                  <input
                    type="file"
                    name="video"
                    class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($gallery) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>

  </div>
</main>
<!--end main wrapper-->

@endsection