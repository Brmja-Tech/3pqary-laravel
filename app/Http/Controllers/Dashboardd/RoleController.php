<?php
namespace App\Http\Controllers\Dashboardd;

use App\Http\Controllers\Controller;
use App\Models\CustomPermission;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $model = CustomPermission::query()->get();
        syncPermisions($model);
    }

    public function index(Request $request)
    {
        $roles = Role::with('permissions')->paginate(10);
        return view('dashboard.pages.authorization.index', compact('roles'));
    }

    // Show form for creating a new role
    public function create()
    {
        $permissions = CustomPermission::all()->groupBy('group_name');
        return view('dashboard.pages.authorization.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
            'permissions.required' => __('Please select at least one permission.'),
        ]);

        // Create the new role
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin', 
        ]);

        $permissions = CustomPermission::whereIn('id', $request->permissions)
            ->where('guard_name', 'admin') 
            ->get();

        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('success', __('Role created successfully.'));
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);

        $permissions = CustomPermission::all()->groupBy('group_name');

        return view('dashboard.pages.authorization.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'required|array', 
            'permissions.*' => 'exists:permissions,id', 
        ], [
            'permissions.required' => __('Please select at least one permission.'), 
        ]);

        // Update the role's name
        $role->update([
            'name' => $data['name'],
            'guard_name' => 'admin', 
        ]);

        $permissions = CustomPermission::whereIn('id', $request->permissions)
            ->where('guard_name', 'admin') 
            ->get();

        $role->syncPermissions($permissions);

        return redirect()->route('admin.roles.index')->with('success', __('Role updated successfully.'));
    }

    public function show_group($group)
    {
        $permissions = CustomPermission::where('group_name', $group)->get();

        return view('dashboard.pages.authorization.Permissions_Group', [
            'groupName' => $group, 
            'permissions' => $permissions,
        ]);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully.');
    }
}
