@extends('dashboard.layout.layout')
@section('title', @trans('Roles'))
@section('content')
<!-----------------------------Start BreadCrumb--------------------------------------->
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">@trans('Dashboard') </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">@trans('all Roles')</a>
                    </li>
                    <li class="breadcrumb-item active">@trans('All Roles') </li>
                </ol>
            </div>
            <h4 class="page-title">@trans('Roles') </h4>
        </div>
    </div>
</div>

<!-- end page title -->
<!-----------------------------End BreadCrumb--------------------------------------->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('admin.roles.create') }}" class="btn btn-outline-primary float-end"> <i
                        class="fa-solid fa-square-plus"></i>Create</a>
            </div>
            <div class="card-body">
                <!-- الجدول لعرض الترجمات -->
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@trans('Role name')</th>
                            <th>@trans('Created at')</th>
                            <th>@trans('Settings')</th>
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
                                            @trans('Settings')
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a class="dropdown-item text-center text-primary"
                                                    href="{{ route('admin.roles.edit',$item->id) }}">
                                                    @trans('Edit')
                                                </a>
                                            </li>
                                            <li>
                                                @if ($item->id != 1)
                                                <form
                                                action="{{ route('admin.roles.destroy', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this ?');"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="dropdown-item text-center text-danger">@trans('Delete')</button>
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
