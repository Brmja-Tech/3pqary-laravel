@extends('dashboard.layout.layout')

@section('title', isset($teacher) ? 'Edit Teachers' : 'Create Teachers')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">المعلمون</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($teacher) ? 'تعديل المعلم' : 'إنشاء معلم جديد' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('admin.teachers.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->

    <form action="{{ isset($teacher) ? route('admin.teachers.update', $teacher->id) : route('admin.teachers.store') }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($teacher))
      @method('PUT')
    @endif
      <div class="row">

        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="mb-4 col-12">
                  <h5 class="mb-3">الصورة </h5>
                  <input type="file" name="image" class="form-control">
                </div>
                @error('image')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <!-- Second row -->
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">اسم المعلم</h5>
                  <input type="text" name="name" class="form-control" placeholder="ادخل اسم المعلم...."
                    value="{{ isset($teacher) ? $teacher->name : old('name') }}">
                </div>
                @error('name')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">رقم الهاتف</h5>
                  <input type="number" name="phone" class="form-control" placeholder="ادخل رقم الهاتف...."
                    value="{{ isset($teacher) ? $teacher->phone : old('phone') }}">
                </div>
                @error('phone')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <!-- Second row -->
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">ملاحظة 1</h5>
                  <textarea class="form-control" cols="4" rows="3" name="note1"
                    placeholder="قم بإدخال نبذة مختصرة..">{{ isset($teacher) ? $teacher->note1 : old('note1') }}</textarea>
                </div>
                @error('note1')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">ملاحظة 2</h5>
                  <textarea class="form-control" cols="4" rows="3" name="note2"
                    placeholder="قم بإدخال نبذة مختصرة..">{{ isset($teacher) ? $teacher->note2 : old('note2') }}</textarea>
                </div>
                @error('note2')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <!-- Third row -->
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">ملاحظة 3</h5>
                  <textarea class="form-control" cols="4" rows="3" name="note3"
                    placeholder="قم بإدخال نبذة مختصرة..">{{ isset($teacher) ? $teacher->note3 : old('note3') }}</textarea>
                </div>
                @error('note3')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">ملاحظة 4</h5>
                  <textarea class="form-control" cols="4" rows="3" name="note4"
                    placeholder="قم بإدخال نبذة مختصرة..">{{ isset($teacher) ? $teacher->note4 : old('note4') }}</textarea>
                </div>
                @error('note4')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="row">
                <!-- Second row -->
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3"> socialLink1</h5>
                  <input type="text" name="socialLink1" class="form-control"
                    value="{{ isset($teacher) ? $teacher->socialLink1 : old('socialLink1') }}">
                </div>
                <div class="mb-4 col-md-6">
                  <h5 class="mb-3">socialLink2</h5>
                  <input type="text" name="socialLink2" class="form-control"
                    value="{{ isset($teacher) ? $teacher->socialLink2 : old('socialLink2') }}">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-4">
        <button type="submit" class="btn btn-outline-primary">
          <i class="bi bi-send me-2"></i>{{ isset($teacher) ? 'تحديث' : 'حفظ' }}
        </button>
      </div>
  </div>
  </form>
  </div>
</main>
<!--end main wrapper-->

@endsection