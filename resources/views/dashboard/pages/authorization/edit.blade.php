@extends('dashboard.layout.layout')
@section('title', ('Roles'))
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
                        <li class="breadcrumb-item active" aria-current="page">تعيل الصلاحيات</li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="col-auto">
            <div class="d-flex align-items-center gap-2 justify-content-lg-end">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-primary mb-3 px-4">الرجوع</a>
            </div>
        </div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-5">
                <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12">
                        <label for="name" class="form-label">@trans('Role Name')</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $role->name ?? '') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">@trans('Permission Names')</label>
                        @foreach ($permissions as $group => $groupPermissions)
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check form-check-group">
                                    <input class="form-check-input form-check-input-group" type="checkbox" id="group{{ $group }}" onchange="selectAllPermissions('{{ $group }}')">
                                    <label class="form-check-label form-check-label-group" for="group{{ $group }}">
                                        <strong>{{ $group }}</strong>
                                    </label>
                                </div>
                            </div>
                            @foreach ($groupPermissions as $permission)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input permission-checkbox" type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                           id="permission{{ $permission->id }}"
                                           {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}
                                           data-group="{{ $group }}">
                                    <label class="form-check-label" for="permission{{ $permission->id }}">
                                        {{ transPermission($permission->name) }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                        @error('permissions')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5 float-end">@trans('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
function selectAllPermissions(group) {
    var groupCheckbox = document.getElementById('group' + group);
    var permissions = document.querySelectorAll('.permission-checkbox[data-group="' + group + '"]');
    permissions.forEach(function(permissionCheckbox) {
        permissionCheckbox.checked = groupCheckbox.checked;
    });
}
</script>
@endsection
