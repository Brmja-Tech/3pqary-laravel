@extends('dashboard.layout.layout')

@section('title','Grades')

@section('content')


<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">الصفوف</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">انشاء صف جديد</li>
          </ol>
        </nav>
      </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="mb-4">
              <h5 class="mb-3">عنوان الصف</h5>
              <input type="text" class="form-control" placeholder="ادخل عنوان الصف....">
            </div>
            <div class="mb-4">
              <h5 class="mb-3">الوصف </h5>
              <textarea class="form-control" cols="4" rows="3" placeholder="قم بإدخال نبذة مختصرة.."></textarea>
            </div>
            <div class="mb-4">
              <h5 class="mb-3">اضف صورة للصف</h5>
              <input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
            </div>

          </div>
        </div>
      </div>
      <div class="col-4">
        <button type="button" class="btn btn-outline-primary col-4 flex-fill"><i class="bi bi-send me-2"></i>حفظ</button>
      </div>
    </div>
</main>
<!--end main wrapper-->

@endsection