<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\CustomPermission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = CustomPermission::query()->get();
        syncPermisions($permissions);

     
        $administrator = Role::where('name', 'administrator')->where('guard_name', 'web')->first();
        if ($administrator === null) {
            $administrator = Role::create([
                'name' => 'administrator',
                'guard_name' => 'web'
            ]);
        }

        $administrator->syncPermissions(CustomPermission::where('guard_name', 'web')->get()->pluck('id')->toArray());
    }
}