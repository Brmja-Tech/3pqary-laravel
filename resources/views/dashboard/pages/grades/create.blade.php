@extends('dashboard.layout.layout')

@section('title', isset($grade) ? 'Edit Grade' : 'Create Grade')

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
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($grade) ? 'تعديل الصف' : 'انشاء صف جديد' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('admin.grade.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->
    
    <form 
      action="{{ isset($grade) ? route('admin.grade.update', $grade->id) : route('admin.grade.store') }}" 
      method="POST" 
      enctype="multipart/form-data"
    >
      @csrf
      @if(isset($grade))
        @method('PUT')
      @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-4">
                <h5 class="mb-3">عنوان الصف</h5>
                <input 
                  type="text" 
                  name="title" 
                  class="form-control" 
                  placeholder="ادخل عنوان الصف...." 
                  value="{{ isset($grade) ? $grade->title : old('title') }}"
                >
              </div>
              <div class="mb-4">
                <h5 class="mb-3">الوصف</h5>
                <textarea 
                  class="form-control" 
                  cols="4" 
                  rows="3" 
                  name="note" 
                  placeholder="قم بإدخال نبذة مختصرة.."
                >{{ isset($grade) ? $grade->note : old('note') }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($grade) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
<!--end main wrapper-->

@endsection
