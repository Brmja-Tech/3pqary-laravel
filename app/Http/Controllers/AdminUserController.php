<?php
namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $admins = User::with('roles')->paginate(10); 
        
        return view('dashboard.pages.admins.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::query()->where('guard_name', 'admin')->get();
        $allRoles = Role::all(); 

        return view('dashboard.pages.admins.create', compact('roles' ,'allRoles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required',
            'phone' => 'nullable',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach(Role::where('name', 'admin')->first());

        return redirect()->route('admin.admins.index')->with('success', 'Admin user created successfully.');
    }

    public function show(User $admin)
    {
        return view('dashboard.pages.admins.index', compact('admin'));
    }

    public function edit(User $admin)
    {
        $roles = $admin->getRoleNames();
        $allRoles = Role::all(); 

    
        return view('dashboard.pages.admins.create', compact('admin', 'roles','allRoles'));
    }
    
    public function update(Request $request, User $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.admins.index')->with('success', 'Admin user updated successfully.');
    }

    public function destroy(User $admin)
    {
        $admin->roles()->detach();
        $admin->delete();

        return redirect()->route('admin.admins.index')->with('success', 'Admin user deleted successfully.');
    }
}