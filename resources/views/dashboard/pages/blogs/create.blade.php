@extends('dashboard.layout.layout')

@section('title', isset($blog) ? 'Edit Blog' : 'Create Blog')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">الاخبار</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($blog) ? 'تعديل خبر' : 'انشاء خبر جديد' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('blog.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->

    <form
      action="{{ isset($blog) ? route('blog.update', $blog->id) : route('blog.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @if(isset($blog))
      @method('PUT')
      @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="mb-4 col-6">
                  <h5 class="mb-3">صورة الخبر </h5>
                  <input
                    type="file"
                    name="image"
                    class="form-control">
                </div>
                <div class="mb-4 col-6">
                  <h5 class="mb-3">عنوان الخبر </h5>
                  <input
                    type="text"
                    name="title"
                    class="form-control"
                    placeholder="ادخل عنوان الخبر...."
                    value="{{ isset($blog) ? $blog->title : old('title') }}">
                </div>
              </div>
              <div class="mb-4 col-12">
                <h5 class="mb-3"> محتوي الخبر</h5>
                <textarea
                  class="form-control"
                  cols="4"
                  rows="3"
                  name="content"
                  placeholder="قم بإدخال وصف للخبر..">{{ isset($blog) ? $blog->content : old('content') }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($blog) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
<!--end main wrapper-->

@endsection