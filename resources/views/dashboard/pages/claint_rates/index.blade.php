@extends('dashboard.layout.layout')

@section('title','Claints Ratess')

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
            <li class="breadcrumb-item active" aria-current="page">جميع أرآء العملاء</li>
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
          <a href="{{ route('admin.claint_rates.create')}}" class="btn btn-primary px-4"><i class="bi bi-plus-lg me-2"></i>أضف صف جديد</a>
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
                  <th>ID</th>
                  <th>عنوان الصف الدراسي</th>
                  <th>الرائي</th>
                  <th>تاريخ الانشاء</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($claint_rates as $item)
                <tr>
                  <td>
                    {{ $loop->iteration }}
                  </td>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      <div class="product-info">
                        <p class="product-title">{{ $item->title }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex align-items-center gap-3">
                      <div class="product-info">
                        <p class="product-title">{{ $item->note }}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $item->created_at->format('Y-m-d')}}
                  </td>
                  <td>
                    <div class="d-flex gap-2">
                      <!-- Edit Button -->
                      <a class="btn btn-primary" href="{{ route('admin.claint_rates.edit', $item->id) }}"> تعديل </a>

                      <!-- Delete Form -->
                      <form action="{{ route('admin.claint_rates.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this claint_rates?');" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                          حذف
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
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