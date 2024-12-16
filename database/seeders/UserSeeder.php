<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where('email', 'admin@admin.com')->get()->first();
        if($user == null){
            $user = User::create([
                'name' => 'admin',
                'email' => 'admin2@admin.com',
                'password' => '1234567890',
                'remember_token' => '1234567890',
            ]);
        }
        $user->syncRoles(['administrator']);
    }
}