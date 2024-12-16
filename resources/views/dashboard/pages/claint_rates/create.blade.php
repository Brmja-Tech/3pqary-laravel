@extends('dashboard.layout.layout')

@section('title', isset($ClaintRates) ? 'Edit ClaintRates' : 'Create ClaintRates')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
  <div class="main-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">أرآء العملاء</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page">
              {{ isset($ClaintRates) ? 'تعديل رائي العميل' : 'انشاء رائي عميل جديد' }}
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-auto">
      <div class="d-flex align-items-center gap-2 justify-content-lg-end">
        <a href="{{ route('claint_rates.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
      </div>
    </div>
    <!--end breadcrumb-->

    <form
      action="{{ isset($ClaintRates) ? route('claint_rates.update', $ClaintRates->id) : route('claint_rates.store') }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @if(isset($ClaintRates))
      @method('PUT')
      @endif

      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="mb-4">
                <h5 class="mb-3">اسم </h5>
                <input
                  type="text"
                  name="title"
                  class="form-control"
                  placeholder="ادخل اسم العميل...."
                  value="{{ isset($ClaintRates) ? $ClaintRates->title : old('title') }}">
              </div>
              <div class="mb-4">
                <h5 class="mb-3">رائي العميل</h5>
                <textarea
                  class="form-control"
                  cols="4"
                  rows="3"
                  name="note"
                  placeholder="قم بإدخال نبذة مختصرة..">{{ isset($ClaintRates) ? $ClaintRates->note : old('note') }}</textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
            <i class="bi bi-send me-2"></i>{{ isset($ClaintRates) ? 'تحديث' : 'حفظ' }}
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
<!--end main wrapper-->

@endsection