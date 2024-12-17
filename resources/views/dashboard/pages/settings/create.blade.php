@extends('dashboard.layout.layout')

@section('title', isset($setting) ? 'Edit Settings' : 'Create Settings')

@section('content')

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">الاعدادات</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ isset($setting) ? 'تعديل الاعدادات' : 'انشاء اعدادات جديدة' }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <form
            action="{{ isset($setting) ? route('admin.settings.update', $setting->id) : route('admin.settings.store') }}"
            method="POST" dir="rtl">
            @csrf
            @if (isset($setting))
            @method('PUT')
            @endif

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Phone Field -->
                                <div class="mb-4 col-6">
                                    <h5 class="mb-3">رقم الهاتف</h5>
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="ادخل رقم الهاتف...."
                                        value="{{ isset($setting) ? $setting->phone : old('phone') }}">
                                </div>
                                <!-- Email Field -->
                                <div class="mb-4 col-6">
                                    <h5 class="mb-3">البريد الالكتروني</h5>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="ادخل البريد الالكتروني...."
                                        value="{{ isset($setting) ? $setting->email : old('email') }}">
                                </div>

                                <!-- Social Links Fields -->
                                @foreach (['socialLink1', 'socialLink2', 'socialLink3', 'socialLink4'] as $link)
                                <div class="mb-4 col-6">
                                    <h5 class="mb-3">{{ ucfirst($link) }}</h5>
                                    <input
                                        type="text"
                                        name="{{ $link }}"
                                        class="form-control"
                                        placeholder="{{ 'ادخل الرابط الخاص بـ ' . $link }}..."
                                        value="{{ isset($setting) ? $setting->$link : old($link) }}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="col-4">
                    <button type="submit" class="btn btn-outline-primary col-4 flex-fill">
                        <i class="bi bi-send me-2"></i>{{ isset($setting) ? 'تحديث' : 'حفظ' }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <!-- Settings List -->
    <div class="col-xl-12 col-lg-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">قائمة الاعدادات</h4>
            </div>
            <div class="card-body">
                @isset($settings)
                @if ($settings->isNotEmpty())
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Social Link 1</th>
                                <th>Social Link 2</th>
                                <th>Social Link 3</th>
                                <th>Social Link 4</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                            <tr>
                                <td>{{ $setting->id }}</td>
                                <td>{{ $setting->phone }}</td>
                                <td>{{ $setting->email }}</td>
                                <td>{{ $setting->socialLink1 }}</td>
                                <td>{{ $setting->socialLink2 }}</td>
                                <td>{{ $setting->socialLink3 }}</td>
                                <td>{{ $setting->socialLink4 }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <!-- Delete Form -->
                                    <form
                                        action="{{ route('admin.settings.destroy', $setting->id) }}"
                                        method="POST"
                                        style="display:inline-block;"
                                        onsubmit="return confirm('Are you sure you want to delete this setting?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="alert alert-warning">No settings found.</div>
                @endif
                @endisset
            </div>
        </div>
    </div>
</main>
<!--end main wrapper-->

@endsection