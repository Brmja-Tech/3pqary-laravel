@extends('dashboard.layout.layout')

@section('title', isset($admin) ? 'Edit admin' : 'Create admin')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">المديروف</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($admin) ? 'تعديل المدير' : 'انشاء مدير جديد' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('admin.admins.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->

    <form action="{{ isset($admin) ? route('admin.admins.update', $admin->id) : route('admin.admins.store') }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      @if(isset($admin))
      @method('PUT')
    @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <!-- Phone Field -->
                 <input type="hidden" name="role" value="admin">
                <div class="mb-4 col-6">
                  <h5 class="mb-3">الاسم </h5>
                  <input type="text" name="name" class="form-control" placeholder="ادخل اسم المدير...."
                    value="{{ isset($admin) ? $admin->name : old('name') }}">
                </div>
                <div class="mb-4 col-6">
                  <h5 class="mb-3">رقم الهاتف</h5>
                  <input type="number" name="phone" class="form-control" placeholder="ادخل رقم الهاتف...."
                    value="{{ isset($admin) ? $admin->phone : old('phone') }}">
                </div>
                <!-- Email Field -->
                <div class="mb-4 col-6">
                  <h5 class="mb-3">البريد الالكتروني</h5>
                  <input type="email" name="email" class="form-control" placeholder="ادخل البريد الالكتروني...."
                    value="{{ isset($admin) ? $admin->email : old('email') }}">
                </div>
                <!-- <div class="mb-4 col-6">
                  <h5 class="mb-3">الأدوار</h5>
                  @foreach($allRoles as $role)
            <label>
            <input type="checkbox" name="roles[]" value="{{ $role->name[0] }}" {{ $roles->contains($role->name) ? 'checked' : '' }}>
            {{ $role->name }}
            </label>
            <br>
          @endforeach
                </div> -->

                <!-- password Field -->
                <div class="mb-4 col-6">
                  <h5 class="mb-3">كلمة المرور </h5>
                  <input type="password" name="password" class="form-control" placeholder="ادخل كلمة المرور....">
                  <!-- value="{{ isset($admin) ? $admin->password : old('password') }}" -->

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Submit Button -->
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($admin) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
<!--end main wrapper-->

@endsection