<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions=['create','edit','update','delete'];
        foreach($permissions as $permission){
            Permission::create(['name'=>$permission]);
        }

        $roles = ['super admin', 'admin'];
        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $users = ['saiful', 'raihan', 'ashik'];
        foreach ($users as $user) {
            User::create([
                'name' => $user,
                'email'=>$user.'@gmail.com',
                'password'=>bcrypt('password')
            ]);
        }
    }
}
