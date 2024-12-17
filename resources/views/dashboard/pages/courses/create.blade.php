@extends('dashboard.layout.layout')

@section('title', isset($course) ? 'Edit courses' : 'Create courses')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">المواد الدراسية</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($course) ? 'تعديل المادة' : 'انشاء مادة جديدة' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('admin.courses.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->

    <form
      action="{{ isset($course) ? route('admin.courses.update', $course->id) : route('admin.courses.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @if(isset($course))
      @method('PUT')
      @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-4">
                <h5 class="mb-3">اضف صورة</h5>
                <input
                  type="file"
                  name="image"
                  class="form-control">
                  @if(isset($course) && $course->image)
                  <div class="mb-3">
                    <img
                      src="{{ asset('storage/' . $course->image) }}"
                      alt="معاينة الصورة"
                      class="img-fluid rounded"
                      style="max-height: 200px;">
                  </div>
                  @endif
              </div>
              <div class="mb-4">
                <h5 class="mb-3">عنوان المادة</h5>
                <input
                  type="text"
                  name="title"
                  class="form-control"
                  placeholder="ادخل عنوان المادة...."
                  value="{{ isset($course) ? $course->title : old('title') }}">
              </div>
              <div class="mb-4">
                <h5 class="mb-3">الوصف</h5>
                <textarea
                  class="form-control"
                  cols="4"
                  rows="3"
                  name="note"
                  placeholder="قم بإدخال نبذة مختصرة..">{{ isset($course) ? $course->note : old('note') }}</textarea>
              </div>

              <!-- Multiple Video Inputs -->
              <div class="col-lg-12">
                <div class="mb-3">
                  <label for="videos" class="form-label">فيديو الدورة</label>
                  <div id="videos-container">
                    <div class="video-input d-flex align-items-center mb-2">
                      <input type="file" name="videos[]" class="form-control" accept="video/*">
                      <button type="button" class="btn btn-outline-secondary btn-sm ms-2 remove-video"
                        style="display: none;">حذف</button>
                    </div>
                  </div>
                  <button type="button" id="add-video" class="btn btn-outline-primary btn-sm mt-2">اضف فيديو جديد</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($course) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
<!--end main wrapper-->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const videosContainer = document.getElementById('videos-container');
        const addVideoButton = document.getElementById('add-video');

        addVideoButton.addEventListener('click', function() {
            const newVideoInput = document.createElement('div');
            newVideoInput.classList.add('video-input', 'd-flex', 'align-items-center', 'mb-2');
            newVideoInput.innerHTML = `
                <input type="file" name="videos[]" class="form-control" accept="video/*">
                <button type="button" class="btn btn-outline-secondary btn-sm ms-2 remove-video">Remove</button>
            `;
            videosContainer.appendChild(newVideoInput);
        });

        videosContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-video')) {
                const videoInput = event.target.parentElement;
                videosContainer.removeChild(videoInput);
            }
        });
    });
</script>
@endsection