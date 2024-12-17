@extends('layouts.layout')
@section('title', 'Add Role')

@section('breadcrumb')
    {{ Breadcrumbs::render('roles-create') }}
@endsection

@section('content')
<form method="post" action="{{ route('roles.store') }}">
    @csrf
    <div class="content-wrapper" style="background-color: #E9ECEF!important;">
        
        <section class="content p-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __('Info') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('Role Name') }} <span class="astrick" style="color:crimson">*</span></label>
                                <input type="text" name="name" id="inputName" placeholder="{{ __('Enter Role Name') }}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">{{ __('Set Permissions') }}</h3>
                    </div>
                </div>
                <div class="card-body pt-0" style="overflow: auto;">
                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <tbody class="text-gray-600 fw-semibold">
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Admin Management ') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td style="text-align: end;">
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                        <input class="form-check-input" type="checkbox" name='select_all' value="{{ $permissions->pluck('name') }}"/>
                                        <span class="form-check-label" for="kt_roles_select_all">{{ __('Select all') }}</span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800">{{ __('Home Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'home')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800">{{ __('Accountant Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'accountant')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Roles Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'roles')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Users Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'users')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Customers Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'customers')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Marketing Campaigns Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'marketingCampaigns')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-800 w-25">{{ __('Purchases Management') }}
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" title="Allows a full access to the system"></i>
                                </td>
                                <td class="d-flex justify-content-between" style="text-align: end;">
                                    @forelse ($permissions as $permission)
                                        @php
                                            $permissionNames = explode('-', $permission->name);
                                        @endphp
                                        @if ($permissionNames[0] == 'purchases')
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-9" style="cursor: pointer;">
                                                <input class="form-check-input" type="checkbox" name='permission_name[]' value="{{ $permission->name }}"/>
                                                <span class="form-check-label">{{ $permissionNames[1] }}</span>
                                            </label>
                                        @endif
                                    @empty
                                    @endforelse
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <input type="submit" value="{{ __('Save') }}" class="btn btn-info @if(app()->getLocale()  == 'ar') float-left @else float-right @endif">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
@endsection