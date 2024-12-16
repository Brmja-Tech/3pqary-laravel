<?php

use App\Models\CustomPermission;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

//Get All Route And filter
if (!function_exists('getAdminRoutes')) {
    function getAdminRoutes()
    {
        $routeCollection = Route::getRoutes();


        $routes = [];
        $permissions = [];
        foreach ($routeCollection as $value) {
            $routes[] =  $value->getName();
        }
        $routes = array_filter($routes);
        foreach ($routes as $route) {
            if (str_contains($route, "admin") == true) {
                $permissions[] = $route;
            }
        }
        return $permissions;
    }
}


if (!function_exists('syncPermisions')) {
    function syncPermisions($model = null)
    {
        $routes = getAdminRoutes();
        foreach ($routes as $route) {
            $groupName = explode('.', $route)[1] ?? 'general'; // صنف الصلاحيات حسب الجزء الثاني من الـ route
            $permissionExist = (clone $model)->where('name', $route)->first();
            if ($permissionExist == null) {
                CustomPermission::create([
                    'name' => $route,
                    'group_name' => $groupName,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}

if (!function_exists('transPermission')) {
    function transPermission($val)
    {
        $val = str_replace('admin.', '', $val);
        $val = str_replace('.', ' ', $val);
        $val = str_replace('-', ' ', $val);
        return  $val;
    }
}