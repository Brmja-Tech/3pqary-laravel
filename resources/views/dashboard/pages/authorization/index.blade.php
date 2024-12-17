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
                        <li class="breadcrumb-item active" aria-current="page">جميع الصلاحيات</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-primary float-end"> <i
                                class="fa-solid fa-square-plus"></i>إضافة صلاحيات </a>
                    </div>
                    <div class="card-body">
                        <!-- الجدول لعرض الترجمات -->
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role name</th>
                                    <th>Created at</th>
                                    <th>Settings</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Settings
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <li>
                                                        <a class="dropdown-item text-center text-primary"
                                                            href="{{ route('admin.roles.edit', $item->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        @if ($item->id != 1)
                                                            <form action="{{ route('admin.roles.destroy', $item->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this ?');"
                                                                style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="dropdown-item text-center text-danger">Delete</button>
                                                            </form>
                                                        @endif

                                                    </li>
                                                </ul>
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
        @endsection