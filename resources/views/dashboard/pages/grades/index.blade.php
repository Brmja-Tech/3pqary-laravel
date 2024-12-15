@extends('dashboard.layout.layout')

@section('title','Grades')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">لوحة التحكم</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">جميع الصفوف</li>
          </ol>
        </nav>
      </div>

    </div>
    <!--end breadcrumb-->

    <div class="row g-3">
      <div class="col-auto">
        <div class="position-relative">
          <input class="form-control px-5" type="search" placeholder="Search Products">
          <span
            class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50 fs-5"></span>
        </div>
      </div>
      <div class="col-auto flex-grow-1 overflow-auto">

      </div>
      <div class="col-auto">
        <div class="d-flex align-items-center gap-2 justify-content-lg-end">
          <a href="{{ route('grade.create')}}" class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>أضف صف جديد</a>
        </div>
      </div>
    </div><!--end row-->

    <div class="card mt-4">
      <div class="card-body">
        <div class="product-table">
          <div class="table-responsive white-space-nowrap">
            <table class="table align-middle">
              <thead class="table-light">
                <tr>
                  <th>
                    <input class="form-check-input" type="checkbox">
                  </th>
                  <th>ID</th>
                  <th>عنوان الصف الدراسي</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <input class="form-check-input" type="checkbox">
                  </td>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      <div class="product-box">
                        <img src="assets/images/orders/01.png" width="70" class="rounded-3" alt="">
                      </div>
                      <div class="product-info">
                        <a href="javascript:;" class="product-title">Women Pink Floral Printed</a>
                        <p class="mb-0 product-category">Category : Fashion</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    Nov 12, 10:45 PM
                  </td>
                  <td>
                    <button class="btn btn-primary" href="#">edit</button>
                    <button class="btn btn-danger" href="#">delete</button>
                  </td>
                </tr>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</main>
<!--end main wrapper-->


@endsection